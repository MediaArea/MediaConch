<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mt="https://mediaarea.net/mediatrace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="html" version="1.0" indent="yes"/>
    <xsl:template match="*">
        <xsl:text>File: </xsl:text>
        <xsl:value-of select="@ref"/>
    </xsl:template>
    <xsl:template match="/MediaTrace/block">
        <xsl:for-each select="*">
            <xsl:text>Offset: </xsl:text>
            <xsl:value-of select="@offset"/>
            <xsl:text>     </xsl:text>
            <xsl:value-of select="@name"/>
            <xsl:text>(</xsl:text><xsl-value-of select="@size"/><xsl:text> bytes)</xsl:text>
            <xsl:for-each select="block">
                <!-- add spaces, get offset and name -->
                <xsl:for-each select="block">
                    <!-- add spaces, get offset and name -->
                </xsl:for-each>
            </xsl:for-each>
        </xsl:for-each>
    </xsl:template>
</xsl:stylesheet>
