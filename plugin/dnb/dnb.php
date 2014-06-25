<?PHP
// DNB-Datenservice parser

class DNB {
	var $url;
	var $version;
	var $operation;
	var $recordSchema;

	var $query;
	var $accessToken;

	var $xslPath;

	function __construct($accessToken = "") {
		$this->url = "http://services.dnb.de/sru/authorities";
		$this->version = "1.1";
		$this->operation = "searchRetrieve";
		$this->recordSchema = "RDFxml";
		$this->domain = "BBG%3DTp*"; // persons
//		$this->domain = "BBG%3DTg*"; // geography
		$this->xslPath = "plugin/dnb/dnb.xslt";

		$this->accessToken;

		if ($accessToken) {
			$this->accessToken = $accessToken;
			return true;
		}
		else
			return false;
	}

	function query($searchString) {
		$searchString = str_replace(" ","%20",$searchString);
		
		$path = "{$this->url}?version={$this->version}&operation={$this->operation}&recordSchema={$this->recordSchema}&accessToken={$this->accessToken}&query={$searchString}%20and%20{$this->domain}";

//		echo "<br>$path<br>";

		$xsl = new DOMDocument;
		$xsl->load($this->xslPath);

		$rdf = file_get_contents($path);
		$xml = new SimpleXmlElement($rdf);

		return $this->parse($xml,$xsl);
//		return $rdf;
	}

	function parse($xml,$xsl) {
	  $proc = new XSLTProcessor;
	  $proc->importStyleSheet($xsl);
	  
	  return $proc->transformToXML($xml);
	}
}

?>

