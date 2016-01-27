<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mt="https://mediaarea.net/mediatrace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="html" version="1.0" indent="yes"/>
<xsl:variable name="spaces"><xsl:text> &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;</xsl:text></xsl:variable>
    <xsl:template match="/mt:MediaTrace">
      <html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
          .mt_header {
            width: 600px;
            border: 1px black solid;
            background-color: #64A8DD;
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
          }

          .mt_header h1, .mc_header h2, .mc_header div {
            text-align: center;
          }

          #mt_table {
            border: 1px black solid;
            width: 600px;
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
          }

          #mt_table span {
            float:right;
          }
        </style>
      </head>
      <body>
        <xsl:for-each select="mt:media">
          <div class="mt_header">
              <h1>MediaTrace report</h1>
              <p>&#x1F41A; File path:  <xsl:value-of select="@ref"/></p>
          </div>
          <table id="mt_table">
          <xsl:for-each select="mt:block">
            <tr><td>
              <xsl:variable name="offsetHex">
                  <xsl:call-template name="DecToHex">
                      <xsl:with-param name="dec">
                          <xsl:value-of select="@offset"/>
                      </xsl:with-param>
                  </xsl:call-template>
              </xsl:variable>
              <xsl:text>&#xa;</xsl:text>
              <xsl:value-of select="concat(substring('0000000', string-length($offsetHex)), $offsetHex)"/>
              <xsl:text> </xsl:text>
              <xsl:value-of select="@name"/>
              <xsl:text> (</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
            </td></tr>
              <xsl:apply-templates select="mt:data" />
              <xsl:if test="mt:block">
                <xsl:apply-templates select="mt:block" />
              </xsl:if>
          </xsl:for-each>
          </table>
        </xsl:for-each>
      </body>
      </html>
    </xsl:template>

    <xsl:template match="mt:block">
      <tr><td>
        <xsl:variable name="offsetHex">
            <xsl:call-template name="DecToHex">
                <xsl:with-param name="dec">
                    <xsl:value-of select="@offset"/>
                </xsl:with-param>
            </xsl:call-template>
        </xsl:variable>
        <xsl:value-of select="concat(substring('0000000', string-length($offsetHex)), $offsetHex)"/>
        <xsl:text> </xsl:text>
        <xsl:value-of select="@name"/>
        <xsl:if test="@info">
            <xsl:text> - </xsl:text>
            <xsl:value-of select="@info"/>
        </xsl:if>
        <xsl:if test="@info2">
            <xsl:text> - </xsl:text>
            <xsl:value-of select="@info2"/>
        </xsl:if>
        <xsl:if test="@info3">
            <xsl:text> - </xsl:text>
            <xsl:value-of select="@info3"/>
        </xsl:if>
        <xsl:if test="@info4">
            <xsl:text> - </xsl:text>
            <xsl:value-of select="@info4"/>
        </xsl:if>
        <xsl:if test="@info5">
            <xsl:text> - </xsl:text>
            <xsl:value-of select="@info5"/>
        </xsl:if>
        <xsl:if test="@info6">
            <xsl:text> - </xsl:text>
            <xsl:value-of select="@info6"/>
        </xsl:if>
        <xsl:if test="@info7">
            <xsl:text> - </xsl:text>
            <xsl:value-of select="@info7"/>
        </xsl:if>
        <xsl:if test="@info8">
            <xsl:text> - </xsl:text>
            <xsl:value-of select="@info8"/>
        </xsl:if>
        <xsl:text> (</xsl:text><xsl:value-of select="@size"/><xsl:text> bytes)</xsl:text>
       </td></tr>
      <xsl:apply-templates select="mt:data|mt:block" />
    </xsl:template>

    <xsl:template match="mt:data">
      <tr><td>
          <xsl:variable name="offsetHex">
              <xsl:call-template name="DecToHex">
                  <xsl:with-param name="dec">
                      <xsl:value-of select="@offset"/>
                  </xsl:with-param>
              </xsl:call-template>
          </xsl:variable>
          <xsl:text>&#xa;</xsl:text>
          <xsl:value-of select="concat(substring('0000000', string-length($offsetHex)), $offsetHex)"/>
          <xsl:text> </xsl:text>
          <xsl:value-of select="substring($spaces,2,count(ancestor::mt:block))"/>
          <xsl:value-of select="@name"/>
          <xsl:text>: </xsl:text>
          <span>
          <xsl:value-of select="text()"/>
          <xsl:if test="floor(text())">
              <xsl:text> (0x</xsl:text>
              <xsl:call-template name="DecToHex">
                  <xsl:with-param name="dec">
                      <xsl:value-of select="text()"/>
                  </xsl:with-param>
              </xsl:call-template>
              <xsl:text>)</xsl:text>
          </xsl:if>
          <xsl:if test="@info">
              <xsl:text> </xsl:text>
              <xsl:value-of select="@info"/>
          </xsl:if>
          <xsl:if test="@info2">
              <xsl:text> - </xsl:text>
              <xsl:value-of select="@info2"/>
          </xsl:if>
          <xsl:if test="@info3">
              <xsl:text> - </xsl:text>
              <xsl:value-of select="@info3"/>
          </xsl:if>
          <xsl:if test="@info4">
              <xsl:text> - </xsl:text>
              <xsl:value-of select="@info4"/>
          </xsl:if>
          <xsl:if test="@info5">
              <xsl:text> - </xsl:text>
              <xsl:value-of select="@info5"/>
          </xsl:if>
          <xsl:if test="@info6">
              <xsl:text> - </xsl:text>
              <xsl:value-of select="@info6"/>
          </xsl:if>
          <xsl:if test="@info7">
              <xsl:text> - </xsl:text>
              <xsl:value-of select="@info7"/>
          </xsl:if>
          <xsl:if test="@info8">
              <xsl:text> - </xsl:text>
              <xsl:value-of select="@info8"/>
          </xsl:if>
        </span>
      </td></tr>
    </xsl:template>

    <xsl:template name="DecToHex">
        <xsl:param name="dec" />
        <xsl:choose>
            <xsl:when test="$dec > 0">
                <xsl:call-template name="DecToHex">
                    <xsl:with-param name="dec" select="floor($dec div 16)" />
                </xsl:call-template>
                <xsl:choose>
                    <xsl:when test="$dec mod 16 &lt; 10">
                        <xsl:value-of select="$dec mod 16" />
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:choose>
                            <xsl:when test="$dec mod 16 = 10">A</xsl:when>
                            <xsl:when test="$dec mod 16 = 11">B</xsl:when>
                            <xsl:when test="$dec mod 16 = 12">C</xsl:when>
                            <xsl:when test="$dec mod 16 = 13">D</xsl:when>
                            <xsl:when test="$dec mod 16 = 14">E</xsl:when>
                            <xsl:when test="$dec mod 16 = 15">F</xsl:when>
                            <xsl:otherwise>A</xsl:otherwise>
                        </xsl:choose>
                    </xsl:otherwise>
                </xsl:choose>
            </xsl:when>
            <xsl:otherwise>0</xsl:otherwise>
        </xsl:choose>
    </xsl:template>
</xsl:stylesheet>
