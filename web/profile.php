<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include 'includes/head.php';?>
  </head>

  <body>

    <!-- Navigation -->
    <?php include 'includes/navigation.php';?>
    
    <!-- Header -->
    <?php include 'includes/header.php';?>
    
    <!-- Main -->
    <?php include 'includes/main_profile.php';?>
    
    <!-- Main -->
    <?php include 'includes/footer.php';?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#login_tab").trigger("click");
        });
    </script>

  </body>

</html>
