<?php

namespace AppBundle\Lib\XslPolicy;

use AppBundle\Entity\XslPolicy;
use AppBundle\Entity\XslPolicyRule;

class XslPolicyWriter
{
    protected $policy;

    public function __construct()
    {
    }

    public function setPolicy(XslPolicy $policy)
    {
        $this->policy = $policy;

        return $this;
    }

    public function writeXsl($file)
    {
        $xsl = $this->getHeader() . $this->getPolicyRules() . $this->getFooter();
        file_put_contents($file, $xsl);
    }

    protected function getPolicyRules()
    {
        $rules = '';
        foreach ($this->policy->getRules() as $rule) {
            switch ($rule->getValidator()) {
                case 'is_true':
                    $rules .= '
                        <policy>
                            <xsl:attribute name="title">' . $rule->getTitle() . '</xsl:attribute>
                            <context>
                                <xsl:attribute name="value">' . $rule->getValue() . '</xsl:attribute>
                            </context>
                            <xsl:call-template name="is_true">
                                <xsl:with-param name="xpath" select="' . $rule->getValue() . '"/>
                            </xsl:call-template>
                        </policy>';
                break;

                case 'exists':
                case 'does_not_exist':
                    $rules .= '
                        <policy>
                            <xsl:attribute name="title">' . $rule->getTitle() . '</xsl:attribute>
                            <context>
                                <xsl:attribute name="field">' . $rule->getField() . '</xsl:attribute>
                            </context>
                            <xsl:choose>
                                <xsl:when test="' . $rule->getXpath() . '">
                                    <xsl:for-each select="' . $rule->getXpath() . '">
                                        <xsl:call-template name="' . $rule->getValidator() . '">
                                            <xsl:with-param name="xpath" select="."/>
                                        </xsl:call-template>
                                    </xsl:for-each>
                                </xsl:when>
                                <xsl:otherwise>
                                    <test outcome="invalid"/>
                                </xsl:otherwise>
                            </xsl:choose>
                        </policy>';
                break;

                default:
                    $rules .= '
                        <policy>
                            <xsl:attribute name="title">' . $rule->getTitle() . '</xsl:attribute>
                            <context>
                                <xsl:attribute name="field">' . $rule->getField() . '</xsl:attribute>
                                <xsl:attribute name="value">' . $rule->getValue() . '</xsl:attribute>
                            </context>
                            <xsl:choose>
                                <xsl:when test="' . $rule->getXpath() . '">
                                    <xsl:for-each select="' . $rule->getXpath() . '">
                                        <xsl:call-template name="' . $rule->getValidator() . '">
                                            <xsl:with-param name="xpath" select="."/>
                                            <xsl:with-param name="value">' . $rule->getValue() . '</xsl:with-param>
                                        </xsl:call-template>
                                    </xsl:for-each>
                                </xsl:when>
                                <xsl:otherwise>
                                    <test outcome="invalid"/>
                                </xsl:otherwise>
                            </xsl:choose>
                        </policy>';
                break;
            }
        }

        return $rules;
    }

    protected function getHeader()
    {
        $header = '<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="https://mediaarea.net/mediaconch" xmlns:ma="https://mediaarea.net/mediaarea" xmlns:mi="https://mediaarea.net/mediainfo" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" extension-element-prefixes="xsi ma">
    <xsl:output encoding="UTF-8" method="xml" version="1.0" indent="yes"/>
    <xsl:template match="ma:MediaArea">
        <MediaConch>
            <xsl:attribute name="version">
                <xsl:text>0.1</xsl:text>
            </xsl:attribute>
            <policyChecks>
                <title>' . $this->policy->getTitle() . '</title>
                <description>' . $this->policy->getDescription() . '</description>
                <xsl:for-each select="ma:media">
                    <media>
                        <xsl:attribute name="ref">
                            <xsl:value-of select="./@ref"/>
                        </xsl:attribute>';

        return $header;
    }

    protected function getFooter()
    {
        $footer = '
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
                <xsl:when test="string-length($xpath) = \'0\'">
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
';

        return $footer;
    }
}
