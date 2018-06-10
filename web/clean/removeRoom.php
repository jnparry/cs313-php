<?php

session_start();

$projectId = $_SESSION['project'];
$roomId = $_SESSION['deleteId'];

//if (!isset($projectId)) {
//    header("Location: /clean/projects.php");
//    die();
//}

require("dbConnect.php");
$db = get_db();

try {
    $query = "DELETE FROM rooms WHERE id = :rId";

    $statement = $db->prepare($query);
    $statement->bindValue(':rId', $roomId);
    $statement->execute();
    } catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
    die();
} 

header("Location: /clean/rooms.php");
die();

?>