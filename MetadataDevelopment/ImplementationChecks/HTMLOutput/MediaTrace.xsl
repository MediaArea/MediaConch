<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:ma="https://mediaarea.net/mediaarea" xmlns:mt="https://mediaarea.net/mediatrace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="html" version="1.0" indent="yes"/>
  <xsl:template match="/ma:MediaArea">
    <xsl:for-each select="ma:media/mt:MediaTrace">
      <table border="1">
        <xsl:for-each select="mt:block">
          <tr>
          <td>
            <xsl:text>Offset: </xsl:text>
            <xsl:value-of select="@offset"/>
            <xsl:text> </xsl:text>
            <xsl:value-of select="@name"/>
            <xsl:text>(</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
          <xsl:for-each select="mt:block">
            <tr>
            <td><xsl:text>Offset: </xsl:text>
            <xsl:value-of select="@offset"/>
            <xsl:text> </xsl:text>
            <xsl:value-of select="@name"/>
            <xsl:text>(</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
            <xsl:for-each select="mt:data">
              <tr>
              <td><xsl:text>Offset: </xsl:text>
              <xsl:value-of select="@offset"/>
              <xsl:text> </xsl:text>
              <xsl:value-of select="@name"/>
              <xsl:text> </xsl:text><xsl:value-of select="."/>
              </td>
              </tr>
            </xsl:for-each>
            </td>
            </tr>
          </xsl:for-each>
          </td>
          </tr>
        </xsl:for-each>
      </table>
    </xsl:for-each>
  </xsl:template>
</xsl:stylesheet>
