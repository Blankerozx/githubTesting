<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="signup.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>signup page</title>
</head>
<body>
    <div class="parent-container">
      <div class="left-section"></div>
      <div class="right-section">
        <h2>Signup page</h2>
        <p class="login-text">
          Already have an account? <a href="loginpage.php">Login</a>
        </p>

        <form action="includes/signup.inc.php" method="post">
       <?php 
       signup_inputs();
       ?>
          <button>Register</button>
        </form>
      </div>
    </div>

     <?php
       check_signup_errors()
     ?>

     <script>
      window.onload =function() {
        document.querySelectorAll('input').forEach(input => input.value = "");
      }
     </script>

</body>
</html>