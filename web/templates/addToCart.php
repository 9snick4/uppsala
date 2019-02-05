<?php
	$redirectURL = "../profile.php";
	/* 
		Anytime we come here is through the cart
		$_GET[item] is the item selected to purchase
		we want to increment the cookie val to allow the cart purchase
		check if available and stuff

	
	*/
	
	$curr_cookie=$_COOKIE["cart_cookie_".$_GET['item']];

	if(isset($curr_cookie)) {
		setcookie("cart_cookie_".$_GET['item'], $curr_cookie+1, time() + (86400), "/"); 
	}
	else{
		setcookie("cart_cookie_".$_GET['item'], 1, time() + (86400), "/"); 
	}

	
	if(isset($_COOKIE["cart_total"])) {
		setcookie("cart_total", $_GET['cart_total']+1, time() + (86400), "/"); 
	}
	else{
		setcookie("cart_total", 0, time() + (86400), "/"); 
	}
	
	
	header('Location: '.$redirectURL);

?>