<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mc="https://mediaarea.net/mediaarea" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="xml" version="1.0" indent="yes"/>
    <xsl:template match="mc:MediaArea">
        <MediaConch>
            <policyChecks>
                <xsl:attribute name="version">
                    <xsl:text>0.1</xsl:text>
                </xsl:attribute>
                <xsl:for-each select="mc:media">
                    <media>
                        <xsl:attribute name="ref"><xsl:value-of select="./@ref"/></xsl:attribute>
                        <!--- this is the start of a policy test -->
                        <policy>
                            <!-- set variable named key to the xpath of MediaInfo to check -->
                            <!--                                                                        set track type -->
                            <!--                                                                                     set metadata value -->
                            
                            <xsl:variable name="key"><xsl:value-of select="mc:MediaInfo/mc:track[@type='General']/mc:Format"/></xsl:variable>
                            <!--                       set expected value -->
                            <xsl:variable name="value">Matroska</xsl:variable>
                            <!-- leave the rest alone, just adjust the key and value -->
                            <xsl:call-template name="are_equal">
                                <xsl:with-param name="key" select="$key"/>
                                <xsl:with-param name="value" select="$value"/>
                            </xsl:call-template>
                        </policy>
                        <!--- this is the end of a policy test -->
                        <!--- this is the start of another policy test -->
                        <policy>
                            <!-- set variable named key to the xpath of MediaInfo to check -->
                            <!--                                                                        set track type -->
                            <!--                                                                                     set metadata value -->
                            <xsl:variable name="name" select="mc:Format" as="string"/>
                            

                            
                            <xsl:variable name="key"><xsl:value-of select="mc:MediaInfo/mc:track[@type='Video']/mc:Format"/></xsl:variable>
                            <!--                       set expected value -->
                            <xsl:variable name="value">FFV1</xsl:variable>
                            <!-- leave the rest alone, just adjust the key and value -->
                            <xsl:call-template name="are_equal">
                                <xsl:with-param name="key" select="$key"/>
                                <xsl:with-param name="value" select="$value"/>
                            </xsl:call-template>
                        </policy>
                        <!--- this is the end of another policy test -->
                        <!--- this is the start of 3rd policy test -->
                        <policy>
                            <!-- set variable named key to the xpath of MediaInfo to check -->
                            <!--                                                                        set track type -->
                            <!--                                                                                     set metadata value -->
                            <xsl:variable name="key"><xsl:value-of select="mc:MediaInfo/mc:track[@type='Video']/mc:Format_Version"/></xsl:variable>
                            <!--                       set expected value -->
                            <xsl:variable name="value">Version 3.1</xsl:variable>
                            <!-- leave the rest alone, just adjust the key and value -->
                            <xsl:call-template name="are_equal">
                                <xsl:with-param name="key" select="$key"/>
                                <xsl:with-param name="value" select="$value"/>
                            </xsl:call-template>
                        </policy>
                        <!--- this is the end of 3rd policy test -->
                        <!--- this is the start of 4th policy test -->
                        <policy>
                            <!-- set variable named key to the xpath of MediaInfo to check -->
                            <!--                                                                        set track type -->
                            <!--                                                                                     set metadata value -->
                            <xsl:variable name="key"><xsl:value-of select="mc:MediaInfo/mc:track[@type='General']/mc:FileSize"/></xsl:variable>
                            <!--                       set expected value -->
                            <xsl:variable name="value">0</xsl:variable>
                            <!-- leave the rest alone, just adjust the key and value -->
                            <xsl:call-template name="is_greater_than">
                                <xsl:with-param name="key" select="$key"/>
                                <xsl:with-param name="value" select="$value"/>
                            </xsl:call-template>
                        </policy>
                        <!--- this is the end of 4th policy test -->
                        <!--- this is the start of 5th policy test -->
                        <policy>
                            <!-- set variable named key to the xpath of MediaInfo to check -->
                            <!--                                                                        set track type -->
                            <!--                                                                                     set metadata value -->
                            <xsl:variable name="key"><xsl:value-of select="mc:MediaInfo/mc:track[@type='Video']/mc:Format"/></xsl:variable>
                            <xsl:call-template name="exists">
                                <xsl:with-param name="key" select="$key"/>
                            </xsl:call-template>
                        </policy>
                        <policy>
                            <!-- set variable named key to the xpath of MediaInfo to check -->
                            <!--                                                                        set track type -->
                            <!--                                                                                     set metadata value -->
                            <xsl:variable name="key"><xsl:value-of select="mc:MediaInfo/mc:track[@type='Video']/mc:Formatzzzzz"/></xsl:variable>
                            <xsl:call-template name="does_not_exist">
                                <xsl:with-param name="key" select="$key"/>
                            </xsl:call-template>
                        </policy>
                        <!--- this is the end of 5th policy test -->
                    </media>
                </xsl:for-each>
            </policyChecks>
        </MediaConch>
    </xsl:template>
    
    <xsl:template name="are_equal">
        <xsl:param name="key"/>
        <xsl:param name="value"/>
        <xsl:attribute name="expected"><xsl:value-of select="$value"/></xsl:attribute>
        <xsl:choose>
            <xsl:when test="$key = $value">
                <xsl:attribute name="outcome">pass</xsl:attribute>
            </xsl:when>
            <xsl:otherwise>
                <xsl:attribute name="outcome">fail</xsl:attribute>
                <xsl:attribute name="reason">unexpected value</xsl:attribute>
                <value>
                    <xsl:value-of select="$key"/>
                </value>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_greater_than">
        <xsl:param name="key"/>
        <xsl:param name="value"/>
        <xsl:attribute name="expected"><xsl:value-of select="$value"/></xsl:attribute>
        <xsl:choose>
            <xsl:when test="$key &gt; $value">
                <xsl:attribute name="outcome">pass</xsl:attribute>
            </xsl:when>
            <xsl:otherwise>
                <xsl:attribute name="outcome">fail</xsl:attribute>
                <xsl:attribute name="reason">unexpected value</xsl:attribute>
                <value>
                    <xsl:value-of select="$key"/>
                </value>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_less_than">
        <xsl:param name="key"/>
        <xsl:param name="value"/>
        <xsl:attribute name="expected"><xsl:value-of select="$value"/></xsl:attribute>
        <xsl:choose>
            <xsl:when test="$key &lt; $value">
                <xsl:attribute name="outcome">pass</xsl:attribute>
            </xsl:when>
            <xsl:otherwise>
                <xsl:attribute name="outcome">fail</xsl:attribute>
                <xsl:attribute name="reason">unexpected value</xsl:attribute>
                <value>
                    <xsl:value-of select="$key"/>
                </value>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_greater_or_equal_than">
        <xsl:param name="key"/>
        <xsl:param name="value"/>
        <xsl:attribute name="expected"><xsl:value-of select="$value"/></xsl:attribute>
        <xsl:choose>
            <xsl:when test="$key &gt;= $value">
                <xsl:attribute name="outcome">pass</xsl:attribute>
            </xsl:when>
            <xsl:otherwise>
                <xsl:attribute name="outcome">fail</xsl:attribute>
                <xsl:attribute name="reason">unexpected value</xsl:attribute>
                <value>
                    <xsl:value-of select="$key"/>
                </value>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_less_or_equal_than">
        <xsl:param name="key"/>
        <xsl:param name="value"/>
        <xsl:attribute name="expected"><xsl:value-of select="$value"/></xsl:attribute>
        <xsl:choose>
            <xsl:when test="$key &lt;= $value">
                <xsl:attribute name="outcome">pass</xsl:attribute>
            </xsl:when>
            <xsl:otherwise>
                <xsl:attribute name="outcome">fail</xsl:attribute>
                <xsl:attribute name="reason">unexpected value</xsl:attribute>
                <value>
                    <xsl:value-of select="$key"/>
                </value>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_not_equal">
        <xsl:param name="key"/>
        <xsl:param name="value"/>
        <xsl:attribute name="expected"><xsl:value-of select="$value"/></xsl:attribute>
        <xsl:choose>
            <xsl:when test="$key != $value">
                <xsl:attribute name="outcome">pass</xsl:attribute>
            </xsl:when>
            <xsl:otherwise>
                <xsl:attribute name="outcome">fail</xsl:attribute>
                <xsl:attribute name="reason">unexpected value</xsl:attribute>
                <value>
                    <xsl:value-of select="$key"/>
                </value>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="exists">
        <xsl:param name="key"/>
        <xsl:if test="boolean($key)">exists</xsl:if>
    </xsl:template>

    <xsl:template name="does_not_exist">
        <xsl:param name="key"/>
        <xsl:if test="boolean($key)">does not exist</xsl:if>
    </xsl:template>


</xsl:stylesheet>