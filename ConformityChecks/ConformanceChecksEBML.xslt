<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mc="https://mediaarea.net/mediatrace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="xml" version="1.0" indent="yes"/>
    <xsl:template match="mc:MediaTrace">
        <MediaConch>
            <conformanceChecks>
                <xsl:attribute name="version">
                    <xsl:text>0.1a1</xsl:text>
                </xsl:attribute>
                    <check>
                        <xsl:attribute name="id">EBML-ELEM-START</xsl:attribute>
                        <xsl:attribute name="version">0</xsl:attribute>
                        <xsl:choose>
                            <xsl:when test="//mc:data[1] = '172351395'">
                                <outcome>
                                    <xsl:attribute name="outcome">pass</xsl:attribute>
                                </outcome>
                            </xsl:when>
                            <xsl:otherwise>
                                <outcome>
                                    <xsl:attribute name="outcome">fail</xsl:attribute>
                                    <xsl:text>Expecting the first element to be 172351395 but found </xsl:text>
                                    <xsl:value-of select="//mc:data[1]"/>
                                    <xsl:text>.</xsl:text>
                                </outcome>
                            </xsl:otherwise>
                        </xsl:choose>
                    </check>
            </conformanceChecks>
        </MediaConch>
    </xsl:template>
</xsl:stylesheet>
