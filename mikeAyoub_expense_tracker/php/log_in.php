<?php
include "connection.php";
session_start();

if(isset($_POST["email"]) && $_POST["email"] != ""){
    $email = $_POST["email"];
}else{
    die("Enter a valid Email");
}

if(isset($_POST["your_pass"]) && $_POST["your_pass"] != ""){
    $password = $_POST["your_pass"];
}else{
    die("Enter a valid password");
}

$hash = hash('sha256', $password);
$sql1 = "SELECT * FROM users WHERE email=? AND password=?";
$stmt1 = $connection->prepare($sql1);
$stmt1-> bind_param("ss",$email,$hash);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();

if(empty($row1)){
    session_start();
    $_SESSION["flash"] = "Please check your Email and password";
    header('location:../index.php');
}else{
        header('location:../user_home.php');
    }

?>