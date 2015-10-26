<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:mc="https://mediaarea.net/mediaconch" xmlns:ma="https://mediaarea.net/mediaarea" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi ma">
  <xsl:output encoding="UTF-8" method="xml" version="1.0" indent="yes"/>
  <xsl:template match="ma:MediaArea">
    <MediaConch>
      <xsl:attribute name="version">
        <xsl:text>0.1</xsl:text>
      </xsl:attribute>
      <policyChecks>
        <title>Test 2: Testing Multiple Files</title>
        <description>This policy checks all the files for conformance. Test2_2.mkv and Test2_3.mkv fail because they have been manipulated, but they fail in different ways.</description>
        <xsl:for-each select="ma:media">
          <media>
            <xsl:attribute name="ref">
              <xsl:value-of select="./@ref"/>
            </xsl:attribute>
            <policy>
              <xsl:attribute name="title">General UniqueID must exist. </xsl:attribute>
              <context>
                <xsl:attribute name="field">UniqueID</xsl:attribute>
              </context>
              <xsl:choose>
                <xsl:when test="ma:MediaInfo/ma:track[@type='General'][1]/ma:UniqueID">
                  <xsl:for-each select="ma:MediaInfo/ma:track[@type='General'][1]/ma:UniqueID">
                    <xsl:call-template name="">
                      <xsl:with-param name="xpath" select="."/>
                    </xsl:call-template>
                  </xsl:for-each>
                </xsl:when>
              </xsl:choose>
            </policy>
            <policy>
              <xsl:attribute name="title">General Format must be Matroska</xsl:attribute>
              <context>
                <xsl:attribute name="field">Format</xsl:attribute>
                <xsl:attribute name="value">Matroska</xsl:attribute>
              </context>
              <xsl:choose>
                <xsl:when test="ma:MediaInfo/ma:track[@type='General'][1]/ma:Format">
                  <xsl:for-each select="ma:MediaInfo/ma:track[@type='General'][1]/ma:Format">
                    <xsl:call-template name="is_equal">
                      <xsl:with-param name="xpath" select="."/>
                      <xsl:with-param name="value">Matroska</xsl:with-param>
                    </xsl:call-template>
                  </xsl:for-each>
                </xsl:when>
              </xsl:choose>
            </policy>
            <policy>
              <xsl:attribute name="title">General FileExtension must be mkv.</xsl:attribute>
              <context>
                <xsl:attribute name="value">track[@type='General']/FileExtension = 'mkv'</xsl:attribute>
              </context>
              <xsl:call-template name="is_true">
                <xsl:with-param name="xpath" select="track[@type='General']/FileExtension = 'mkv'"/>
              </xsl:call-template>
            </policy>
            <policy>
              <xsl:attribute name="title">General Duration must be 40 ms.</xsl:attribute>
              <context>
                <xsl:attribute name="field">Duration</xsl:attribute>
                <xsl:attribute name="value">40</xsl:attribute>
              </context>
              <xsl:choose>
                <xsl:when test="ma:MediaInfo/ma:track[@type='General'][1]/ma:Duration">
                  <xsl:for-each select="ma:MediaInfo/ma:track[@type='General'][1]/ma:Duration">
                    <xsl:call-template name="is_equal">
                      <xsl:with-param name="xpath" select="."/>
                      <xsl:with-param name="value">40</xsl:with-param>
                    </xsl:call-template>
                  </xsl:for-each>
                </xsl:when>
              </xsl:choose>
            </policy>
            <policy>
              <xsl:attribute name="title">General FrameRate must be 25</xsl:attribute>
              <context>
                <xsl:attribute name="field">FrameRate</xsl:attribute>
                <xsl:attribute name="value">25</xsl:attribute>
              </context>
              <xsl:choose>
                <xsl:when test="ma:MediaInfo/ma:track[@type='Video'][1]/ma:FrameRate">
                  <xsl:for-each select="ma:MediaInfo/ma:track[@type='Video'][1]/ma:FrameRate">
                    <xsl:call-template name="is_equal">
                      <xsl:with-param name="xpath" select="."/>
                      <xsl:with-param name="value">25</xsl:with-param>
                    </xsl:call-template>
                  </xsl:for-each>
                </xsl:when>
              </xsl:choose>
            </policy>
            <policy>
              <xsl:attribute name="title">Video stream must exist.</xsl:attribute>
              <context>
                <xsl:attribute name="value">track[@type='Video']</xsl:attribute>
              </context>
              <xsl:call-template name="is_true">
                <xsl:with-param name="xpath" select="track[@type='Video']"/>
              </xsl:call-template>
            </policy>
            <policy>
              <xsl:attribute name="title">Video Unique ID must exist.</xsl:attribute>
              <context>
                <xsl:attribute name="value">track[@type='Video']/UniqueID</xsl:attribute>
              </context>
              <xsl:call-template name="is_true">
                <xsl:with-param name="xpath" select="track[@type='Video']/UniqueID"/>
              </xsl:call-template>
            </policy>
            <policy>
              <xsl:attribute name="title">Video Format must equal RGB</xsl:attribute>
              <context>
                <xsl:attribute name="field">Format</xsl:attribute>
                <xsl:attribute name="value">RGB</xsl:attribute>
              </context>
              <xsl:choose>
                <xsl:when test="ma:MediaInfo/ma:track[@type='Video'][1]/ma:Format">
                  <xsl:for-each select="ma:MediaInfo/ma:track[@type='Video'][1]/ma:Format">
                    <xsl:call-template name="is_equal">
                      <xsl:with-param name="xpath" select="."/>
                      <xsl:with-param name="value">RGB</xsl:with-param>
                    </xsl:call-template>
                  </xsl:for-each>
                </xsl:when>
              </xsl:choose>
            </policy>
            <policy>
              <xsl:attribute name="title">Video DisplayAspectRatio must be 1.</xsl:attribute>
              <context>
                <xsl:attribute name="field">DisplayAspectRatio</xsl:attribute>
                <xsl:attribute name="value">1.</xsl:attribute>
              </context>
              <xsl:choose>
                <xsl:when test="ma:MediaInfo/ma:track[@type='Video'][1]/ma:DisplayAspectRatio">
                  <xsl:for-each select="ma:MediaInfo/ma:track[@type='Video'][1]/ma:DisplayAspectRatio">
                    <xsl:call-template name="is_equal">
                      <xsl:with-param name="xpath" select="."/>
                      <xsl:with-param name="value">1.</xsl:with-param>
                    </xsl:call-template>
                  </xsl:for-each>
                </xsl:when>
              </xsl:choose>
            </policy>
          </media>
        </xsl:for-each>
      </policyChecks>
    </MediaConch>
  </xsl:template>
  <xsl:template name="is_true">
    <xsl:param name="xpath"/>
    <xsl:element name="test">
      <xsl:if test="../@type">
        <xsl:attribute name="tracktype">
          <xsl:value-of select="../@type"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:if test="../@streamid">
        <xsl:attribute name="streamid">
          <xsl:value-of select="../@streamid"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:choose>
        <xsl:when test="$xpath">
          <xsl:attribute name="outcome">pass</xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="outcome">fail</xsl:attribute>
          <xsl:attribute name="reason">is not true</xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:element>
  </xsl:template>
  <xsl:template name="is_equal">
    <xsl:param name="xpath"/>
    <xsl:param name="value"/>
    <xsl:element name="test">
      <xsl:if test="../@type">
        <xsl:attribute name="tracktype">
          <xsl:value-of select="../@type"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:if test="../@streamid">
        <xsl:attribute name="streamid">
          <xsl:value-of select="../@streamid"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:attribute name="actual">
        <xsl:value-of select="$xpath"/>
      </xsl:attribute>
      <xsl:choose>
        <xsl:when test="$xpath = $value">
          <xsl:attribute name="outcome">pass</xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="outcome">fail</xsl:attribute>
          <xsl:attribute name="reason">is not equal</xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:element>
  </xsl:template>
  <xsl:template name="is_not_equal">
    <xsl:param name="xpath"/>
    <xsl:param name="value"/>
    <xsl:element name="test">
      <xsl:if test="../@type">
        <xsl:attribute name="tracktype">
          <xsl:value-of select="../@type"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:if test="../@streamid">
        <xsl:attribute name="streamid">
          <xsl:value-of select="../@streamid"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:attribute name="expected">
        <xsl:value-of select="$value"/>
      </xsl:attribute>
      <xsl:attribute name="actual">
        <xsl:value-of select="$xpath"/>
      </xsl:attribute>
      <xsl:choose>
        <xsl:when test="$xpath != $value">
          <xsl:attribute name="outcome">pass</xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="outcome">fail</xsl:attribute>
          <xsl:attribute name="reason">is equal</xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:element>
  </xsl:template>
  <xsl:template name="is_greater_than">
    <xsl:param name="xpath"/>
    <xsl:param name="value"/>
    <xsl:element name="test">
      <xsl:if test="../@type">
        <xsl:attribute name="tracktype">
          <xsl:value-of select="../@type"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:if test="../@streamid">
        <xsl:attribute name="streamid">
          <xsl:value-of select="../@streamid"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:attribute name="expected">
        <xsl:value-of select="$value"/>
      </xsl:attribute>
      <xsl:attribute name="actual">
        <xsl:value-of select="$xpath"/>
      </xsl:attribute>
      <xsl:choose>
        <xsl:when test="$xpath &gt; $value">
          <xsl:attribute name="outcome">pass</xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="outcome">fail</xsl:attribute>
          <xsl:attribute name="reason">is less than or equal</xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:element>
  </xsl:template>
  <xsl:template name="is_less_than">
    <xsl:param name="xpath"/>
    <xsl:param name="value"/>
    <xsl:element name="test">
      <xsl:if test="../@type">
        <xsl:attribute name="tracktype">
          <xsl:value-of select="../@type"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:if test="../@streamid">
        <xsl:attribute name="streamid">
          <xsl:value-of select="../@streamid"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:attribute name="expected">
        <xsl:value-of select="$value"/>
      </xsl:attribute>
      <xsl:attribute name="actual">
        <xsl:value-of select="$xpath"/>
      </xsl:attribute>
      <xsl:choose>
        <xsl:when test="$xpath &lt; $value">
          <xsl:attribute name="outcome">pass</xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="outcome">fail</xsl:attribute>
          <xsl:attribute name="reason">is greater than or equal</xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:element>
  </xsl:template>
  <xsl:template name="is_greater_or_equal_than">
    <xsl:param name="xpath"/>
    <xsl:param name="value"/>
    <xsl:element name="test">
      <xsl:if test="../@type">
        <xsl:attribute name="tracktype">
          <xsl:value-of select="../@type"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:if test="../@streamid">
        <xsl:attribute name="streamid">
          <xsl:value-of select="../@streamid"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:attribute name="expected">
        <xsl:value-of select="$value"/>
      </xsl:attribute>
      <xsl:attribute name="actual">
        <xsl:value-of select="$xpath"/>
      </xsl:attribute>
      <xsl:choose>
        <xsl:when test="$xpath &gt;= $value">
          <xsl:attribute name="outcome">pass</xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="outcome">fail</xsl:attribute>
          <xsl:attribute name="reason">is less than</xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:element>
  </xsl:template>
  <xsl:template name="is_less_or_equal_than">
    <xsl:param name="xpath"/>
    <xsl:param name="value"/>
    <xsl:element name="test">
      <xsl:if test="../@type">
        <xsl:attribute name="tracktype">
          <xsl:value-of select="../@type"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:if test="../@streamid">
        <xsl:attribute name="streamid">
          <xsl:value-of select="../@streamid"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:attribute name="expected">
        <xsl:value-of select="$value"/>
      </xsl:attribute>
      <xsl:attribute name="actual">
        <xsl:value-of select="$xpath"/>
      </xsl:attribute>
      <xsl:choose>
        <xsl:when test="$xpath &lt;= $value">
          <xsl:attribute name="outcome">pass</xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="outcome">fail</xsl:attribute>
          <xsl:attribute name="reason">is greater than</xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:element>
  </xsl:template>
  <xsl:template name="exists">
    <xsl:param name="xpath"/>
    <xsl:element name="test">
      <xsl:if test="../@type">
        <xsl:attribute name="tracktype">
          <xsl:value-of select="../@type"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:if test="../@streamid">
        <xsl:attribute name="streamid">
          <xsl:value-of select="../@streamid"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:attribute name="actual">
        <xsl:value-of select="$xpath"/>
      </xsl:attribute>
      <xsl:choose>
        <xsl:when test="string-length($xpath) != 0">
          <xsl:attribute name="outcome">pass</xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="outcome">fail</xsl:attribute>
          <xsl:attribute name="reason">does not exist</xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:element>
  </xsl:template>
  <xsl:template name="does_not_exist">
    <xsl:param name="xpath"/>
    <xsl:element name="test">
      <xsl:if test="../@type">
        <xsl:attribute name="tracktype">
          <xsl:value-of select="../@type"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:if test="../@streamid">
        <xsl:attribute name="streamid">
          <xsl:value-of select="../@streamid"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:attribute name="actual">
        <xsl:value-of select="$xpath"/>
      </xsl:attribute>
      <xsl:choose>
        <xsl:when test="string-length($xpath) = '0'">
          <xsl:attribute name="outcome">pass</xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="outcome">fail</xsl:attribute>
          <xsl:attribute name="reason">exists</xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:element>
  </xsl:template>
  <xsl:template name="contains_string">
    <xsl:param name="xpath"/>
    <xsl:param name="value"/>
    <xsl:element name="test">
      <xsl:if test="../@type">
        <xsl:attribute name="tracktype">
          <xsl:value-of select="../@type"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:if test="../@streamid">
        <xsl:attribute name="streamid">
          <xsl:value-of select="../@streamid"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:attribute name="expected">
        <xsl:value-of select="$value"/>
      </xsl:attribute>
      <xsl:attribute name="actual">
        <xsl:value-of select="$xpath"/>
      </xsl:attribute>
      <xsl:choose>
        <xsl:when test="contains($xpath, $value)">
          <xsl:attribute name="outcome">pass</xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="outcome">fail</xsl:attribute>
          <xsl:attribute name="reason">does not contain</xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:element>
  </xsl:template>
</xsl:stylesheet>
