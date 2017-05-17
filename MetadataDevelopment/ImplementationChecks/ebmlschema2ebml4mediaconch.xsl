<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:exsl="http://exslt.org/common" xmlns:str="http://exslt.org/strings" version="1.0" extension-element-prefixes="xsi exsl str">
  <xsl:output encoding="UTF-8" method="xml" version="1.0" indent="yes"/>
  <xsl:variable name="EBMLHeader">
    <element name="EBML" path="1*1(\EBML)" id="0x1A45DFA3" type="master" minOccurs="1" maxOccurs="unbounded" minver="1"/>
    <element name="EBMLVersion" path="1*1(\EBML\EBMLVersion)" id="0x4286" type="uinteger" minOccurs="1" default="1" minver="1"/>
    <element name="EBMLReadVersion" path="1*1(\EBML\EBMLReadVersion)" id="0x42F7" type="uinteger" minOccurs="1" default="1" minver="1"/>
    <element name="EBMLMaxIDLength" path="1*1(\EBML\EBMLMaxIDLength)" id="0x42F2" type="uinteger" minOccurs="1" default="4" minver="1"/>
    <element name="EBMLMaxSizeLength" path="1*1(\EBML\EBMLMaxSizeLength)" id="0x42F3" type="uinteger" minOccurs="1" default="8" minver="1"/>
    <element name="DocType" path="1*1(\EBML\DocType)" id="0x4282" type="string" minOccurs="1" minver="1"/>
    <element name="DocTypeVersion" path="1*1(\EBML\DocTypeVersion)" id="0x4287" type="uinteger" minOccurs="1" default="1" minver="1"/>
    <element name="DocTypeReadVersion" path="1*1(\EBML\DocTypeReadVersion)" id="0x4285" type="uinteger" minOccurs="1" default="1" minver="1"/>
    <element name="Void" path="*((*\)\Void)" id="0xEC" type="binary" maxOccurs="unbounded" minver="1"/>
    <element name="CRC-32" path="*1((1*\)\CRC-32)" id="0xBF" type="binary" size="4" minver="1" webm="0"/>
  </xsl:variable>
  <xsl:template match="EBMLSchema">
    <EBMLSchema4MediaConch>
      <xsl:apply-templates select="exsl:node-set($EBMLHeader)/element|element"/>
    </EBMLSchema4MediaConch>
  </xsl:template>
  <xsl:template match="element">
    <element>
      <xsl:copy-of select="@name"/>
      <!--
      <xsl:copy-of select="@path"/>
        -->
      <xsl:copy-of select="@id"/>
      <xsl:copy-of select="@type"/>
      <xsl:copy-of select="@size"/>
      <xsl:copy-of select="@range"/>
      <xsl:copy-of select="@default"/>
      <xsl:copy-of select="@unknownsizeallowed"/>
      <xsl:attribute name="minver">
        <xsl:choose>
          <xsl:when test="@minver">
            <xsl:value-of select="@minver"/>
          </xsl:when>
          <xsl:otherwise>1</xsl:otherwise>
        </xsl:choose>
      </xsl:attribute>
      <xsl:copy-of select="@maxver"/>
      <xsl:variable name="EBMLElementOccurence">
        <xsl:value-of select="substring-before(@path,'(')"/>
      </xsl:variable>
      <xsl:variable name="EBMLMinOccurence">
        <xsl:choose>
          <xsl:when test="substring-before($EBMLElementOccurence,'*')!=''">
            <xsl:value-of select="substring-before($EBMLElementOccurence,'*')"/>
          </xsl:when>
          <xsl:otherwise>0</xsl:otherwise>
        </xsl:choose>
      </xsl:variable>
      <xsl:attribute name="minOccurs">
        <xsl:value-of select="$EBMLMinOccurence"/>
      </xsl:attribute>
      <xsl:variable name="EBMLMaxOccurence">
        <xsl:choose>
          <xsl:when test="substring-after($EBMLElementOccurence,'*')!=''">
            <xsl:value-of select="substring-after($EBMLElementOccurence,'*')"/>
          </xsl:when>
          <xsl:otherwise>unbounded</xsl:otherwise>
        </xsl:choose>
      </xsl:variable>
      <xsl:attribute name="maxOccurs">
        <xsl:value-of select="$EBMLMaxOccurence"/>
      </xsl:attribute>
      
      <xsl:variable name="EBMLReferencePath">
        <xsl:value-of select="substring(substring-after(@path,'('),1,string-length(substring-after(@path,'('))-1)"/>
      </xsl:variable>
      <!--
      <xsl:attribute name="EBMLReferencePath">
        <xsl:value-of select="$EBMLReferencePath"/>
      </xsl:attribute>
        -->
      <xsl:variable name="EBMLElementPath">
        <xsl:choose>
          <xsl:when test="substring($EBMLReferencePath,string-length($EBMLReferencePath),1)!=')'">
            <xsl:text>\</xsl:text>
            <xsl:value-of select="str:tokenize($EBMLReferencePath,'\')[last()]"/>
          </xsl:when>
          <xsl:otherwise>
            <xsl:text>(</xsl:text>
            <xsl:value-of select="str:tokenize($EBMLReferencePath,'(')[last()]"/>
          </xsl:otherwise>
        </xsl:choose>
      </xsl:variable>
      <!--
      <xsl:attribute name="EBMLElementPath">
        <xsl:value-of select="$EBMLElementPath"/>
      </xsl:attribute>
        -->
      <xsl:choose>
        <xsl:when test="@recursive='1'">
          <xsl:attribute name="recursive">true</xsl:attribute>
        </xsl:when>
        <xsl:when test="substring($EBMLReferencePath,string-length($EBMLReferencePath),1)!=')'">
          <xsl:attribute name="recursive">false</xsl:attribute>
          <!--
          <xsl:attribute name="EBMLPathAtom">
            <xsl:value-of select="$EBMLElementPath"/>
          </xsl:attribute>
          <xsl:attribute name="EBMLAtomName">
            <xsl:value-of select="substring($EBMLElementPath,2,string-length($EBMLElementPath)-1)"/>
          </xsl:attribute>
            -->
        </xsl:when>
        <xsl:otherwise>
          <xsl:attribute name="recursive">true</xsl:attribute>
          <!--
          <xsl:attribute name="EBMLPathAtomRecursive">
            <xsl:value-of select="$EBMLElementPath"/>
          </xsl:attribute>
          <xsl:attribute name="EBMLAtomName">
            <xsl:value-of select="substring($EBMLElementPath,5,string-length($EBMLElementPath)-5)"/>
          </xsl:attribute>
            -->
        </xsl:otherwise>
      </xsl:choose>

      <xsl:variable name="EBMLParentPath">
        <!--<xsl:value-of select="substring-before($EBMLReferencePath,$EBMLElementPath)"/>-->
        <xsl:choose>
          <xsl:when test="contains($EBMLReferencePath, '(1*(')">
            <xsl:value-of select="substring-before($EBMLReferencePath, '(1*(')"/>
          </xsl:when>
          <xsl:otherwise>
            <xsl:for-each select="str:tokenize($EBMLReferencePath,'\')[position() &lt; last()]">
              <xsl:text>\</xsl:text>
              <xsl:value-of select="."/>
            </xsl:for-each>
          </xsl:otherwise>
        </xsl:choose>
      </xsl:variable>
      <!--
      <xsl:attribute name="EBMLParentPath">
        <xsl:value-of select="$EBMLParentPath"/>
      </xsl:attribute>
        -->

      <xsl:variable name="EBMLLastParent">
        <xsl:choose>
          <xsl:when test="substring($EBMLParentPath,string-length($EBMLParentPath),1)!=')'">
            <xsl:text>\</xsl:text>
            <xsl:value-of select="str:tokenize($EBMLParentPath,'\')[last()]"/>
          </xsl:when>
          <xsl:otherwise>
            <xsl:text>(</xsl:text>
            <xsl:value-of select="str:tokenize($EBMLParentPath,'(')[last()]"/>
          </xsl:otherwise>
        </xsl:choose>
      </xsl:variable>
      <!--
      <xsl:attribute name="EBMLLastParent">
        <xsl:value-of select="$EBMLLastParent"/>
      </xsl:attribute>
        -->

      <xsl:choose>
        <xsl:when test="substring($EBMLLastParent,string-length($EBMLLastParent),1)!=')'">
          <!--
          <xsl:attribute name="EBMLParentPathAtom">
            <xsl:value-of select="$EBMLLastParent"/>
          </xsl:attribute>
          <xsl:attribute name="EBMLParentAtomName">
            <xsl:value-of select="substring($EBMLLastParent,2,string-length($EBMLLastParent)-1)"/>
          </xsl:attribute>
            -->
          <xsl:attribute name="parent">
            <xsl:choose>
              <xsl:when test="substring($EBMLLastParent,2,string-length($EBMLLastParent)-1)">
                <xsl:value-of select="substring($EBMLLastParent,2,string-length($EBMLLastParent)-1)"/>
              </xsl:when>
              <xsl:otherwise>Root</xsl:otherwise>
            </xsl:choose>
          </xsl:attribute>
        </xsl:when>
        <xsl:otherwise>
          <!--
          <xsl:attribute name="EBMLVariableParent">
            <xsl:value-of select="$EBMLLastParent"/>
          </xsl:attribute>
          <xsl:attribute name="VariableParentOccurence">
            <xsl:value-of select="substring($EBMLLastParent,2,string-length($EBMLLastParent)-3)"/>
          </xsl:attribute>
            -->
          <xsl:attribute name="parent">
            <xsl:choose>
              <xsl:when test="substring($EBMLLastParent,2,string-length($EBMLLastParent)-3)">
                <xsl:value-of select="substring($EBMLLastParent,2,string-length($EBMLLastParent)-3)"/>
              </xsl:when>
              <xsl:otherwise>Root</xsl:otherwise>
            </xsl:choose>
          </xsl:attribute>
        </xsl:otherwise>
      </xsl:choose>

      <xsl:variable name="EBMLFixedParent">
        <xsl:value-of select="substring-before($EBMLParentPath,$EBMLLastParent)"/>
      </xsl:variable>
      <!--
      <xsl:attribute name="EBMLFixedParent">
        <xsl:value-of select="$EBMLFixedParent"/>
      </xsl:attribute>
        -->
    </element>
  </xsl:template>
</xsl:stylesheet>
