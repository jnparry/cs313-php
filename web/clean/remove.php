<?php

session_start();

$projectId = $_SESSION['project'];

if (!isset($projectId)) {
    header("Location: /clean/projects.php");
    die();
}

require("dbConnect.php");
$db = get_db();

try {
    $query = "DELETE FROM projects WHERE id = :pId";

    $statement = $db->prepare($query);
    $statement->bindValue(':pId', $projectId);
    $statement->execute();
    } catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
    die();
} 

header("Location: /clean/projects.php");
die();