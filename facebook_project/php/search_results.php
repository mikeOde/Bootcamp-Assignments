<?php

session_start();
include "connection.php";
$user_id = $_SESSION["user_id"];
$search_key = $_POST["search_key"];

$query1 = "SELECT *
FROM   users U
WHERE  U.id <> '$user_id' AND U.full_name LIKE lower('%$search_key%') AND 
NOT EXISTS (SELECT *                                 #excludes connections, either blocked or pending or added as a friend
                   FROM   connections C
                   WHERE  U.id = C.user_id_2
                   AND C.user_id_1 = '$user_id'); ";

$stmt1 = $connection->prepare($query1);

$stmt1->execute();
$result1 = $stmt1->get_result();
$search_result = [];
while($row1 = $result1->fetch_assoc()){
    $search_result[] = $row1;
}

$response_json = json_encode($search_result, JSON_PRETTY_PRINT);
echo($response_json);

?>