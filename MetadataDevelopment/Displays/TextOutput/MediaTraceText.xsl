<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mt="https://mediaarea.net/mediatrace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="text" version="1.0" indent="yes"/>
    <xsl:template match="/mt:MediaTrace">
        <xsl:for-each select="mt:media">
            <xsl:text>File: </xsl:text>
            <xsl:value-of select="@ref"/>
            <xsl:text>&#xa;</xsl:text>
            <xsl:text>*********************&#xa;</xsl:text>
            <xsl:text>* MediaTrace report *&#xa;</xsl:text>
            <xsl:text>*********************&#xa;</xsl:text>
            <xsl:text>&#xa;</xsl:text>
            <xsl:for-each select="mt:block">
                <xsl:value-of select="@offset"/><xsl:text> | </xsl:text>
                <xsl:value-of select="@name"/>
                <xsl:text> (</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
                <xsl:apply-templates select="mt:data" />
                <xsl:text>     &#xa;</xsl:text>
                 <xsl:if test="mt:block">
                    <xsl:text>   </xsl:text><xsl:apply-templates select="mt:block" />
                </xsl:if>
            </xsl:for-each>
        </xsl:for-each>
    </xsl:template>

    <xsl:template match="mt:block">
        <xsl:text>   </xsl:text>
        <xsl:value-of select="@offset"/><xsl:text> | </xsl:text>
        <xsl:value-of select="@name"/>
        <xsl:text> (</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
        <xsl:apply-templates select="mt:data" />
        <xsl:text>     &#xa;</xsl:text>
         <xsl:if test="mt:block">
            <xsl:text>   </xsl:text><xsl:apply-templates select="mt:block" />
        </xsl:if>
    </xsl:template>

    <xsl:template match="mt:data">
        <xsl:text>&#xa;</xsl:text><xsl:text>   </xsl:text> 
        <xsl:value-of select="@name"/>
        <xsl:text> : </xsl:text>
        <xsl:value-of select="text()"/>
    </xsl:template>

</xsl:stylesheet>
