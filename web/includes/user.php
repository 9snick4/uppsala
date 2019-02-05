<section id="user_section">
	<div class="container">
		<h2 class='centered p-25'> Welcome fellow boardagamer! </h2>
		<div id='cart_container'>
			<?php
				$chosenN="";
				if (isset($_COOKIE["cart_cookie_con"])) {
					$chosenN="<h2 class='chosen'> chosen ".$_COOKIE["cart_cookie_con"]." times </h2>";
				}
			?>
			<div class="row boardgame_detail">
				<img src='img/concept.jpg' class='cart_image'>
				<div class='boardgame_details_container'>			
					<p><b>Name :</b> Concept </p> 
					<p><b>Description :</b>A game of word guessing with simple images and ... concepts</p>
					<p><b>Min_Age :</b>6</p>
					<p><b>Avg_Duration :</b>2 to 222 minutes</p>
					<p><b>Suggested_Players :</b>4+ players</p>
					<p><b>Brand :</b>Repos Production</p>
					<p><b>Price :</b>30€</p>
					<p><b>Availability :</b>Available <?php echo $chosenN ?></p>
					<a href= 'templates/addToCart.php?item=con' class='btn button_add_cart'></a>
				</div>				
			</div>
			<?php
				$chosenN="";
				if (isset($_COOKIE["cart_cookie_hb"])) {
					$chosenN="<h2 class='chosen'> chosen ".$_COOKIE["cart_cookie_hb"]." times </h2>";
				}
			?>
			<div class="row boardgame_detail">
			<img src='img/hanabi.jpg' class='cart_image'>
				<div class='boardgame_details_container'>	
					<p><b>Name :</b> Hanabi </p> 
					<p><b>Description :</b>if you think you are smart, you nevver played hanabi</p>
					<p><b>Min_Age :</b>8</p>
					<p><b>Avg_Duration :</b>15-20 minutes</p>
					<p><b>Suggested_Players :</b>3-5 players</p>
					<p><b>Brand :</b>Oliphante</p>
					<p><b>Price :</b>15€</p>
					<p><b>Availability :</b>Available <?php echo $chosenN ?></p>
					<a href= 'templates/addToCart.php?item=hb' class='btn button_add_cart'></a>
				</div>
			</div>								
			<?php
				$chosenN="";
				if (isset($_COOKIE["cart_cookie_df"])) {
					$chosenN="<h2 class='chosen'> chosen ".$_COOKIE["cart_cookie_df"]." times </h2>";
				}
			?>
			<div class="row boardgame_detail">
			<img src='img/diceforge.jpg' class='cart_image'>
				<div class='boardgame_details_container'>
					<p><b>Name :</b> Dice Forge </p> 
					<p><b>Description :</b>A dice-rolling game, but you can create your own dice!</p>
					<p><b>Min_Age :</b>12</p>
					<p><b>Avg_Duration :</b>30 minutes</p>
					<p><b>Suggested_Players :</b>2-4 players</p>
					<p><b>Brand :</b>Libellud</p>
					<p><b>Price :</b>35€</p>
					<p><b>Availability :</b>Available <?php echo $chosenN ?></p>
					<a href= 'templates/addToCart.php?item=df' class='btn button_add_cart'></a>
				</div>
			</div>
			<?php
				$chosenN="";
				if (isset($_COOKIE["cart_cookie_snt"])) {
					$chosenN="<h2 class='chosen'> chosen ".$_COOKIE["cart_cookie_snt"]." times </h2>";
				}
			?>
			<div class="row boardgame_detail">
			<img src='img/santorini.jpg' class='cart_image'>
				<div class='boardgame_details_container'>							
					<p><b>Name :</b> Santorini </p> 
					<p><b>Description :</b>Build like a Human, win like a God </p>
					<p><b>Min_Age :</b>8</p>
					<p><b>Avg_Duration :</b>20 minutes</p>
					<p><b>Suggested_Players :</b>2-4 players</p>
					<p><b>Brand :</b>Roxley Games</p>
					<p><b>Price :</b>35€</p>
					<p><b>Availability :</b>Available <?php echo $chosenN ?></p>
					<a href= 'templates/addToCart.php?item=snt' class='btn button_add_cart'></a>
				</div>
			</div>
		</div>
		<div class='line'></div>
	</div>
</section>