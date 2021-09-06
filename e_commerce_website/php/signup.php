<?php
    session_start();
    include "connection.php";

    if(isset($_POST["first_name"]) && $_POST["first_name"] != "" && strlen($_POST["first_name"]) >= 3) {
        $first_name = $_POST["first_name"];
    }else{
        die ("Enter a valid first name");
    }

    if(isset($_POST["last_name"]) && $_POST["last_name"] != "" && strlen($_POST["last_name"]) >= 3) {
        $last_name = $_POST["last_name"];
    }else{
        die ("Enter a valid last name");
    }

    if(isset($_POST["user_name"]) && $_POST["user_name"] != "" && strlen($_POST["user_name"]) >= 3) {
        $user_name = $_POST["user_name"];
    }else{
        die ("Enter a valid last username");
    }

    if(isset($_POST["user_type"]) && $_POST["user_type"] != "" ) {
        $user_type = $_POST["user_type"];
    }else{
        die ("Choose a usertype");
    }

    if(isset($_POST["email"]) && $_POST["email"] != "" ) {
        $email = $_POST["email"];
    }else{
        die ("Enter a valid email");
    }

    if(isset($_POST["password1"]) && $_POST["password1"] != "" ) {
        $password = $_POST["password1"];
    }else{
        die ("Enter a valid password");
    }

    if(isset($_POST["password2"]) && $_POST["password2"] != "" ) {
        $confirm_password = $_POST["password2"];
    }else{
        die ("Enter a valid password");
    }

    if($password != $confirm_password){
        die("The entered passwords do not match");
    }

    $sql1="Select * from users where email=?"; #Check if the email already exists in the database
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("s",$email);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $row = $result->fetch_assoc();

    if(empty($row)){
        $sql2 = "INSERT INTO `users` (`first_name`, `last_name`, `user_name`, `user_type`, `email`, `password`) VALUES (?, ?, ?, ?, ?, ?);"; #add the new user to the database
        $hash = hash('sha256', $password);
        $stmt2 = $connection->prepare($sql2);
        $stmt2->bind_param("sssiss", $first_name, $last_name, $user_name, $user_type, $email, $hash);
        $stmt2->execute();
        
        header('location: ../index.php');
    }else{
        
        header('location: ../signin.php');
    }

?>