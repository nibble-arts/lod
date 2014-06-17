<?PHP
// DNB-Datenservice parser

class DNB {
	var $url;
	var $version;
	var $operation;
	var $recordSchema;

	var $query;
	var $accessToken;

	function __construct($accessToken="") {
		$this->url = "http://services.dnb.de/sru/authorities";
		$this->version = "1.1";
		$this->operation = "searchRetrieve";
		$this->recordSchema = "RDFxml";

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
		
		$path = "{$this->url}?version={$this->version}&operation={$this->operation}&recordSchema={$this->recordSchema}&accessToken={$this->accessToken}&query={$searchString}%20and%20BBG%3DTg*";

		echo "<br>$path<br>";

		$rdf = file_get_contents($path);

		$xml = new SimpleXmlElement($rdf);

		return $rdf;
	}
}

?>

