<?php
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require 'vendor/autoload.php';

	$mail             = new PHPMailer();

	$mail->isSMTP();                           		// telling the class to use SMTP
	$mail->SMTPDebug  = 1;                     		// enables SMTP debug information (for testing)
	$mail->Host       = "smtp.gmail.com";      		// sets GMAIL as the SMTP server
	$mail->SMTPSecure = "tls";                		// sets the prefix to the server
	$mail->SMTPAuth   = true;                  		// enable SMTP authentication
	$mail->Port       = 587;                   		// set the SMTP port for the GMAIL server
	$mail->Username   = "SMTPspammer@gmail.com";  	// GMAIL username
	$mail->Password   = "1234qwerASDF";            	// GMAIL password
	$mail->AddAddress($_POST['email']);				// TO Address

	$mail->SetFrom('no-reply@mydomain.com', 'Jimmy');

	$mail->Subject    = "Payment";
	$body="<p> <b>Message:</b> </p>";
	foreach ($_POST as $param_name => $param_val) {
	    $body .="<p><b>Param:</b> $param_name; <b>Value:</b> $param_val</p>\n";
	}
	$body .="<p>".$_COOKIE['pricing']."</p>";
	setcookie("pricing"," ", -3600, "/"); //Once the payment has been done, clear it

	$mail->MsgHTML($body);


	if(!$mail->Send()) {
     	echo "BG";// DB error
	  }
	  else{
	    echo "GG WP!";  // SUCCESS !!
	  }       
?>