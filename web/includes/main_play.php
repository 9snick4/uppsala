<?php
	if(isset($_SESSION["gameid"]))
	{
		require("templates/dbConnect.php");
		$db = get_db();
		$_SESSION["gameid"]=$db->query("SELECT nextval('game_gameid_seq')");
		echo $_SESSION["gameid"];
	}

?>


