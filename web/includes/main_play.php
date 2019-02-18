<?php
	if(isset($_SESSION["gameid"])
	{
		require("templates/dbConnect.php");
		$db = get_db();
		$_SESSION["gameid"]=$db->query("SELECT MAX(gameid) FROM game");
		echo $_SESSION["gameid"];
	}

?>


