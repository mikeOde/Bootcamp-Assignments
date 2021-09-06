<?php
include "connection.php";
session_start();

if(isset($_POST["email"]) && $_POST["email"] != ""){
    $email = $_POST["email"];
}else{
    die("Enter a valid Email");
}

if(isset($_POST["password"]) && $_POST["password"] != ""){
    $password = $_POST["password"];
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
    header('location:../login.php');
}else{
    $sql2 = "SELECT * FROM users WHERE email=?";
    $stmt2 = $connection->prepare($sql2);
    $stmt2->bind_param("s",$email);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();
    if($row2["user_type"] == 0){
        
        $_SESSION["farmer_email"] = $email;
        header('location:../farmer_home.php');
    }else{
        
        $_SESSION["user_email"] = $email;
        header('location:../customer_home.php');
    }
}

?>