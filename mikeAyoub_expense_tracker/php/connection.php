<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "expense_tracker";

$connection = new mysqli($server, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Failed");
}
