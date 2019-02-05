<section id="user_section">
	<div class="container">
		<?php
			$servername = "127.0.0.1";
			$username = "root";
			$password = "";
			$dbname = "Assignment";
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			else{
				$sql = "
				  SELECT email, id 
				  FROM users
				  WHERE Email = '".$_COOKIE['login']."' AND Password = '".$_COOKIE['pass']."'" ;
				$row = mysqli_fetch_assoc($conn->query($sql) );
				$HTML  = "<h2 class='centered p-25'> Welcome </h2>";
				$sql2= "
				  SELECT ID, Name, Description, Min_Age, Avg_Duration, Suggested_Players, Brand, Image, Price, Availability
				  FROM Boardgame";
				$result = $conn->query($sql2);
				$HTML  .= "<div id='cart_container'>";
				while($cart = $result->fetch_assoc()) {
					$testtest="";
					if (isset($_COOKIE["cart_cookie_".$cart['ID']])) {
						$testtest="<h2 class='chosen'> chosen ".$_COOKIE["cart_cookie_".$cart['ID']]." times </h2>";
					}
					$suggested_players = $cart['Suggested_Players']>0 ? $cart['Suggested_Players'] : "Any Size allowed";
					$available = $cart['Availability'] > 0 ? ' ' : 'unavailable' ;
				  	$HTML  .= "	
			  					<div class='row boardgame_detail ".$available." '>
				               		<img src='".$cart['Image']."' class='cart_image'>
				               		<div class='boardgame_details_container'>
						  			    <p><b>Name :</b> ".$cart['Name']."</p> 
						               	<p><b>Description :</b> ".   $cart['Description']."</p>
						               	<p><b>Min_Age :</b> ".   $cart['Min_Age']."</p>
						               	<p><b>Avg_Duration :</b> ".   $cart['Avg_Duration']."min</p>
						               	<p><b>Suggested_Players :</b> ".$suggested_players."</p>
						               	<p><b>Brand :</b> ".   $cart['Brand']."</p>
						               	<p><b>Price :</b> ".   $cart['Price']."$</p>
						               	<p><b>Availability :</b> ".   $cart['Availability']."</p>
						               	".$testtest."
						               	<a href= 'templates/addToCart.php?item=".$cart['ID']."' id='".$cart['ID']."' class='btn button_add_cart'></a>
					               	</div>
				               	</div>
				               	<div class='line'></div>

				  ";
				}
				$HTML .= "</div>";    
				echo $HTML;
			}
			$conn->close();
		?>
	</div>
</section>