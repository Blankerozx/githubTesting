<?php

declare(strict_types=1);

function signup_inputs() {
  // <!-- <input type="text" placeholder="First Name(Optional)"> -->
  // <input type="text" placeholder="Username" name="username">
  // <!-- <input type="number" placeholder="Phone Number" required> -->
  // <input type="password" placeholder="Password" name="pwd">
  // <input type="email" placeholder="Email address" name="email">
 
  if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
    echo ' <input type="text" placeholder="Username" name="username" value="' .$_SESSION["signup_data"]["username"] . '">';
  } else {
    echo ' <input type="text" placeholder="Username" name="username">';
  }

  echo '<input type="password" placeholder="Password" name="pwd">';

  if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
    echo '  <input type="email" placeholder="Email address" name="email" value="' .$_SESSION["signup_data"]["email"] . '">';
  } else {
    echo ' <input type="email" placeholder="Email address" name="email">';
  }
}

function  check_signup_errors() {
  if (isset($_SESSION['errors_signup'])) {
    $errors = $_SESSION['errors_signup'];

    echo "<br>";

    foreach ($errors as $error) {
     echo '<p>' . $error . '</p>';
    }

    unset($_SESSION["errors_signup"]);
  } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
    echo '<br>';
    echo '<p>Signup Success!</p>';
  }
}