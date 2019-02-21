<?php
	require("phpobjects/city.php");
	$citiesDeck = array();
	if(!isset($_SESSION["gameid"]))
	{
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
			array_push($citiesDeck, new City ( $row["cityid"], $row["cityname"], $row["latitude"],$row["longitude"],$row["citypopulation"],$row["Extension"], $row["Elevation"]));
			echo $row["cityid"];
		}
		
	}
?>

<script>

var stringCitiesDeck = "<?php echo json_encode($citiesDeck); ?>";
var citiesDeck = JSON.parse(stringCitiesDeck);

</script>