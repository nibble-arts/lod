<html>
<head>
	<title>OLD-Tool</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link href="lod.css" type="text/css" rel="stylesheet">
</head>

<body>
<h1>OLD Linking-Tool</h1>

<?PHP
include_once("easyrdf-0.8.0/lib/EasyRdf.php");
include_once("plugin/dnb/dnb.php");
include_once("plugin/geonames/geonames.php");
include_once("plugin/mediawiki/mediawiki.php");

if(isset($_GET['searchString'])) $searchString = $_GET['searchString'];
else $searchString="";

if(isset($_GET['button'])) $action = $_GET['button'];
else $action="";



echo "<form method='GET' action='index.php'>";
	echo "Suchbegriff <input type='text' name='searchString' value='$searchString'><br>";
	echo "<input type='submit' name='button' value='suchen'>";
	echo "&nbsp;<input type='submit' name='button' value='reset'>";
echo "</form>";


if ($action == "suchen") {

// retrieve dnb
//	echo "<div class='title'>Gemeinsame Normdatei</div>";
//	echo "<div class='block'>";
//	$dnb = new DNB("40e9ad5201493592c1954fce966d32f");
//	echo "<pre>".htmlspecialchars($dnb->query($searchString))."</pre>";
//	echo "</div>";


// retrieve wikipedia
	echo "<div class='title'>Wikipedia</div>";
	echo "<div class='block'>";
		$wiki = new Mediawiki();
		echo $wiki->query($searchString);
	echo "</div>";


// retrieve geonames
	echo "<div class='title'>Geonames</div>";
	echo "<div class='block'>";
		$geonames = new Geonames("adlibtmw");
		$geoResult = $geonames->query($searchString);
		echo $geoResult;
	echo "</div>";
}

?>

</body>
</html>
