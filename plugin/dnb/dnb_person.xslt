<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:slim="http://www.loc.gov/zing/srw/">

	<xsl:template match="/">

		<!-- <xsl:copy-of select="." /> -->

		<!-- <xsl:if test="numberOfRecords &gt; 0"> <div class="title"> <xsl:value-of 
			select="gndTitle" /> - <xsl:value-of select="//numberOfRecords" /> Treffer 
			</div> <div class="block"> <table class="list"> <th>Name</th> <th>Beruf</th> 
			<th>andere Namen</th> <th>GND-Link</th> <xsl:apply-templates select="//record" 
			/> </table> </div> </xsl:if> -->
	</xsl:template>


	<xsl:template match="record">
		<tr>
			<td>
				<xsl:value-of select="descendant-or-self::preferredNameForThePerson" />
			</td>
			<td>
				<xsl:value-of
					select="descendant-or-self::preferredNameForTheSubjectHeading" />
			</td>
			<td>
				<xsl:apply-templates select="descendant-or-self::variantNameForThePerson" />
			</td>
			<td>
				<a target="_blank">
					<xsl:attribute name="href">
						<xsl:value-of select="descendant-or-self::Description/@rdf:about" />
					</xsl:attribute>
					<span>
						<xsl:value-of select="descendant-or-self::Description/@rdf:about" />
					</span>
				</a>
			</td>
		</tr>
	</xsl:template>


	<xsl:template match="variantNameForThePerson">
		<xsl:if test="position() &gt; 1">
			<xsl:text>; </xsl:text>
		</xsl:if>

		<xsl:value-of select="." />
	</xsl:template>
</xsl:stylesheet>
