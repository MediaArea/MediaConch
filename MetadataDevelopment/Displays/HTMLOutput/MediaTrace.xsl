<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mt="https://mediaarea.net/mediatrace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="html" version="1.0" indent="yes"/>
    <xsl:template match="/mt:MediaTrace">
        <xsl:for-each select="mt:media">
          <div class="mt_header">
              <h1>MediaTrace report</h1>
              <p>&#x1F41A; File path:  <xsl:value-of select="@ref"/></p>
          </div>
          <table id="mt_table">
          <xsl:for-each select="mt:block">
            <tr>
              <td>
              <xsl:value-of select="@name"/>
              <xsl:text> (</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
              <xsl:text> Offset: </xsl:text>
              <xsl:value-of select="@offset"/>
              </td>
            </tr>
              <xsl:if test="mt:block">
                  <xsl:apply-templates select="mt:block" />
              </xsl:if>
          </xsl:for-each>
          </table>
        </xsl:for-each>
        <style>
          .mt_header {
            width: 600px;
            border: 1px black solid;
            background-color: #64A8DD;
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
          }

          .mt_header h1, h2, div {
            text-align: center;
          }

          #mt_table {
            border: 1px black solid;
            width: 600px;
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
          }

          #mt_policy td {
            background-color: #64A8DD;
            font-size: 18px;
            font-weight: 700;
            padding: 10px;
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
          }
        </style>
    </xsl:template>

    <xsl:template match="mt:block">
      <tr>
        <td>
        <xsl:value-of select="@name"/>
        <xsl:text> (</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
        <xsl:text> Offset: </xsl:text>
        <xsl:value-of select="@offset"/>
        </td>
      </tr>
        <xsl:if test="mt:block">
            <xsl:apply-templates select="mt:block" />
        </xsl:if>
    </xsl:template>
</xsl:stylesheet>
