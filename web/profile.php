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
    <script>
        $(document).ready(function(){
            $("#login_tab").trigger("click");
        });
    </script>

  </body>

</html>
