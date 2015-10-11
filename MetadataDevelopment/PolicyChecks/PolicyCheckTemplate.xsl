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
                        <policy>
                            <xsl:call-template name="is_true">
                                <xsl:with-param name="title">Is Matroska or QuickTime</xsl:with-param>
                                <xsl:with-param name="xpath" select="mc:MediaInfo/mc:track[@type='General'][1]/mc:Format = 'Matroska' or mc:MediaInfo/mc:track[@type='General'][1]/mc:Format = 'AVI'"/>
                                <xsl:with-param name="value">mc:MediaInfo/mc:track[@type='General'][1]/mc:Format = 'Matroska' or mc:MediaInfo/mc:track[@type='General'][1]/mc:Format = 'AVI'</xsl:with-param>
                                <xsl:with-param name="tracktype">General</xsl:with-param>
                                <xsl:with-param name="occurrence">1</xsl:with-param>
                                <xsl:with-param name="field">Format</xsl:with-param>
                            </xsl:call-template>
                        </policy>
                        <policy>
                            <xsl:call-template name="is_equal">
                                <xsl:with-param name="title">Is Matroska</xsl:with-param>
                                <xsl:with-param name="xpath" select="mc:MediaInfo/mc:track[@type='General'][1]/mc:Format"/>
                                <xsl:with-param name="value">Matroska</xsl:with-param>
                                <xsl:with-param name="tracktype">General</xsl:with-param>
                                <xsl:with-param name="occurrence">1</xsl:with-param>
                                <xsl:with-param name="field">Format</xsl:with-param>
                            </xsl:call-template>
                        </policy>
                        <policy>
                            <xsl:call-template name="is_equal">
                                <xsl:with-param name="title">Is FFV1</xsl:with-param>
                                <xsl:with-param name="xpath" select="mc:MediaInfo/mc:track[@type='Video'][1]/mc:Format"/>
                                <xsl:with-param name="value">FFV1</xsl:with-param>
                                <xsl:with-param name="tracktype">Video</xsl:with-param>
                                <xsl:with-param name="occurrence">1</xsl:with-param>
                                <xsl:with-param name="field">Format</xsl:with-param>
                            </xsl:call-template>
                        </policy>
                        <policy>
                            <xsl:call-template name="is_equal">
                                <xsl:with-param name="title">Format version is Version 3.1</xsl:with-param>
                                <xsl:with-param name="xpath" select="mc:MediaInfo/mc:track[@type='Video'][1]/mc:Format_Version"/>
                                <xsl:with-param name="value">Version 3.1</xsl:with-param>
                                <xsl:with-param name="tracktype">Video</xsl:with-param>
                                <xsl:with-param name="occurrence">1</xsl:with-param>
                                <xsl:with-param name="field">Format_Version</xsl:with-param>
                            </xsl:call-template>
                        </policy>
                        <policy>
                            <xsl:call-template name="is_greater_than">
                                <xsl:with-param name="title">FileSize is greater than 0</xsl:with-param>
                                <xsl:with-param name="xpath" select="mc:MediaInfo/mc:track[@type='General'][1]/mc:FileSize"/>
                                <xsl:with-param name="value">0</xsl:with-param>
                                <xsl:with-param name="tracktype">General</xsl:with-param>
                                <xsl:with-param name="occurrence">1</xsl:with-param>
                                <xsl:with-param name="field">FileSize</xsl:with-param>
                            </xsl:call-template>
                        </policy>
                        <policy>
                            <xsl:call-template name="exists">
                                <xsl:with-param name="title">Video track exists</xsl:with-param>
                                <xsl:with-param name="xpath" select="mc:MediaInfo/mc:track[@type='Video'][1]/mc:Format"/>
                                <xsl:with-param name="tracktype">Video</xsl:with-param>
                                <xsl:with-param name="occurrence">1</xsl:with-param>
                                <xsl:with-param name="field">Format</xsl:with-param>
                            </xsl:call-template>
                        </policy>
                        <policy>
                            <xsl:call-template name="does_not_exist">
                                <xsl:with-param name="title">Fake video track does not exist</xsl:with-param>
                                <xsl:with-param name="xpath" select="mc:MediaInfo/mc:track[@type='Video'][1]/mc:Formatzzzzz"/>
                                <xsl:with-param name="tracktype">Video</xsl:with-param>
                                <xsl:with-param name="occurrence">1</xsl:with-param>
                                <xsl:with-param name="field">Formatzzzzz</xsl:with-param>
                            </xsl:call-template>
                        </policy>
                        <policy>
                            <xsl:call-template name="contains_string">
                                <xsl:with-param name="title">Format contains 1</xsl:with-param>
                                <xsl:with-param name="xpath" select="mc:MediaInfo/mc:track[@type='Video'][1]/mc:Format"/>
                                <xsl:with-param name="value">1</xsl:with-param>
                                <xsl:with-param name="tracktype">Video</xsl:with-param>
                                <xsl:with-param name="occurrence">1</xsl:with-param>
                                <xsl:with-param name="field">Format</xsl:with-param>
                            </xsl:call-template>
                        </policy>
                        <policy>
                            <xsl:call-template name="contains_string">
                                <xsl:with-param name="title">Format version does not contain 1</xsl:with-param>
                                <xsl:with-param name="xpath" select="mc:MediaInfo/mc:track[@type='Video'][1]/mc:Format_Version"/>
                                <xsl:with-param name="value">1</xsl:with-param>
                                <xsl:with-param name="tracktype">Video</xsl:with-param>
                                <xsl:with-param name="occurrence">1</xsl:with-param>
                                <xsl:with-param name="field">Format</xsl:with-param>
                            </xsl:call-template>
                        </policy>
                    </media>
                </xsl:for-each>
            </policyChecks>
        </MediaConch>
    </xsl:template>
    
    <xsl:template name="is_true">
        <xsl:param name="title"/>
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="tracktype"/>
        <xsl:param name="field"/>
        <xsl:attribute name="title"><xsl:value-of select="$title"/></xsl:attribute>
        <xsl:element name="expected"><xsl:value-of select="$value"/></xsl:element>
        <xsl:choose>
            <xsl:when test="$xpath">
                <xsl:element name="results">pass</xsl:element>
            </xsl:when>
            <xsl:otherwise>
                <xsl:element name="results">fail</xsl:element>
                <xsl:element name="reason">is not true</xsl:element>
                    <xsl:element name="context">
                        <xsl:element name="tracktype"><xsl:value-of select="$tracktype"/></xsl:element>
                        <xsl:element name="field"><xsl:value-of select="$field"/></xsl:element>
                    </xsl:element>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_equal">
        <xsl:param name="title"/>
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="tracktype"/>
        <xsl:param name="field"/>
        <xsl:attribute name="title"><xsl:value-of select="$title"/></xsl:attribute>
        <xsl:element name="expected"><xsl:value-of select="$value"/></xsl:element>
        <xsl:element name="value"><xsl:value-of select="$xpath"/></xsl:element>
        <xsl:choose>
            <xsl:when test="$xpath = $value">
                <xsl:element name="results">
                    <xsl:element name="outcome">pass</xsl:element>
                </xsl:element>
            </xsl:when>
            <xsl:otherwise>
                <xsl:element name="results">
                    <xsl:element name="outcome">fail</xsl:element>
                    <xsl:element name="reason">is not equal</xsl:element>
                    <xsl:element name="context">
                        <xsl:element name="tracktype"><xsl:value-of select="$tracktype"/></xsl:element>
                        <xsl:element name="field"><xsl:value-of select="$field"/></xsl:element>
                    </xsl:element>
                </xsl:element>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_not_equal">
        <xsl:param name="title"/>
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="tracktype"/>
        <xsl:param name="field"/>
        <xsl:attribute name="title"><xsl:value-of select="$title"/></xsl:attribute>
        <xsl:element name="expected"><xsl:value-of select="$value"/></xsl:element>
        <xsl:element name="value"><xsl:value-of select="$xpath"/></xsl:element>
        <xsl:choose>
            <xsl:when test="$xpath != $value">
                <xsl:element name="results">
                    <xsl:element name="outcome">pass</xsl:element>
                </xsl:element>
            </xsl:when>
            <xsl:otherwise>
                <xsl:element name="results">
                    <xsl:element name="outcome">fail</xsl:element>
                    <xsl:element name="reason">is equal</xsl:element>
                    <xsl:element name="context">
                        <xsl:element name="tracktype"><xsl:value-of select="$tracktype"/></xsl:element>
                        <xsl:element name="field"><xsl:value-of select="$field"/></xsl:element>
                    </xsl:element>
                </xsl:element>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_greater_than">
        <xsl:param name="title"/>
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="tracktype"/>
        <xsl:param name="field"/>
        <xsl:attribute name="title"><xsl:value-of select="$title"/></xsl:attribute>
        <xsl:element name="expected"><xsl:value-of select="$value"/></xsl:element>
        <xsl:element name="value"><xsl:value-of select="$xpath"/></xsl:element>
        <xsl:choose>
            <xsl:when test="$xpath &gt; $value">
                <xsl:element name="results">
                    <xsl:element name="outcome">pass</xsl:element>
                </xsl:element>
            </xsl:when>
            <xsl:otherwise>
                <xsl:element name="results">
                    <xsl:element name="outcome">fail</xsl:element>
                    <xsl:element name="reason">is less than or equal</xsl:element>
                    <xsl:element name="context">
                        <xsl:element name="tracktype"><xsl:value-of select="$tracktype"/></xsl:element>
                        <xsl:element name="field"><xsl:value-of select="$field"/></xsl:element>
                    </xsl:element>
                </xsl:element>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_less_than">
        <xsl:param name="title"/>
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="tracktype"/>
        <xsl:param name="field"/>
        <xsl:attribute name="title"><xsl:value-of select="$title"/></xsl:attribute>
        <xsl:element name="expected"><xsl:value-of select="$value"/></xsl:element>
        <xsl:element name="value"><xsl:value-of select="$xpath"/></xsl:element>
        <xsl:choose>
            <xsl:when test="$xpath &lt; $value">
                <xsl:element name="results">
                    <xsl:element name="outcome">pass</xsl:element>
                </xsl:element>
            </xsl:when>
            <xsl:otherwise>
                <xsl:element name="results">
                    <xsl:element name="outcome">fail</xsl:element>
                    <xsl:element name="reason">is greater than or equal</xsl:element>
                    <xsl:element name="context">
                        <xsl:element name="tracktype"><xsl:value-of select="$tracktype"/></xsl:element>
                        <xsl:element name="field"><xsl:value-of select="$field"/></xsl:element>
                    </xsl:element>
                </xsl:element>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_greater_or_equal_than">
        <xsl:param name="title"/>
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="tracktype"/>
        <xsl:param name="field"/>
        <xsl:attribute name="title"><xsl:value-of select="$title"/></xsl:attribute>
        <xsl:element name="expected"><xsl:value-of select="$value"/></xsl:element>
        <xsl:element name="value"><xsl:value-of select="$xpath"/></xsl:element>
        <xsl:choose>
            <xsl:when test="$xpath &gt;= $value">
