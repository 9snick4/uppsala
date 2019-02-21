<script src="javascript/bonvoyage.js"> </script>
<div id="board-placeholder"></div>
<?php


	require("phpobjects/city.php");
	$citiesDeck = array();
	//if(!isset($_SESSION["gameid"]))
	//{
		require("templates/dbConnect.php");
		$db = get_db();
		$pdo=$db->prepare("SELECT nextval('game_gameid_seq')");
		$pdo->execute();
		$_SESSION["gameid"] = $pdo->fetch(PDO::FETCH_BOTH)[0];
		$_SESSION["gamerid"] = $_GET["gamer_select"];
		$_SESSION["mapid"] = $_GET["map_select"];
		$db = get_db();
		foreach ($db->query("SELECT city.cityid, cityname,latitude,longitude,citypopulation,Extension,Elevation FROM city ORDER BY random() LIMIT 15") as $row)
		{
			$city = new City($row["cityid"], $row["cityname"], $row["latitude"],$row["longitude"],$row["citypopulation"],$row["Extension"], $row["Elevation"]);
			array_push($citiesDeck, $city);
		}
	//}
?>

<script>
//beginning setup
var stringCitiesDeck = "<?php echo json_encode($citiesDeck); ?>";
var citiesDeck = JSON.parse(stringCitiesDeck);
var table = $('#board-placeholder');
var center = citiesDeck.pop();
longitudeCities = [center];
latitudeCities = [center];
citiesInPlay =[longitudeCities, latitudeCities];
</script>