<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
      require_once "dbh.inc.php";

      $query = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?);";

      $stmt = $pdo->prepare($query);
      $stmt->execute([$username, $pwd, $email]);

      $pdo = null;
      $stmt = null;

      header("location: ../signup.html");

       die();
    } catch (PDOException $e) {
      die("Query failed:" . $e->getMessage());
    }
}
else {
  header("location: ../homepage.html");
}