<xsl:element name="results">
                    <xsl:element name="outcome">pass</xsl:element>
                </xsl:element>
            </xsl:when>
            <xsl:otherwise>
                <xsl:element name="results">
                    <xsl:element name="outcome">fail</xsl:element>
                    <xsl:element name="reason">is less than</xsl:element>
                    <xsl:element name="context">
                        <xsl:element name="tracktype"><xsl:value-of select="$tracktype"/></xsl:element>
                        <xsl:element name="field"><xsl:value-of select="$field"/></xsl:element>
                    </xsl:element>
                </xsl:element>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="is_less_or_equal_than">
        <xsl:param name="title"/>
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="tracktype"/>
        <xsl:param name="field"/>
        <xsl:attribute name="title"><xsl:value-of select="$title"/></xsl:attribute>
        <xsl:element name="expected"><xsl:value-of select="$value"/></xsl:element>
        <xsl:element name="value"><xsl:value-of select="$xpath"/></xsl:element>
        <xsl:choose>
            <xsl:when test="$xpath &lt;= $value">
                <xsl:element name="results">
                    <xsl:element name="outcome">pass</xsl:element>
                </xsl:element>
            </xsl:when>
            <xsl:otherwise>
                <xsl:element name="results">
                    <xsl:element name="outcome">fail</xsl:element>
                    <xsl:element name="reason">is greater than</xsl:element>
                    <xsl:element name="context">
                        <xsl:element name="tracktype"><xsl:value-of select="$tracktype"/></xsl:element>
                        <xsl:element name="field"><xsl:value-of select="$field"/></xsl:element>
                    </xsl:element>
                </xsl:element>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="exists">
        <xsl:param name="title"/>
        <xsl:param name="xpath"/>
        <xsl:param name="tracktype"/>
        <xsl:param name="field"/>
        <xsl:attribute name="title"><xsl:value-of select="$title"/></xsl:attribute>
        <xsl:choose>
            <xsl:when test="string-length($xpath) != 0">
                <xsl:element name="results">
                    <xsl:element name="outcome">pass</xsl:element>
                </xsl:element>
            </xsl:when>
            <xsl:otherwise>
                <xsl:element name="results">
                    <xsl:element name="outcome">fail</xsl:element>
                    <xsl:element name="reason">does not exist</xsl:element>
                    <xsl:element name="context">
                        <xsl:element name="tracktype"><xsl:value-of select="$tracktype"/></xsl:element>
                        <xsl:element name="field"><xsl:value-of select="$field"/></xsl:element>
                    </xsl:element>
                </xsl:element>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="does_not_exist">
        <xsl:param name="title"/>
        <xsl:param name="xpath"/>
        <xsl:param name="tracktype"/>
        <xsl:param name="field"/>
        <xsl:attribute name="title"><xsl:value-of select="$title"/></xsl:attribute>
        <xsl:choose>
            <xsl:when test="string-length($xpath) = '0'">
                <xsl:element name="results">
                    <xsl:element name="outcome">pass</xsl:element>
                </xsl:element>
            </xsl:when>
            <xsl:otherwise>
                <xsl:element name="results">
                    <xsl:element name="outcome">fail</xsl:element>
                    <xsl:element name="reason">exists</xsl:element>
                    <xsl:element name="context">
                        <xsl:element name="tracktype"><xsl:value-of select="$tracktype"/></xsl:element>
                        <xsl:element name="field"><xsl:value-of select="$field"/></xsl:element>
                    </xsl:element>
                </xsl:element>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <xsl:template name="contains_string">
        <xsl:param name="title"/>
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="tracktype"/>
        <xsl:param name="field"/>
        <xsl:attribute name="title"><xsl:value-of select="$title"/></xsl:attribute>
        <xsl:element name="expected"><xsl:value-of select="$value"/></xsl:element>
        <xsl:element name="value"><xsl:value-of select="$xpath"/></xsl:element>
        <xsl:choose>
            <xsl:when test="contains($xpath, $value)">
                <xsl:element name="results">
                    <xsl:element name="outcome">pass</xsl:element>
                </xsl:element>
            </xsl:when>
            <xsl:otherwise>
                <xsl:element name="results">
                    <xsl:element name="outcome">fail</xsl:element>
                    <xsl:element name="reason">does not contain</xsl:element>
                    <xsl:element name="context">
                        <xsl:element name="tracktype"><xsl:value-of select="$tracktype"/></xsl:element>
                        <xsl:element name="field"><xsl:value-of select="$field"/></xsl:element>
                    </xsl:element>
                </xsl:element>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

</xsl:stylesheet>
