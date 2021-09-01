<?php
session_start();
include("connection.php");
$errors = [];

// LOGIN USER
if (isset($_POST['log_in'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (empty($errors)) {
        $password = hash('sha256', $password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($connection, $query);
        if (empty($results)) {
            array_push($errors, "Wrong username/password combination");
        }else {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header("location: page.php");
        }
    }
  }
?>