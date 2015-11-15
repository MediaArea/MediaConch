<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mc="https://mediaarea.net/mediaconch" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:x="http://www.w3.org/1999/xhtml" version="1.0" extension-element-prefixes="xsi" exclude-result-prefixes="x" >
  <xsl:output encoding="UTF-8" method="html" version="1.0" indent="yes"/>
  <xsl:template match="/mc:MediaConch">
  	<link rel="stylesheet" type="text/css"  href="style.css" />
    <xsl:for-each select="mc:media">
      <div class="mc_header">
        <div>
        <xsl:text>&#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A; &#x1F41A;</xsl:text>
        </div>
        <h1>MediaConch Report</h1>
        <div>
        <xsl:text>&#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A;  &#x1F41A; &#x1F41A;</xsl:text>
        </div>
        <b>
          <p>&#x1F41A; File path:  <xsl:value-of select="@ref"/></p>
        </b>
      </div>
      <xsl:for-each select="mc:implementationChecks">
        <div class="mc_header">
          <h2>
            <xsl:value-of select="mc:name"/>
          </h2>
          <p>
            <xsl:value-of select="mc:description"/>
          </p>
        </div>
        <table id="mc_implementation">
            <xsl:for-each select="mc:check">
              <tr>
                <td>
                  <p>
                    <xsl:value-of select="@icid"/>
                  </p>
                  <xsl:if test="mc:context/@name != ''">
                    <p>
                      <xsl:text>Context (name): </xsl:text>
                      <xsl:value-of select="mc:context/@name"/>
                    </p>
                  </xsl:if>
                  <table>
                    <tr>
                      <th>value</th>
                      <th>outcome</th>
                      <th>reason</th>
                    </tr>
                    <xsl:for-each select="mc:test">
                      <tr>
                        <td>
                          <xsl:for-each select="mc:value">
                            <xsl:if test="@name != ''">
                              <xsl:value-of select="@name"/>
                              <xsl:text>=</xsl:text>
                            </xsl:if>
                            <xsl:value-of select="."/>
                            <br/>
                          </xsl:for-each>
                        </td>
                        <td>
                          <xsl:if test="@outcome = 'pass'">
                            <xsl:text>&#x2705;  </xsl:text>
                          </xsl:if>
                          <xsl:if test="@outcome = 'fail'">
                            <xsl:text>&#x274C;  </xsl:text>
                          </xsl:if>
                          <xsl:value-of select="@outcome"/>
                        </td>
                        <td>
                          <xsl:value-of select="@reason"/>
                        </td>
                      </tr>
                    </xsl:for-each>
                  </table>
                </td>
              </tr>
            </xsl:for-each>
          </table>
      </xsl:for-each>
      <xsl:for-each select="mc:policyChecks">
        <div class="mc_header">
          <h2>
            <xsl:value-of select="mc:name"/>
          </h2>
          <p>
            <xsl:value-of select="mc:description"/>
          </p>
        </div>
        <table id="mc_policy">
          <xsl:for-each select="mc:check">
            <tr>
              <td>
                <p>
                  <xsl:value-of select="@name"/>
                </p>
                <xsl:if test="mc:context/@field != ''">
                  <p>
                    <xsl:text>Context (field): </xsl:text>
                    <xsl:value-of select="mc:context/@field"/>
                  </p>
                </xsl:if>
                <xsl:if test="mc:context/@value != ''">
                  <p>
                    <xsl:text>Context (value): </xsl:text>
                    <xsl:value-of select="mc:context/@value"/>
                  </p>
                </xsl:if>
                <table>
                  <tr>
                    <th>tracktype</th>
                    <th>tracktypeorder</th>
                    <th>trackid</th>
                    <th>actual</th>
                    <th>outcome</th>
                    <th>reason</th>
                  </tr>
                  <xsl:for-each select="mc:test">
                    <tr>
                      <td>
                        <xsl:value-of select="@tracktype"/>
                      </td>
                      <td>
                        <xsl:value-of select="@tracktypeorder"/>
                      </td>
                      <td>
                        <xsl:value-of select="@trackid"/>
                      </td>
                      <td>
                        <xsl:value-of select="@actual"/>
                      </td>
                      <td>
                        <xsl:if test="@outcome = 'pass'">
                          <xsl:text>&#x2705;  </xsl:text>
                        </xsl:if>
                        <xsl:if test="@outcome = 'fail'">
                          <xsl:text>&#x274C;  </xsl:text>
                        </xsl:if>
                        <xsl:value-of select="@outcome"/>
                      </td>
                      <td>
                        <xsl:value-of select="@reason"/>
                      </td>
                    </tr>
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
