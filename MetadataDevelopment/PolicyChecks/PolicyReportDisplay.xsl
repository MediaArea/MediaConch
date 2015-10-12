<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mc="https://mediaarea.net/mediaarea" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="html" version="1.0" indent="yes"/>
    <xsl:template match="/">
        <xsl:for-each select="MediaConch/policyChecks/media/policy">
            <table>
                <th><xsl:value-of select="@title"/></th>
                <tr>
                    <td><xsl:value-of select="results/@outcome"/></td>
                    <td><xsl:value-of select="results/@reason"/></td>
                </tr>
                <tr>
                    <td>
                        Track type: <xsl:value-of select="context/@tracktype"/>
                        Field: <xsl:value-of select="context/@field"/>
                    </td>
                    <td>
                        Expected value: <xsl:value-of select="context/@expected"/>
                        Found value: <xsl:value-of select="context/@value"/>
                    </td>
                </tr>
            </table>
        </xsl:for-each>
    </xsl:template>

</xsl:stylesheet>
