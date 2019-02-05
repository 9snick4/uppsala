<section id="cart_section">
  <div class="container">
    <?php
      // Suppressing the warning about sessions , bad practice to avoid
      @session_start();
      @session_unset(); 

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
        $HTML  = "<h2 class='centered padding_top'>You are logged in as: ".   $row['email']."</h2>";
        $sql2= "
          SELECT ID, Name, Description, Min_Age, Avg_Duration, Suggested_Players, Brand, Image, Price
          FROM Boardgame";
        $result = $conn->query($sql2);
        $HTML  .= "<div id='cart_container'>";
        $total=0;
        $HTML2="";
        $curr=0;
        while($cart = $result->fetch_assoc()) {
          if (isset($_COOKIE["cart_cookie_".$cart['ID']])) {          
            $cookie_quantity_value= $_COOKIE["cart_cookie_".$cart['ID']];
            $suggested_players = $cart['Suggested_Players']>0 ? $cart['Suggested_Players'] : "any"; 
            for ($i=0; $i < $cookie_quantity_value; $i++) { 
              $HTML  .= " 
                      <div class='row boardgame_detail'>
                        <img src='".$cart['Image']."' class='cart_image'>
                        <div class='boardgame_details_container'>
                          <p><b>Name :</b> ".$cart['Name']."</p> 
                          <p><b>Description :</b> ".   $cart['Description']."</p>
                          <p><b>Min_Age :</b> ".   $cart['Min_Age']."</p>
                          <p><b>Avg_Duration :</b> ".   $cart['Avg_Duration']."min</p>
                          <p><b>Suggested_Players :</b> ".$suggested_players."</p>
                          <p><b>Brand :</b> ".   $cart['Brand']."</p>
                          <p><b>Price :</b> ".   $cart['Price']."$</p>
                        </div>
                        <a href= 'templates/removeFromCart.php?item=".$cart['ID']."' id='".$cart['ID']."' class='btn button_remove_cart'></a>
                      </div>
                      <div class='line'></div>
              ";
            }
            $_SESSION['img'.$curr]=$cart['Image'];
            $_SESSION['name'.$curr]=$cart['Name'];
            $_SESSION['price'.$curr]=$cart['Price'];
            $_SESSION['quantity'.$curr]=$cookie_quantity_value;
            $curr+=1;

            $span_quantity = $cookie_quantity_value<=1 ? "" : "(x".$cookie_quantity_value.")";
            $HTML2  .= " 
                        <div class='row summary'>
                          <div class='col-6 nowrap'><b>Name :</b> ".$cart['Name']." ".$span_quantity."</div>
                          <div class='col-6 nowrap'><b>Price :</b> ".   $cart['Price']."$ ".$span_quantity."</div> 
                        </div>           
            ";
            $total +=$cart['Price']*$cookie_quantity_value;
          }
        }
        $HTML  .= "
                  <div class='row boardgame_detail full_height'>
                    <h2 class='centered padding'>Summary</h2>
                    <div id='summary_container' class='boardgame_details_container paddingtop'>

                  ";
        $HTML.=$HTML2;
          /* ############ TRY STRIP TAGS FOR PRICING PRINTING #########*/ 
        $HTML .= "  
                    <div class='row'>
                      <div class='col-6 '><b>Total</b></div>
                      <div class='col-6'><b>Price : </b>".$total."$</div>
                    </div>

                    <a href='checkout.php' class='btn btn_confirm_purchase'>Confirm</a>

                    </div>
                  </div>";    
        echo $HTML;
      }
      $_SESSION['nItems']=$curr;
      $_SESSION['total']=$total;
      $conn->close();
    ?>
  </div>
</section>