<?php
  require_once 'includes/config_session.inc.php';
  require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="login.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>loginpage</title>
</head>
<body>

<h3>
   <?php
   output_username();
   ?>
</h3>




  <div class="parent-container">
    <div class="left-section">
      <h2>Simplify management with our dashboard.</h2>
          <p>Simplify your e-commerce management with our user-friendly admin dashboard.</p>
          <img src="images/700-00659450en_Masterfile.jpg" alt="">
    </div>

    <div class="right-section">
        <h2>Welcome Back</h2>
        <p>please login to your account</p>
      <?php
      if(!isset($_SESSION["user_id"])) { ?>
          <form action="includes/login.inc.php" method="post">
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="pwd">
            <div class="forget-password">
              <a href="#">Forgot Password?</a>
            </div>
            <button type="submit">Login</button>
          </form>
          <p>or login with</p>
            <div class="social-button">
              <button class="goggle">Google</button>
              <button class="facebook">Facebook</button>
            </div>
            <p class="signup-text">
              Don't have an account? <a href="signup.php">Sign up</a>
            </p>
      <?php } ?>
    </div>
  </div>
<?php
 check_login_errors();
?>

<form action="includes/logout.inc.php" method="post">
  <button>Logout</button>
</form>
  </body>
</body>
</html>