<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stefano Nicotra's Homepage</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

    <!--favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.png"/>
  </head>

  <body>

    <!-- Navigation -->
    <?php include '/includes/navigation.php';?>
    
    <!-- Header -->
    <?php include '/includes/header.php';?>
    
    <!-- Main -->
    <?php include '/includes/main_index.php';?>
    
    <!-- Main -->
    <?php include '/includes/footer.php';?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

<?php
$link = mysqli_connect("127.0.0.1", "root", "", "my_db");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
  echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
  echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
mysqli_close($link);
?>