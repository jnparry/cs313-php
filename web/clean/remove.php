<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /clean/signin.php");
    die();
}

if (!isset($_SESSION['userId'])) {
    header("Location: /clean/signin.php");
    die();
}

$projectId = $_SESSION['deleteId'];

require("dbConnect.php");
$db = get_db();
 
// CHECK IF THERE ARE ANY ROOMS REFERENCING THIS PROJECT
try {
    $query = "SELECT * FROM rooms";

    $statement = $db->prepare($query);
    $statement->execute();
    
    $_SESSION["error"] = false;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        if ($row["projectsid"] == $projectId) {
            $_SESSION["error"] = true;
            $_SESSION["msg"] = "Cannot delete because the project contains rooms. Delete the rooms before deleting the project.";
            header("Location: /clean/projects.php");
            die();
        }
    }
} catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
    die();
} 


// IF THERE ARE NO TABLES REFERENCING THIS COLUMN, DELETE IT
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

?>