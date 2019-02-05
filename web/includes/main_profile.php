<?php 
$cookie_login_name  = "login";

$cookie_register_name  = "register";

$cookie_rememberme_email  = "remember";

$cookie_rememberme_dberror  = "dberror";

$cookie_rememberme_noemail  = "noemail";

$cookie_login_error  = "login-error";
?>
<section id="login_section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-lg-2">
      </div>
      <div class="col-lg-6 order-lg-1">
        <div class="p-5">
          <ul id="profile_tabs_container" class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" id="login_tab" href="#login">Login</a></li>
            <li><a data-toggle="tab" href="#new_member">New Member</a></li>
            <li><a data-toggle="tab" href="#forgot_pass">Forgot Password</a></li>
          </ul>

          <div class="tab-content">
            
            <!-- Login Form-->
            <div id="login" class="tab-pane fade in active">
              <h3>Login</h3>
              <div id="profile_login_container">
                <form action="login.php" method="post">
                  <label for="email">Email</label><input type="email" name="email" required>
                  <label for="password">Password</label><input id="password" type="password" name="password" required">
                  <div id="login_error">
 
                  </div>
                  <input type="submit" name="submit" class="btn btn-secondary" value="login">
                </form>
              </div>
            </div>

            <!-- New Member Form-->
            <div id="new_member" class="tab-pane fade">
              <h3>New member?</h3>
              <p>Signing-in has never been so easy<br>Fill the form below to get started!</p>
              <div id="profile__newmember_container">
                <form action="login.php" method="post">
                  <label for="new_email">Email</label><input type="email" name="new_email" required>
                  <label for="password">Password</label><input id="new_password" type="password" name="new_password" required">
                  <input type="submit" name="submit" class="btn btn-secondary" value="register">
                </form>
              </div>
            </div>

            <!-- Forgot Password Form-->
            <div id="forgot_pass" class="tab-pane fade">
              <h3>Forgot Password?</h3>
              <div id="profile_rememberme_container">
                <form action="login.php" method="post">
                  <label for="recover_email">Email</label><input type="email" name="recover_email" required>
                  <input type="submit" name="submit" class="btn btn-secondary" value="recover">
                </form>
              </div>
            </div>


            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php

  $cookie_login_name = "login";
  if(isset($_COOKIE[$cookie_login_name])) {
  ?>
    <script type="text/javascript">
      document.getElementById("login_section").classList.add("hide");
    </script>
  <?php
    include "includes/user.php";
  }
  if(isset($_COOKIE[$cookie_login_error])) {
        echo "Email or Password incorrect";
        
  }
  if(isset($_COOKIE[$cookie_rememberme_noemail])) {
      echo "Sorry but the given email is not a registered email";

  }
  if(isset($_COOKIE[$cookie_rememberme_email])) {
      echo "We have sent an email to the given address with the password to log in";

  }
  if(isset($_COOKIE[$cookie_rememberme_dberror])) {
      echo "There was an error handling your request";
      
  }
   
?>





