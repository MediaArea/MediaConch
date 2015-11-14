<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="https://mediaarea.net/mediaconch" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi">
    <xsl:output encoding="UTF-8" method="xml" version="1.0" indent="yes"/>
    <xsl:template match="globalreport">
        <MediaConch>
            <xsl:attribute name="version">
                <xsl:text>0.1</xsl:text>
            </xsl:attribute>
            <xsl:for-each select="individualreports/report">
                  <media>
                      <xsl:attribute name="ref">
                          <xsl:value-of select="//tag[name='DocumentName']/value"/>
                      </xsl:attribute>
                      <xsl:for-each select="//implementation_checker">
                          <implementationChecks>
                              <name>DPF Manager TIFF Implementation Checker</name>
                              <xsl:for-each select="//result">
                                  <check>
                                      <xsl:if test="level='critical'">
                                          <xsl:attribute name="outcome">
                                              <xsl:text>fail</xsl:text>
                                          </xsl:attribute>
                                      </xsl:if>
                                      <xsl:attribute name="reason">
                                          <xsl:value-of select="msg"/>
                                      </xsl:attribute>
                                  </check>
                              </xsl:for-each>
                          </implementationChecks>
                      </xsl:for-each>
                  </media>
              </xsl:for-each>
        </MediaConch>
    </xsl:template>
</xsl:stylesheet>
