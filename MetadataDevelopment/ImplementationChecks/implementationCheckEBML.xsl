<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="https://mediaarea.net/mediaconch" xmlns:ma="https://mediaarea.net/mediaarea" xmlns:mi="https://mediaarea.net/mediainfo" xmlns:mt="https://mediaarea.net/mediatrace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi ma mi mt">
    <xsl:output encoding="UTF-8" method="xml" version="1.0" indent="yes"/>
    <xsl:template>
        <xsl:choose>
            <xsl:when test="//mi:Format='Matroska' or //mi:Format='WebM'">
                <xsl:variable name="EBMLVersion">
                    <xsl:choose>
                        <xsl:when test="//mt:data[../mt:block/mt:data='646']">
                            <xsl:value-of select="//mt:data[../mt:block/mt:data='646']"/>
                        </xsl:when>
                        <xsl:otherwise>1</xsl:otherwise>
                    </xsl:choose>
                </xsl:variable>
                <xsl:variable name="EBMLReadVersion">
                    <xsl:choose>
                        <xsl:when test="//mt:data[../mt:block/mt:data='759']">
                            <xsl:value-of select="//mt:data[../mt:block/mt:data='759']"/>
                        </xsl:when>
                        <xsl:otherwise>1</xsl:otherwise>
                    </xsl:choose>
                </xsl:variable>
                <xsl:variable name="EBMLMaxIDLength">
                    <xsl:choose>
                        <xsl:when test="//mt:data[../mt:block/mt:data='754']">
                            <xsl:value-of select="//mt:data[../mt:block/mt:data='754']"/>
                        </xsl:when>
                        <xsl:otherwise>4</xsl:otherwise>
                    </xsl:choose>
                </xsl:variable>
                <xsl:variable name="EBMLMaxSizeLength">
                    <xsl:choose>
                        <xsl:when test="//mt:data[../mt:block/mt:data='755']">
                            <xsl:value-of select="//mt:data[../mt:block/mt:data='755']"/>
                        </xsl:when>
                        <xsl:otherwise>8</xsl:otherwise>
                    </xsl:choose>
                </xsl:variable>
                <xsl:variable name="DocTypeVersion">
                    <xsl:choose>
                        <xsl:when test="//mt:data[../mt:block/mt:data='647']">
                            <xsl:value-of select="//mt:data[../mt:block/mt:data='647']"/>
                        </xsl:when>
                        <xsl:otherwise>1</xsl:otherwise>
                    </xsl:choose>
                </xsl:variable>
                <xsl:variable name="DocTypeReadVersion">
                    <xsl:choose>
                        <xsl:when test="//mt:data[../mt:block/mt:data='645']">
                            <xsl:value-of select="//mt:data[../mt:block/mt:data='645']"/>
                        </xsl:when>
                        <xsl:otherwise>1</xsl:otherwise>
                    </xsl:choose>
                </xsl:variable>
                <check icid="IS_EBML" version="1">
                    <context field="mi:Format">
                        <xsl:attribute name="value">
                            <xsl:value-of select="//mi:Format"/>
                        </xsl:attribute>
                    </context>
                    <test outcome="pass"/>
                </check>
                <check>
                    <xsl:attribute name="icid">EBML-ELEM-START</xsl:attribute>
                    <xsl:attribute name="version">1</xsl:attribute>
                    <xsl:variable name="ebml-element-id">172351395</xsl:variable>
                    <context field="ebml-element-id">
                        <xsl:attribute name="value">
                            <xsl:value-of select="$ebml-element-id"/>
                        </xsl:attribute>
                    </context>
                    <xsl:call-template name="x_equals_y">
                        <xsl:with-param name="x" select="//mt:data[@offset='0']"/>
                        <xsl:with-param name="x_name">First Element ID</xsl:with-param>
                        <xsl:with-param name="y" select="$ebml-element-id"/>
                    </xsl:call-template>
                </check>
                <check>
                    <xsl:attribute name="icid">EBML-VER-COH</xsl:attribute>
                    <xsl:attribute name="version">1</xsl:attribute>
                    <xsl:call-template name="x_is_less_than_or_equal_to_y">
                        <xsl:with-param name="x" select="$EBMLReadVersion"/>
                        <xsl:with-param name="x_name">EBMLReadVersion</xsl:with-param>
                        <xsl:with-param name="y" select="$EBMLVersion"/>
                        <xsl:with-param name="y_name">EBMLVersion</xsl:with-param>
                    </xsl:call-template>
                </check>
                <check>
                    <xsl:attribute name="icid">EBML-DOCVER-COH</xsl:attribute>
                    <xsl:attribute name="version">1</xsl:attribute>
                    <xsl:call-template name="x_is_less_than_or_equal_to_y">
                        <xsl:with-param name="x" select="$DocTypeReadVersion"/>
                        <xsl:with-param name="x_name">DocTypeReadVersion</xsl:with-param>
                        <xsl:with-param name="y" select="$DocTypeVersion"/>
                        <xsl:with-param name="y_name">DocTypeVersion</xsl:with-param>
                    </xsl:call-template>
                </check>
                <check>
                    <xsl:attribute name="icid">EBML-HEADER-IDS-ONLY</xsl:attribute>
                    <xsl:attribute name="version">1</xsl:attribute>
                    <xsl:variable name="valid-ebml-header-subelement-ids">'646 759 754 755 642 647 645'</xsl:variable>
                    <context field="valid-ebml-header-subelement-ids">
                        <xsl:attribute name="value">
                            <xsl:value-of select="$valid-ebml-header-subelement-ids"/>
                        </xsl:attribute>
                    </context>
                    <xsl:for-each select="//mt:block[../mt:block/mt:data='172351395']/mt:block/mt:data[@name='Name']">
                        <xsl:call-template name="x_is_in_list">
                            <xsl:with-param name="x" select="."/>
                            <xsl:with-param name="list" select="$valid-ebml-header-subelement-ids"/>
                        </xsl:call-template>
                    </xsl:for-each>
                </check>
                <check>
                    <xsl:attribute name="icid">EBML-VALID-MAXID</xsl:attribute>
                    <xsl:attribute name="version">1</xsl:attribute>
                    <xsl:call-template name="x_is_less_than_or_equal_to_y">
                        <xsl:with-param name="x">3</xsl:with-param>
                        <xsl:with-param name="x_name">Minimum valid EBMLMaxIDLength</xsl:with-param>
                        <xsl:with-param name="y" select="$EBMLMaxIDLength"/>
                        <xsl:with-param name="y_name">EBMLMaxIDLength</xsl:with-param>
                    </xsl:call-template>
                </check>
                <check>
                    <xsl:attribute name="icid">EBML-VALID-MAXSIZE</xsl:attribute>
                    <xsl:attribute name="version">1</xsl:attribute>
                    <xsl:call-template name="x_is_less_than_or_equal_to_y">
                        <xsl:with-param name="x">0</xsl:with-param>
                        <xsl:with-param name="x_name">Minimum valid EBMLMaxSizeLength</xsl:with-param>
                        <xsl:with-param name="y" select="$EBMLMaxSizeLength"/>
                        <xsl:with-param name="y_name">EBMLMaxSizeLength</xsl:with-param>
                    </xsl:call-template>
                </check>
                <check>
                    <xsl:attribute name="icid">ELEMENTS-WITHIN-MAXIDLENGTH</xsl:attribute>
                    <xsl:attribute name="version">1</xsl:attribute>
                    <context field="EBMLMaxIDLength">
                        <xsl:attribute name="value">
                            <xsl:value-of select="$EBMLMaxIDLength"/>
                        </xsl:attribute>
                    </context>
                    <xsl:choose>
                        <xsl:when test="//mt:block[@name='Header']/mt:data[@name='Size'][@offset &gt; (../../mt:block/@offset + $EBMLMaxIDLength)]">
                            <xsl:for-each select="//mt:block[@name='Header']/mt:data[@name='Size'][@offset &gt; (../../mt:block/@offset + $EBMLMaxIDLength)]">
                                <test outcome="fail">
                                    <xsl:attribute name="reason">
                                        <xsl:text>Element ID Length greater than EBMLMaxIDLength.</xsl:text>
                                    </xsl:attribute>
                                    <value>
                                        <xsl:attribute name="offset">
                                            <xsl:value-of select="@offset"/>
                                        </xsl:attribute>
                                        <xsl:attribute name="name">
                                            <xsl:value-of select="../../@name"/>
                                            <xsl:text>:Element_ID_Length</xsl:text>
                                        </xsl:attribute>
                                        <xsl:value-of select="@offset - ../../mt:block/@offset"/>
                                    </value>
                                    <xsl:variable name="MAXIDLENGTH_fail">yes</xsl:variable>
                                </test>
                            </xsl:for-each>
                        </xsl:when>
                        <xsl:otherwise>
                            <test outcome="pass"/>
                        </xsl:otherwise>
                    </xsl:choose>
                </check>
                <check>
                    <xsl:attribute name="icid">ELEMENTS-WITHIN-MAXSIZELENGTH</xsl:attribute>
                    <xsl:attribute name="version">1</xsl:attribute>
                    <context field="EBMLMaxSizeLength">
                        <xsl:attribute name="value">
                            <xsl:value-of select="$EBMLMaxSizeLength"/>
                        </xsl:attribute>
                    </context>
                    <xsl:choose>
                        <xsl:when test="//mt:block/mt:data[@name='Size'][(../../mt:data/@offset - @offset) &gt; $EBMLMaxSizeLength]">
                            <xsl:for-each select="//mt:block/mt:data[@name='Size'][(../../mt:data/@offset - @offset) &gt; $EBMLMaxSizeLength]">
                                <test outcome="fail">
                                    <xsl:attribute name="reason">
                                        <xsl:text>An Element at has an Element Size Length greater than EBMLMaxSizeLength.</xsl:text>
                                    </xsl:attribute>
                                    <value>
                                        <xsl:attribute name="offset">
                                            <xsl:value-of select="@offset"/>
                                        </xsl:attribute>
                                        <xsl:attribute name="name">
                                            <xsl:value-of select="../../@name"/>
                                        </xsl:attribute>
                                        <xsl:value-of select="../../mt:data/@offset - @offset"/>
                                    </value>
                                </test>
                            </xsl:for-each>
                        </xsl:when>
                        <xsl:otherwise>
                            <test outcome="pass"/>
                        </xsl:otherwise>
                    </xsl:choose>
                </check>
                <xsl:for-each select="//mt:block[@name='SimpleTag'][mt:block[@name='TagName'][@info='TOTAL_PARTS']]/mt:block[@name='TagString']/mt:data">
                    <implementation>
                        <xsl:attribute name="name">TOTAL_PARTS is number</xsl:attribute>
                        <xsl:call-template name="is_number">
                            <xsl:with-param name="xpath" select="."/>
                            <xsl:with-param name="field">TOTAL_PARTS</xsl:with-param>
                        </xsl:call-template>
                    </implementation>
                </xsl:for-each>
            </xsl:when>
            <xsl:otherwise>
                <check icid="IS_EBML" version="1">
                    <context field="mi:Format">
                        <xsl:attribute name="value">
                            <xsl:value-of select="//mi:Format"/>
                        </xsl:attribute>
                    </context>
                    <test outcome="fail">
                        <value name="reason">
                            <xsl:value-of select="//mi:CompleteName"/>
                            <xsl:text> is not recognized as an EBML format</xsl:text>
                        </value>
                    </test>
                </check>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>
</xsl:stylesheet>
