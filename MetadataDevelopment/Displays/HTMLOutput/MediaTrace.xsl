<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mt="https://mediaarea.net/mediatrace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="html" version="1.0" indent="yes"/>
    <xsl:template match="/mt:MediaTrace">
        <xsl:for-each select="mt:media">
          <xsl:text>File: </xsl:text>
          <xsl:value-of select="@ref"/>
          <div class="mc_header">
              <h1>MediaTrace report</h1>
          </div>
          <table>
          <xsl:for-each select="//mt:block">
            <tr>
              <td>
              <xsl:value-of select="@name"/>
              <xsl:text> (</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
              <xsl:text> Offset: </xsl:text>
              <xsl:value-of select="@offset"/>
              </td>
            </tr>
          </xsl:for-each>
          </table>
        </xsl:for-each>
    </xsl:template>
</xsl:stylesheet>