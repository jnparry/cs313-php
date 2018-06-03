<?php

session_start();
$projectId = $_SESSION['project'];

if ($_POST['rename']) {
    $submitType = $_POST['rename'];
}

if ($_POST['add']) {
    $submitType = $_POST['add'];
}
$title = $_POST['pTitle'];
if ($submitType) {
    echo "Submission type: " . $submitType . $title;
} else {
    echo "Null";
}

//require("dbConnect.php");
//$db = get_db();
//
//if (isset($_POST['pTitle'])) { 
//    try {
//        $title = $_POST['pTitle'];
//        $query = "INSERT INTO projects(name, iscomplete, date) VALUES(:name, FALSE, NULL)";
//
//        $statement = $db->prepare($query);
//        $statement->bindValue(':name', $title);
//        $statement->execute();
//    } catch (Exception $ex) {
//        echo "Error with DB. Details: $ex";
//        die();
//    }
//    
//    header("Location: /clean/projects.php");
//    die();
//}
//else if (isset($_POST['rTitle'])) {
//    try {
//        $title = $_POST['rTitle'];
//        $query = "INSERT INTO rooms(name, projectsid, isclean, date) VALUES(:name, :pId, FALSE, NULL)";
//
//        $statement = $db->prepare($query);
//        $statement->bindValue(':name', $title);
//        $statement->bindValue(':pId', $projectId);
//        $statement->execute();
//    } catch (Exception $ex) {
//        echo "Error with DB. Details: $ex";
//        die();
//    }
//    
//    header("Location: /clean/rooms.php");
//    die();
//}

?>