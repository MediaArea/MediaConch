<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mt="https://mediaarea.net/mediatrace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="text" version="1.0" indent="yes"/>
    <xsl:variable name="spaces"><xsl:text>                                                               </xsl:text></xsl:variable>
    <xsl:template match="/mt:MediaTrace">
        <xsl:for-each select="mt:media">
            <xsl:text>*********************&#xa;</xsl:text>
            <xsl:text>* MediaTrace report *&#xa;</xsl:text>
            <xsl:text>*********************&#xa;</xsl:text>
            <xsl:text>&#xa;</xsl:text>
            <xsl:text>File: </xsl:text>
            <xsl:value-of select="@ref"/>
            <xsl:for-each select="mt:block">
                <xsl:text>&#xa;</xsl:text>
                <xsl:value-of select="concat(substring('0000000', string-length(@offset)), @offset)"/>
                <xsl:text> </xsl:text>
                <xsl:value-of select="@name"/>
                <xsl:text> (</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
                <xsl:apply-templates select="mt:data" />
                <xsl:if test="mt:block">
                    <xsl:apply-templates select="mt:block" />
                </xsl:if>
            </xsl:for-each>
        </xsl:for-each>
        <xsl:text>&#xa;</xsl:text>
    </xsl:template>

    <xsl:template match="mt:block">
        <xsl:variable name="offsetHex">
            <xsl:call-template name="DecToHex">
                <xsl:with-param name="dec">
                    <xsl:value-of select="@offset"/>
                </xsl:with-param>
            </xsl:call-template>
        </xsl:variable>
        <xsl:text>&#xa;</xsl:text>
        <xsl:value-of select="concat(substring('0000000', string-length($offsetHex)), $offsetHex)"/>
        <xsl:text> </xsl:text>
        <xsl:value-of select="substring($spaces,1,count(ancestor::mt:block))"/>
        <xsl:value-of select="@name"/>
        <xsl:text> (</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
        <xsl:apply-templates select="mt:data|mt:block" />
    </xsl:template>

    <xsl:template match="mt:data">
        <xsl:variable name="offsetHex">
            <xsl:call-template name="DecToHex">
                <xsl:with-param name="dec">
                    <xsl:value-of select="@offset"/>
                </xsl:with-param>
            </xsl:call-template>
        </xsl:variable>
        <xsl:text>&#xa;</xsl:text>
        <xsl:value-of select="concat(substring('0000000', string-length($offsetHex)), $offsetHex)"/>
        <xsl:text> </xsl:text>
        <xsl:value-of select="substring($spaces,1,count(ancestor::mt:block))"/>
        <xsl:value-of select="@name"/>
        <xsl:text>: </xsl:text>
        <xsl:value-of select="substring($spaces,1,41-(count(ancestor::mt:block)+string-length(@name)))"/>
        <xsl:value-of select="text()"/>
        <xsl:if test="floor(text())">
            <xsl:text> (0x</xsl:text>
            <xsl:call-template name="DecToHex">
                <xsl:with-param name="dec">
                    <xsl:value-of select="text()"/>
                </xsl:with-param>
            </xsl:call-template>
            <xsl:text>)</xsl:text>
        </xsl:if>
    </xsl:template>

    <xsl:template name="DecToHex">
        <xsl:param name="dec" />
        <xsl:choose>
            <xsl:when test="$dec > 0">
                <xsl:call-template name="DecToHex">
                    <xsl:with-param name="dec" select="floor($dec div 16)" />
                </xsl:call-template>
                <xsl:choose>
                    <xsl:when test="$dec mod 16 &lt; 10">
                        <xsl:value-of select="$dec mod 16" />
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:choose>
                            <xsl:when test="$dec mod 16 = 10">A</xsl:when>
                            <xsl:when test="$dec mod 16 = 11">B</xsl:when>
                            <xsl:when test="$dec mod 16 = 12">C</xsl:when>
                            <xsl:when test="$dec mod 16 = 13">D</xsl:when>
                            <xsl:when test="$dec mod 16 = 14">E</xsl:when>
                            <xsl:when test="$dec mod 16 = 15">F</xsl:when>
                            <xsl:otherwise>A</xsl:otherwise>
                        </xsl:choose>
                    </xsl:otherwise>
                </xsl:choose>
            </xsl:when>
            <xsl:otherwise>0</xsl:otherwise>
        </xsl:choose>
    </xsl:template>

</xsl:stylesheet>
