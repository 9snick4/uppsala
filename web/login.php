<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "Assignment";

/*foreach ($_POST as $param_name => $param_val) {
    echo "$param_name : $param_val<br />\n";
}*/

$cookie_login_name  = "login";
$cookie_login_value  = "login";

$cookie_login_pass  = "pass"; /* BAD PRACTICE, BETTER TO HAVE SESSIONS*/

$cookie_register_name  = "register";

$cookie_rememberme_email  = "remember";

$cookie_rememberme_dberror  = "dberror";

$cookie_rememberme_noemail  = "noemail";

$cookie_login_error  = "login-error";

$new_user= 0;

setcookie($cookie_login_error, $cookie_login_error, time() - 3600, "/"); 
setcookie($cookie_rememberme_noemail, $cookie_rememberme_noemail, time() - 3600, "/"); 
setcookie($cookie_rememberme_email, $cookie_rememberme_email, time() - 3600, "/"); 
setcookie($cookie_rememberme_dberror, $cookie_rememberme_dberror, time() - 3600, "/"); 

$redirectURL="profile.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
  switch ($_POST['submit']) {
    case 'login':
      $sql = "
        SELECT email 
        FROM users
        WHERE Email = '".$_POST['email']."' AND Password = '".$_POST['password']."'" ;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          setcookie($cookie_login_name, $_POST['email'], time() + (86400), "/");  // 86400 = 1 day
          setcookie($cookie_login_pass, $_POST['password'], time() + (86400), "/");  // 86400 = 1 day
      } else {
          setcookie($cookie_login_error, $cookie_login_error, time() + (86400), "/"); 
      }
    break;




    case 'register':
      $sql = "
        SELECT email 
        FROM users
        WHERE Email = '".$_POST['new_email'];
      $result = $conn->query($sql);
      /* If the email is unique */
      if (!$result) {
          setcookie($cookie_register_name, $cookie_register_value, time() - 3600, "/"); 
          $sql ="
            INSERT INTO Users (Email, Password, Priviledges)
            VALUES ('".$_POST['new_email']."', '".$_POST['new_password']."', ".$new_user.")";
          if ($conn->query($sql) === TRUE) {
            // "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

      } else {
          setcookie($cookie_register_name, $cookie_register_value, time() + (86400), "/"); 
      }
    break;


    case 'recover':
      try {
        $sql = "
          SELECT email, password 
          FROM users
          WHERE Email = '".$_POST['recover_email']."'";
        $result = $conn->query($sql) or die($conn->error);
        
        if ($result->num_rows > 0) {
          $mail             = new PHPMailer();

          $mail->isSMTP();                           // telling the class to use SMTP
          $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
          $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
          $mail->SMTPSecure = "tls";                 // sets the prefix to the server
          $mail->SMTPAuth   = true;                  // enable SMTP authentication
          $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
          $mail->Username   = "SMTPspammer@gmail.com";  // GMAIL username
          $mail->Password   = "1234qwerASDF";            // GMAIL password
          $mail->AddAddress($_POST['recover_email']); // To Address

          $mail->SetFrom('no-reply@mydomain.com', 'Jimmy');

          $mail->Subject    = "Password Recovery";
          while($row = $result->fetch_assoc()) {
            $body  = "<p>Password :".$row['password']."</p> 
                      <p>Email :".   $row['email']."</p>
            ";
          }      

          $mail->MsgHTML($body);


          if(!$mail->Send()) {
              setcookie($cookie_rememberme_dberror, $cookie_rememberme_dberror, time() + 86400, "/"); // DB error
            }
            else{
              setcookie($cookie_rememberme_email, $cookie_rememberme_email, time() + 86400, "/");  // SUCCESS !!
            }       
          }
        else{
          setcookie($cookie_rememberme_noemail, $cookie_rememberme_noemail, time() + 86400, "/"); // Wrong email
        }
      } 
      catch (Exception $e) {
        setcookie($cookie_rememberme_dberror, $cookie_rememberme_dberror, time() + 86400, "/"); // DB error
      }
    break;



    default:
      # code...
    break;
  }
  

  
  $conn->close();
  header('Location: '.$redirectURL);
} 

?>
