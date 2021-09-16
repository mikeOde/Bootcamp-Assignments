<?php
session_start();
include("connection.php");

// initializing variables
$first_name = "";
$last_name = "";
$gender = "";
$user_name = "";
$email    = "";
$errors = array(); 
$password_1 = "";
$password_2 = "";


// REGISTER USER
if (isset($_POST['sign_up'])) {
  // receive all input values from the form
  $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
  $gender = mysqli_real_escape_string($connection, $_POST['gender']);
  $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($first_name)) { array_push($errors, "First name is required"); }
  if (empty($last_name)) { array_push($errors, "Last name is required"); } 
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($user_name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE user_name='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $user_name) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
	$password =  hash('sha256', $password_1);
	$x = $connection->prepare("INSERT INTO users (first_name, last_name, gender, user_name, email, password_1) VALUES (?, ?, ?, ?, ?, ?)");
	$x->bind_param("ssssss", $first_name, $last_name, $gender, $user_name, $email, $password);
	$x->execute();

  	$_SESSION['user_name'] = $user_name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: page.php/');
  }
}
?>