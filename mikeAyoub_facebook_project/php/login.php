<?php
include "connection.php";
session_start();

if(isset($_POST["userEmail"]) && $_POST["userEmail"] != ""){
    $email = $_POST["userEmail"];
}else{
    die("Enter a valid Email");
}

if(isset($_POST["userPassword"]) && $_POST["userPassword"] != ""){
    $password = $_POST["userPassword"];
}else{
    die("Enter a valid password");
}

$hash = hash('sha256', $password);
$sql = "SELECT * FROM users WHERE email=? AND password=?";
$stmt = $connection->prepare($sql);
$stmt-> bind_param("ss",$email,$hash);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$user_id = $row["id"];

if(empty($row)){
    $_SESSION["flash"] = "Please check your Email and password";
    header('location:../login.html');
}else{
        $_SESSION["user_id"] = $user_id;
        header('location:../pages/find_friends.html');
    }

?>