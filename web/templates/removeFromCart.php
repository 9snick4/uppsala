<?php
	$redirectURL = "../cart.php";
	/* 
		Anytime we come here is trough the cart
		$_GET[item] is the item selected to purchase
		we want to increment the cookie val to allow the cart purchase
		check if available and stuff
	*/
	
	$curr_cookie=$_COOKIE["cart_cookie_".$_GET['item']];

	echo $curr_cookie;
	if(isset($curr_cookie)) {
		setcookie("cart_cookie_".$_GET['item'], -1, time() + 84600, "/"); 
		($_COOKIE["cart_cookie_".$_GET['item']] <= 1 ) ? 
			setcookie("cart_cookie_".$_GET['item'], 0, time() - 3600, "/") : 				// If 1 item , remove cookie
			setcookie("cart_cookie_".$_GET['item'], $curr_cookie-1, time() + 84600, "/");	// if more then 1 item, decrease by 1
	}
	setcookie("cart_total", $_GET['cart_total']-1, time() + (86400), "/"); 
	header('Location: '.$redirectURL);
?>