<section id="cart_section">
  <div class="container">
  <h2 class='centered padding_top'>Welcome, fellow boardgamer!</h2>
  <div id='cart_container'>
    <?php
      // Suppressing the warning about sessions , bad practice to avoid
      @session_start();
      @session_unset(); 

      $HTML  = "";
      $total=0;
      $HTML2="";
      $curr=0;
      // number of items to display

      
        if (isset($_COOKIE["cart_cookie_con"])) {          
          $cookie_quantity_value= $_COOKIE["cart_cookie_con"];
          for ($i=0; $i < $cookie_quantity_value; $i++) { 
            $HTML  .= " 
                    <div class='row boardgame_detail'>
                      <img src=img/concept.jpg class='cart_image'>
                      <div class='boardgame_details_container'>
                        <p><b>Name :</b> Concept</p> 
                        <p><b>Description :</b>A game of word guessing with simple images and ... concepts</p>
                        <p><b>Min_Age :</b>6</p>
                        <p><b>Avg_Duration :</b>2 to 222 minutes</p>
                        <p><b>Suggested_Players :</b>4+ players</p>
                        <p><b>Brand :</b>Repos Production</p>
                        <p><b>Price :</b>30€</p>
                      </div>
                      <a href=templates/removeFromCart.php?item=con class='btn button_remove_cart'></a>
                    </div>
                    <div class='line'></div>
            ";
          }
          $_SESSION['img'.$curr]="img/concept.jpg";
          $_SESSION['name'.$curr]="Concept";
          $_SESSION['price'.$curr]="30€";
          $_SESSION['quantity'.$curr]=$cookie_quantity_value;
          $curr+=1;

          $span_quantity = $cookie_quantity_value<=1 ? "" : "(x".$cookie_quantity_value.")";
          $HTML2  .= " 
                      <div class='row summary'>
                        <div class='col-6 nowrap'><b>Name :</b> Concept ".$span_quantity."</div>
                        <div class='col-6 nowrap'><b>Price :</b> 35€ ".$span_quantity."</div> 
                      </div>           
          ";
          $total +=$cart['Price']*$cookie_quantity_value;
        }

        if (isset($_COOKIE["cart_cookie_hb"])) {          
          $cookie_quantity_value= $_COOKIE["cart_cookie_hb"];
          for ($i=0; $i < $cookie_quantity_value; $i++) { 
            $HTML  .= " 
                    <div class='row boardgame_detail'>
                      <img src=img/hanabi.jpg class='cart_image'>
                      <div class='boardgame_details_container'>
                      <p><b>Name :</b> Hanabi </p> 
                      <p><b>Description :</b>if you think you are smart, you nevver played hanabi</p>
                      <p><b>Min_Age :</b>8</p>
                      <p><b>Avg_Duration :</b>15-20 minutes</p>
                      <p><b>Suggested_Players :</b>3-5 players</p>
                      <p><b>Brand :</b>Oliphante</p>
                      <p><b>Price :</b>15€</p>
                      </div>
                      <a href=templates/removeFromCart.php?item=hb class='btn button_remove_cart'></a>
                    </div>
                    <div class='line'></div>
            ";
          }
          $_SESSION['img'.$curr]="img/hanabi.jpg";
          $_SESSION['name'.$curr]="Hanabi";
          $_SESSION['price'.$curr]="15€";
          $_SESSION['quantity'.$curr]=$cookie_quantity_value;
          $curr+=1;

          $span_quantity = $cookie_quantity_value<=1 ? "" : "(x".$cookie_quantity_value.")";
          $HTML2  .= " 
                      <div class='row summary'>
                        <div class='col-6 nowrap'><b>Name :</b> Hanabi ".$span_quantity."</div>
                        <div class='col-6 nowrap'><b>Price :</b> 15€ ".$span_quantity."</div> 
                      </div>           
          ";
          $total +=$cart['Price']*$cookie_quantity_value;
        }

        if (isset($_COOKIE["cart_cookie_df"])) {          
          $cookie_quantity_value= $_COOKIE["cart_cookie_con"];
          for ($i=0; $i < $cookie_quantity_value; $i++) { 
            $HTML  .= " 
                    <div class='row boardgame_detail'>
                      <img src=img/diceforge.jpg class='cart_image'>
                      <div class='boardgame_details_container'>
                      <p><b>Name :</b> Dice Forge </p> 
                      <p><b>Description :</b>A dice-rolling game, but you can create your own dice!</p>
                      <p><b>Min_Age :</b>12</p>
                      <p><b>Avg_Duration :</b>30 minutes</p>
                      <p><b>Suggested_Players :</b>2-4 players</p>
                      <p><b>Brand :</b>Libellud</p>
                      <p><b>Price :</b>35€</p>
                      </div>
                      <a href=templates/removeFromCart.php?item=df class='btn button_remove_cart'></a>
                    </div>
                    <div class='line'></div>
            ";
          }
          $_SESSION['img'.$curr]="img/diceforge.jpg";
          $_SESSION['name'.$curr]="Diceforge";
          $_SESSION['price'.$curr]="35€";
          $_SESSION['quantity'.$curr]=$cookie_quantity_value;
          $curr+=1;

          $span_quantity = $cookie_quantity_value<=1 ? "" : "(x".$cookie_quantity_value.")";
          $HTML2  .= " 
                      <div class='row summary'>
                        <div class='col-6 nowrap'><b>Name :</b> Dice forge ".$span_quantity."</div>
                        <div class='col-6 nowrap'><b>Price :</b> 35€ ".$span_quantity."</div> 
                      </div>           
          ";
          $total +=$cart['Price']*$cookie_quantity_value;
        }

        if (isset($_COOKIE["cart_cookie_snt"])) {          
          $cookie_quantity_value= $_COOKIE["cart_cookie_snt"];
          for ($i=0; $i < $cookie_quantity_value; $i++) { 
            $HTML  .= " 
                    <div class='row boardgame_detail'>
                      <img src=img/santorini.jpg class='cart_image'>
                      <div class='boardgame_details_container'>
                      <p><b>Name :</b> Santorini </p> 
                      <p><b>Description :</b>Build like a Human, win like a God </p>
                      <p><b>Min_Age :</b>8</p>
                      <p><b>Avg_Duration :</b>20 minutes</p>
                      <p><b>Suggested_Players :</b>2-4 players</p>
                      <p><b>Brand :</b>Roxley Games</p>
                      <p><b>Price :</b>35€</p>
                      </div>
                      <a href=templates/removeFromCart.php?item=snt class='btn button_remove_cart'></a>
                    </div>
                    <div class='line'></div>
            ";
          }
          $_SESSION['img'.$curr]="img/santorini.jpg";
          $_SESSION['name'.$curr]="Santorini";
          $_SESSION['price'.$curr]="35€";
          $_SESSION['quantity'.$curr]=$cookie_quantity_value;
          $curr+=1;

          $span_quantity = $cookie_quantity_value<=1 ? "" : "(x".$cookie_quantity_value.")";
          $HTML2  .= " 
                      <div class='row summary'>
                        <div class='col-6 nowrap'><b>Name :</b> Santorini ".$span_quantity."</div>
                        <div class='col-6 nowrap'><b>Price :</b> 35€ ".$span_quantity."</div> 
                      </div>           
          ";
          $total +=$cart['Price']*$cookie_quantity_value;
        }



      $HTML  .= "
                <div class='row boardgame_detail full_height'>
                  <h2 class='centered padding'>Summary</h2>
                  <div id='summary_container' class='boardgame_details_container paddingtop'>

                ";
      $HTML.=$HTML2;
      $HTML .= "  
                  <div class='row'>
                    <div class='col-6 '><b>Total</b></div>
                    <div class='col-6'><b>Price : </b>".$total."$</div>
                  </div>

                  <a href='checkout.php' class='btn btn_confirm_purchase'>Confirm</a>

                  </div>
                </div>";    
      echo $HTML;
  
      $_SESSION['nItems']=$curr;
      $_SESSION['total']=$total;
      $conn->close();
    ?>
  </div>
</section>