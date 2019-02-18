<?php
	if(!isset($_SESSION["gameid"]))
	{
		require("templates/dbConnect.php");
		$db = get_db();
		$pdo=$db->prepare("SELECT nextval('game_gameid_seq')");
		$pdo->execute();
		$_SESSION["gameid"] = $pdo->fetch(PDO::FETCH_BOTH)[0];
		echo $_SESSION["gameid"];
	}

?>
