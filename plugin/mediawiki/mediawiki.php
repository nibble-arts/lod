<?PHP
// Mediawiki-parser

class Mediawiki {
	var $url;
	var $user;
	var $xslPath;
	var $style;
	var $param;

	function __construct($user="") {
		$this->url = "http://de.wikipedia.org/w/api.php";
		$this->xsl = "";
		$this->param = array(
			"format=xml",
			"list=exturlusage",
			"action=query",
			"prop=links|iwlinks|extlinks|categories|extracts",
			"exsentences=3",
			"explaintext"
		);
	}

	function query($searchString) {
		$this->xslPath = "plugin/mediawiki/mediawiki.xslt";

		$path = "{$this->url}?".implode($this->param,"&")."&titles=$searchString";
//echo $path."<br>";
		$xmlString = file_get_contents($path);

		$xsl = new DOMDocument;
		$xsl->load($this->xslPath);

		$xml = new DOMDocument("1.0","UTF-8");
		$xml->loadXML($xmlString);

		return $this->parse($xml,$xsl);
	}

	function parse($xml,$xsl) {
	  $proc = new XSLTProcessor;
	  $proc->importStyleSheet($xsl);
	  
	  return $proc->transformToXML($xml);
	}
}

?>

