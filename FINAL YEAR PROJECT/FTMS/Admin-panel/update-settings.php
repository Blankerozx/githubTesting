<?php
session_start();
include '../includes/dbh.inc.php'; // your DB connection

$userId = $_SESSION['user_id']; // assuming session is set

// Collect form data
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

// Handle profile picture upload
if ($_FILES['profile_pic']['name']) {
    $target = 'uploads/' . basename($_FILES['profile_pic']['name']);
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
    $profile_pic = $target;
} else {
    $profile_pic = null;
}

// Build your SQL query
$sql = "UPDATE users SET fullname=?, username=?, email=?";
$params = [$fullname, $username, $email];

if ($password) {
    $sql .= ", password=?";
    $params[] = $password;
}
if ($profile_pic) {
    $sql .= ", profile_pic=?";
    $params[] = $profile_pic;
}
$sql .= " WHERE id=?";
$params[] = $userId;

// Prepare & execute
$stmt = $conn->prepare($sql);
$stmt->execute($params);

header("Location: admin-dashboard.php?msg=updated");
