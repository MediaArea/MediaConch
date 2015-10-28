<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:ma="https://mediaarea.net/mediaarea" xmlns:mi="https://mediaarea.net/mediainfo" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="html" version="1.0" indent="yes"/>
    <xsl:template match="/ma:MediaArea">
        <xsl:for-each select="ma:media/mi:MediaInfo/mi:track">
            <table border="1">
                <th>Track: <xsl:value-of select="@type"/></th>
                <xsl:for-each select="*">
                    <tr>
                    <td><xsl:value-of select="local-name()"/>
                    <xsl:text>: </xsl:text>
                    <xsl:value-of select="."/></td>
                    </tr>
                </xsl:for-each>
            </table>
        </xsl:for-each>
    </xsl:template>
</xsl:stylesheet>