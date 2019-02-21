<?php
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

			$city->cityid = $row[0];
			$city->cityname = $row[1];
			$city->latitude = $row[2];
			$city->longitude = $row[3];
			$city->citypopulation = $row[4];
			$city->Extension = $row[5];
			$city->Elevation = $row[6];
			array_push($citiesDeck, $city);		
		}
		var_dump($citiesDeck);
	}
?>

<script>

var stringCitiesDeck = "<?php echo json_encode($citiesDeck); ?>";
var citiesDeck = JSON.parse(stringCitiesDeck);

</script>