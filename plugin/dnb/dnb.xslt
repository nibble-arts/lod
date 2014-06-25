<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:skos="http://www.w3.org/2004/02/skos/core#"
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:owl="http://www.w3.org/2002/07/owl#"
	xmlns:bibo="http://purl.org/ontology/bibo/"
	xmlns:umbel="http://umbel.org/umbel#"
	xmlns:lib="http://purl.org/library/"
	xmlns:marcrole="http://id.loc.gov/vocabulary/relators/"
	xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
	xmlns:dcterms="http://purl.org/dc/terms/"
	xmlns:gndo="http://d-nb.info/standards/elementset/gnd#"
	xmlns:isbd="http://iflastandards.info/ns/isbd/elements/"
	xmlns:sf="http://www.opengis.net/ont/sf#"
	xmlns:foaf="http://xmlns.com/foaf/0.1/"
	xmlns:rda="http://rdvocab.info/"
	xmlns:geo="http://www.opengis.net/ont/geosparql#"
	xmlns:dc="http://purl.org/dc/elements/1.1/">

  <xsl:template match="/">
  	<xsl:copy-of select="."/>
  </xsl:template>

</xsl:stylesheet>
