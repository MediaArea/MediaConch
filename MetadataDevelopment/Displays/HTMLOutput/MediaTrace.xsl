<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:ma="https://mediaarea.net/mediaarea" xmlns:mt="https://mediaarea.net/mediatrace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="html" version="1.0" indent="yes"/>
  <xsl:template match="/ma:MediaArea">
    <xsl:for-each select="ma:media/mt:MediaTrace">
      <table border="1">
        <xsl:apply-templates select="mt:block"/>
      </table>
    </xsl:for-each>
  </xsl:template>

  <xsl:template match="mt:block">
      <tr>
        <td>
          <xsl:text>Offset block: </xsl:text>
          <xsl:value-of select="@offset"/>
          <xsl:text> </xsl:text>
          <xsl:value-of select="@name"/>
          <xsl:text>(</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
        </td>
      </tr>
      <xsl:if test="mt:block">
        <xsl:apply-templates select="mt:block" />
      </xsl:if>
      <xsl:if test="mt:data">
        <xsl:apply-templates select="mt:data" />
      </xsl:if>
  </xsl:template>

  <xsl:template match="mt:data">
      <tr>
        <td>
          <xsl:text>Offset data: </xsl:text>
          <xsl:value-of select="@offset"/>
          <xsl:text> </xsl:text>
          <xsl:value-of select="@name"/>
          <xsl:text>(</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
        </td>
      </tr>
  </xsl:template>

</xsl:stylesheet>
