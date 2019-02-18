<?php
	if(!isset($_SESSION["gameid"]))
	{
		require("templates/dbConnect.php");
		$db = get_db();
		$pdo=$db->query("SELECT nextval('game_gameid_seq')");
		$_SESSION["gameid"] = $pdo.fetch(PDO::FETCH_ASSOC);
		echo $_SESSION["gameid"];
	}

?>


