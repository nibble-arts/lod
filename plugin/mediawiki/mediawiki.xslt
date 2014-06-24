<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
<!--<xsl:copy-of select="."/>-->

	<h3>Wikipedia Seiten</h3>
	<xsl:apply-templates select="//page"/><br/>

	<xsl:if test="//el">
		<h3>weiterführende Links</h3>
		<xsl:apply-templates select="//el"/>
	<!--	<xsl:apply-templates select="//eu"/>-->
	</xsl:if>
  </xsl:template>


  <xsl:template match="page">
	<a target="_blank">
		<xsl:attribute name="href">
			<xsl:text>http://de.wikipedia.org/wiki/</xsl:text>
			<xsl:value-of select="@title"/>
		</xsl:attribute>

		<xsl:value-of select="@title"/>
	</a>
  </xsl:template>


  <xsl:template match="el">
	<xsl:variable name="url" select="."/>

	<a target="_blank">
		<xsl:attribute name="href">
			<xsl:if test="substring($url,1,4) != 'http'">
				<xsl:text>http:</xsl:text>
			</xsl:if>
			<xsl:value-of select="."/>
		</xsl:attribute>
		<xsl:value-of select="."/>
	</a>
	<br/>
  </xsl:template>

  <xsl:template match="eu">
	Link <xsl:variable name="url" select="eu/@url"/>

<!--	<a>
		<xsl:attribute name="href">
			<xsl:if test="substring($url,1,4) != 'http'">
				<xsl:text>http:</xsl:text>
			</xsl:if>
			<xsl:value-of select="."/>
		</xsl:attribute>
		<xsl:value-of select="title"/>
	</a>-->
	<br/>
  </xsl:template>
</xsl:stylesheet>
