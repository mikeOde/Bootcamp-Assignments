<?php
    session_start();
    include "connection.php";

    if(isset($_POST["fullName"]) && $_POST["fullName"] != "" && strlen($_POST["fullName"]) >= 3) {
        $full_name = strtolower($_POST["fullName"]);
    }else{
        die ("Enter a valid first name");
    }

    if(isset($_POST["userBirthday"])) {
        $user_birthday = $_POST["userBirthday"];
    }else{
        die ("Enter a valid birthday");
    }

    if(isset($_POST["userCountry"]) && $_POST["userCountry"] != "" && strlen($_POST["userCountry"]) >= 3) {
        $user_country = $_POST["userCountry"];
    }else{
        die ("Enter a valid country name");
    }

    if(isset($_POST["userCity"]) && $_POST["userCity"] != "" && strlen($_POST["userCity"]) >= 3) {
        $user_city = $_POST["userCity"];
    }else{
        die ("Choose a valid city name");
    }

    if(isset($_POST["userStreet"]) && $_POST["userStreet"] != "" && strlen($_POST["userStreet"]) >= 3) {
        $user_street = $_POST["userStreet"];
    }else{
        die ("Enter a valid street name");
    }

    if(isset($_POST["userEmail"]) && $_POST["userEmail"] != "" ) {
        $email = $_POST["userEmail"];
    }else{
        die ("Enter a valid email");
    }

    if(isset($_POST["userPassword"]) && $_POST["userPassword"] != "" ) {
        $password = $_POST["userPassword"];
    }else{
        die ("Enter a valid password");
    }

    if(isset($_POST["confirmPassword"]) && $_POST["confirmPassword"] != "" ) {
        $confirm_password = $_POST["confirmPassword"];
    }else{
        die ("Enter a valid password");
    }

    if($password != $confirm_password){
        die("The entered passwords do not match");
    }

    $sql1="Select * from users where email=?"; 
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("s",$email);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $row = $result->fetch_assoc();

    if(empty($row)){
        $sql2 = "INSERT INTO `users` (`full_name`, `email`, `birthday`, `country`, `city`, `street`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $hash = hash('sha256', $password);
        $stmt2 = $connection->prepare($sql2);
        $stmt2->bind_param("sssssss", $full_name, $email, $user_birthday, $user_country, $user_city, $user_street, $hash);
        $stmt2->execute();
        header('location: ../login.html');
    }else{
        header('location: ../register.html');
    }

?> 