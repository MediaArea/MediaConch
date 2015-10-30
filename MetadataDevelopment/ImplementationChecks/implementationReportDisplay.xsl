<?xml version="1.0"?>
<!-- See also: ImplementationChecks/HTMLOutput/MediaConch.xsl -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mc="https://mediaarea.net/mediaconch" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="html" version="1.0" indent="yes"/>
    <xsl:template match="/mc:MediaConch/mc:implementationChecks">
        <h1><xsl:value-of select="mc:title"/></h1>
        <p><xsl:value-of select="mc:description"/></p>
        <xsl:for-each select="mc:media">
            <b><xsl:value-of select="@ref"/></b><p/>
            <xsl:for-each select="mc:check">
                <i><xsl:value-of select="@icid"/></i>
                <table border="1">
                    <p>Context (field): <xsl:value-of select="mc:context/@name"/></p>
                    <p>Context (value): <xsl:value-of select="mc:context"/></p>
                    <th>
                        <td>outcome</td>
                        <td>reason</td>
                        <td>values</td>
                    </th>
                    <xsl:for-each select="mc:test">
                        <tr>
                            <td/>
                            <td><xsl:value-of select="@outcome"/></td>
                            <td><xsl:value-of select="@reason"/></td>
                            <td>
                                <table>
                                    <xsl:for-each select="mc:value">
                                        <tr><td>
                                            <xsl:value-of select="@name"/>
                                            <xsl:text> (</xsl:text>
                                            <xsl:value-of select="@offset"/>
                                            <xsl:text>): </xsl:text>
                                            <xsl:value-of select="."/>
                                        </td></tr>
                                    </xsl:for-each>
                                </table>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </xsl:for-each>
        </xsl:for-each>
    </xsl:template>
</xsl:stylesheet>
