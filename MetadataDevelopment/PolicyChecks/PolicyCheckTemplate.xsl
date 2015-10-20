<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="https://mediaarea.net/mediaconch" xmlns:ma="https://mediaarea.net/mediaarea" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi ma">
    <xsl:output encoding="UTF-8" method="xml" version="1.0" indent="yes"/>
    <xsl:template match="ma:MediaArea">
        <MediaConch>
            <xsl:attribute name="version">
                <xsl:text>0.1</xsl:text>
            </xsl:attribute>
            <policyChecks>
                <title>This is the policy set title</title>
                <description>This is the policy set title</description>
                <xsl:for-each select="ma:media">
                    <media>
                        <xsl:attribute name="ref">
                            <xsl:value-of select="./@ref"/>
                        </xsl:attribute>
                        <!-- the for-each loop doesn't apply to is_true functions where the xpath is passed as a user-construction -->
                        <!-- the is_true function and example here is for the special case when the free text entry is used, thus only title and xpath are available -->
                        <policy>
                            <xsl:attribute name="title">Is Matroska or QuickTime</xsl:attribute>
                            <xsl:call-template name="is_true">
                                <xsl:with-param name="xpath" select="ma:MediaInfo/ma:track[@type='General'][1]/ma:Format = 'Matroska' or ma:MediaInfo/ma:track[@type='General'][1]/ma:Format = 'AVI'"/>
                                <xsl:with-param name="value">ma:MediaInfo/ma:track[@type='General'][1]/ma:Format = 'Matroska' or ma:MediaInfo/ma:track[@type='General'][1]/ma:Format = 'AVI'</xsl:with-param>
                            </xsl:call-template>
                        </policy>
                        <policy>
                            <xsl:attribute name="title">Is Matroska</xsl:attribute>
                            <xsl:for-each select="ma:MediaInfo/ma:track[@type='General'][1]/ma:Format">
                                <xsl:call-template name="is_equal">
                                    <xsl:with-param name="xpath" select="."/>
                                    <xsl:with-param name="value">Matroska</xsl:with-param>
                                    <xsl:with-param name="field">Format</xsl:with-param>
                                </xsl:call-template>
                            </xsl:for-each>
                        </policy>
                        <policy>
                            <xsl:attribute name="title">Is FFV1</xsl:attribute>
                            <xsl:for-each select="ma:MediaInfo/ma:track[@type='Video'][1]/ma:Format">
                                <xsl:call-template name="is_equal">
                                    <xsl:with-param name="xpath" select="."/>
                                    <xsl:with-param name="value">FFV1</xsl:with-param>
                                    <xsl:with-param name="field">Format</xsl:with-param>
                                </xsl:call-template>
                            </xsl:for-each>
                        </policy>
                        <policy>
                            <xsl:attribute name="title">Audio is PCM</xsl:attribute>
                            <xsl:for-each select="ma:MediaInfo/ma:track[@type='Audio'][*]/ma:Format">
                                <xsl:call-template name="is_equal">
                                    <xsl:with-param name="xpath" select="."/>
                                    <xsl:with-param name="value">PCM</xsl:with-param>
                                    <xsl:with-param name="field">Format</xsl:with-param>
                                </xsl:call-template>
                            </xsl:for-each>
                        </policy>
                        <policy>
                            <xsl:attribute name="title">Format version is Version 3.1</xsl:attribute>
                            <xsl:for-each select="ma:MediaInfo/ma:track[@type='Video'][1]/ma:Format_Version">
                                <xsl:call-template name="is_equal">
                                    <xsl:with-param name="xpath" select="."/>
                                    <xsl:with-param name="value">Version 3.1</xsl:with-param>
                                    <xsl:with-param name="field">Format_Version</xsl:with-param>
                                </xsl:call-template>
                            </xsl:for-each>
                        </policy>
                        <policy>
                            <xsl:attribute name="title">FileSize is greater than 0</xsl:attribute>
                            <xsl:for-each select="ma:MediaInfo/ma:track[@type='General'][1]/ma:FileSize">
                                <xsl:call-template name="is_greater_than">
                                    <xsl:with-param name="xpath" select="."/>
                                    <xsl:with-param name="value">0</xsl:with-param>
                                    <xsl:with-param name="field">FileSize</xsl:with-param>
                                </xsl:call-template>
                            </xsl:for-each>
                        </policy>
                        <policy>
                            <xsl:attribute name="title">Video track exists</xsl:attribute>
                            <xsl:for-each select="ma:MediaInfo/ma:track[@type='Video'][1]/ma:Format">
                                <xsl:call-template name="exists">
                                    <xsl:with-param name="xpath" select="."/>
                                    <xsl:with-param name="field">Format</xsl:with-param>
                                </xsl:call-template>
                            </xsl:for-each>
                        </policy>
                        <policy>
                            <xsl:attribute name="title">Fake video track does not exist</xsl:attribute>
                            <xsl:for-each select="ma:MediaInfo/ma:track[@type='Video'][1]/ma:Formatzzzzz">
                                <xsl:call-template name="does_not_exist">
                                    <xsl:with-param name="xpath" select="."/>
                                    <xsl:with-param name="field">Formatzzzzz</xsl:with-param>
                                </xsl:call-template>
                            </xsl:for-each>
                        </policy>
                        <policy>
                            <xsl:attribute name="title">Format contains 1</xsl:attribute>
                            <xsl:for-each select="ma:MediaInfo/ma:track[@type='Video'][1]/ma:Format">
                                <xsl:call-template name="contains_string">
                                    <xsl:with-param name="xpath" select="."/>
                                    <xsl:with-param name="value">1</xsl:with-param>
                                    <xsl:with-param name="field">Format</xsl:with-param>
                                </xsl:call-template>
                            </xsl:for-each>
                        </policy>
                        <policy>
                            <xsl:attribute name="title">Format version does not contain 1</xsl:attribute>
                            <xsl:for-each select="ma:MediaInfo/ma:track[@type='Video'][1]/ma:Format_Version">
                                <xsl:call-template name="contains_string">
                                    <xsl:with-param name="xpath" select="."/>
                                    <xsl:with-param name="value">1</xsl:with-param>
                                    <xsl:with-param name="field">Format</xsl:with-param>
                                </xsl:call-template>
                            </xsl:for-each>
                        </policy>
                    </media>
                </xsl:for-each>
            </policyChecks>
        </MediaConch>
    </xsl:template>
    <xsl:variable name="lower" select="'abcdefghijklmnopqrstuvwxyz'"/>
    <xsl:variable name="upper" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'"/>
    <xsl:variable name="digit" select="'0123456789'"/>
    <xsl:variable name="period" select="'.'"/>
    <xsl:variable name="comma" select="','"/>
    <xsl:variable name="decimal" select="concat($digit, $period, $comma)"/>
    <xsl:template name="is_true">
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="field"/>
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
            <xsl:attribute name="field">
                <xsl:value-of select="$field"/>
            </xsl:attribute>
            <xsl:attribute name="expected">
                <xsl:value-of select="$value"/>
            </xsl:attribute>
            <xsl:attribute name="actual">
                <xsl:value-of select="$xpath"/>
            </xsl:attribute>
            <xsl:choose>
                <xsl:when test="$xpath">
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">pass</xsl:attribute>
                    </xsl:element>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">fail</xsl:attribute>
                        <xsl:attribute name="reason">is not true</xsl:attribute>
                    </xsl:element>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    <xsl:template name="is_equal">
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="field"/>
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
            <xsl:attribute name="field">
                <xsl:value-of select="$field"/>
            </xsl:attribute>
            <xsl:attribute name="expected">
                <xsl:value-of select="$value"/>
            </xsl:attribute>
            <xsl:attribute name="actual">
                <xsl:value-of select="$xpath"/>
            </xsl:attribute>
            <xsl:choose>
                <xsl:when test="$xpath = $value">
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">pass</xsl:attribute>
                    </xsl:element>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">fail</xsl:attribute>
                        <xsl:attribute name="reason">is not equal</xsl:attribute>
                    </xsl:element>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    <xsl:template name="is_not_equal">
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="field"/>
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
            <xsl:attribute name="field">
                <xsl:value-of select="$field"/>
            </xsl:attribute>
            <xsl:attribute name="expected">
                <xsl:value-of select="$value"/>
            </xsl:attribute>
            <xsl:attribute name="actual">
                <xsl:value-of select="$xpath"/>
            </xsl:attribute>
            <xsl:choose>
                <xsl:when test="$xpath != $value">
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">pass</xsl:attribute>
                    </xsl:element>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">fail</xsl:attribute>
                        <xsl:attribute name="reason">is equal</xsl:attribute>
                    </xsl:element>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    <xsl:template name="is_greater_than">
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="field"/>
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
            <xsl:attribute name="field">
                <xsl:value-of select="$field"/>
            </xsl:attribute>
            <xsl:attribute name="expected">
                <xsl:value-of select="$value"/>
            </xsl:attribute>
            <xsl:attribute name="actual">
                <xsl:value-of select="$xpath"/>
            </xsl:attribute>
            <xsl:choose>
                <xsl:when test="$xpath &gt; $value">
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">pass</xsl:attribute>
                    </xsl:element>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">fail</xsl:attribute>
                        <xsl:attribute name="reason">is less than or equal</xsl:attribute>
                    </xsl:element>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    <xsl:template name="is_less_than">
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="field"/>
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
            <xsl:attribute name="field">
                <xsl:value-of select="$field"/>
            </xsl:attribute>
            <xsl:attribute name="expected">
                <xsl:value-of select="$value"/>
            </xsl:attribute>
            <xsl:attribute name="actual">
                <xsl:value-of select="$xpath"/>
            </xsl:attribute>
            <xsl:choose>
                <xsl:when test="$xpath &lt; $value">
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">pass</xsl:attribute>
                    </xsl:element>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">fail</xsl:attribute>
                        <xsl:attribute name="reason">is greater than or equal</xsl:attribute>
                    </xsl:element>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    <xsl:template name="is_greater_or_equal_than">
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="field"/>
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
            <xsl:attribute name="field">
                <xsl:value-of select="$field"/>
            </xsl:attribute>
            <xsl:attribute name="expected">
                <xsl:value-of select="$value"/>
            </xsl:attribute>
            <xsl:attribute name="actual">
                <xsl:value-of select="$xpath"/>
            </xsl:attribute>
            <xsl:choose>
                <xsl:when test="$xpath &gt;= $value">
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">pass</xsl:attribute>
                    </xsl:element>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">fail</xsl:attribute>
                        <xsl:attribute name="reason">is less than</xsl:attribute>
                    </xsl:element>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    <xsl:template name="is_less_or_equal_than">
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="field"/>
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
            <xsl:attribute name="field">
                <xsl:value-of select="$field"/>
            </xsl:attribute>
            <xsl:attribute name="expected">
                <xsl:value-of select="$value"/>
            </xsl:attribute>
            <xsl:attribute name="actual">
                <xsl:value-of select="$xpath"/>
            </xsl:attribute>
            <xsl:choose>
                <xsl:when test="$xpath &lt;= $value">
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">pass</xsl:attribute>
                    </xsl:element>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">fail</xsl:attribute>
                        <xsl:attribute name="reason">is greater than</xsl:attribute>
                    </xsl:element>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    <xsl:template name="exists">
        <xsl:param name="xpath"/>
        <xsl:param name="field"/>
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
            <xsl:attribute name="field">
                <xsl:value-of select="$field"/>
            </xsl:attribute>
            <xsl:attribute name="actual">
                <xsl:value-of select="$xpath"/>
            </xsl:attribute>
            <xsl:choose>
                <xsl:when test="string-length($xpath) != 0">
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">pass</xsl:attribute>
                    </xsl:element>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">fail</xsl:attribute>
                        <xsl:attribute name="reason">does not exist</xsl:attribute>
                    </xsl:element>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    <xsl:template name="does_not_exist">
        <xsl:param name="xpath"/>
        <xsl:param name="field"/>
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
            <xsl:attribute name="field">
                <xsl:value-of select="$field"/>
            </xsl:attribute>
            <xsl:attribute name="actual">
                <xsl:value-of select="$xpath"/>
            </xsl:attribute>
            <xsl:choose>
                <xsl:when test="string-length($xpath) = '0'">
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">pass</xsl:attribute>
                    </xsl:element>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">fail</xsl:attribute>
                        <xsl:attribute name="reason">exists</xsl:attribute>
                    </xsl:element>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    <xsl:template name="contains_string">
        <xsl:param name="xpath"/>
        <xsl:param name="value"/>
        <xsl:param name="field"/>
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
            <xsl:attribute name="field">
                <xsl:value-of select="$field"/>
            </xsl:attribute>
            <xsl:attribute name="expected">
                <xsl:value-of select="$value"/>
            </xsl:attribute>
            <xsl:attribute name="actual">
                <xsl:value-of select="$xpath"/>
            </xsl:attribute>
            <xsl:choose>
                <xsl:when test="contains($xpath, $value)">
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">pass</xsl:attribute>
                    </xsl:element>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:element name="result">
                        <xsl:attribute name="outcome">fail</xsl:attribute>
                        <xsl:attribute name="reason">does not contain</xsl:attribute>
                    </xsl:element>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
</xsl:stylesheet>
