<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];


    try {
      
       require_once 'dbh.inc.php';
       require_once 'signup_model.inc.php';
       require_once 'signup_contr.inc.php';

      //  Error Handler
      $errors = [];

      if (is_input_empty($username, $email, $pwd, )) {
        $errors["empty_input"] = '<p class="error-message">Fill in all fields!</p>';
      }
      if (is_email_invalid( $email,)) {
        $errors["invalid_email"] = "Invalid email used!";
      }
      if (is_username_taken($pdo, $username)) {
        $errors["username_taken"] = "Username already taken!";
      }
      if (is_email_registered($pdo,  $email)) {
        $errors["email_used"] = "Email already registered!";
      }

        require_once 'config_session.inc.php';

      if ($errors) {
        $_SESSION["errors_signup"] = $errors;

        $signupData = [
         "username" => $username,
         "email" => $email
        ];
        $_SESSION["signup_data"] = $signupData;

        header("location: ../signup.php");
        die();
      }

      create_user($pdo, $pwd, $username, $email);
      header("location: ../user-dashboard.html?signup=success");
      $pdo = null;
      $stmt = null;

      die();
        
    } catch (PDOException $e) {
      die("query failed:" . $e->getMessage());
    }

} else {
  header("location: ../signup.php");
  die();
}