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

if (!isset($_SESSION['project'])) {
    header("Location: /clean/projects.php");
    die();
}

$projectId = $_SESSION['project'];
$roomId = $_SESSION['deleteId'];

require("dbConnect.php");
$db = get_db();

// CHECK IF THERE ARE ANY BOOKSHELVES REFERENCING THIS ROOM
try {
    $query = "SELECT * FROM bookshelves";

    $statement = $db->prepare($query);
    $statement->execute();
    
    $_SESSION["error"] = false;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        if ($row["roomsid"] == $roomId) {
            $_SESSION["error"] = true;
            $_SESSION["msg"] = "Cannot delete because the room contains bookcases. Delete the bookcases before deleting the room.";
            header("Location: /clean/rooms.php");
            die();
        }
    }
} catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
    die();
} 

// IF THERE ARE NO BOOKCASES REFERENCING THIS ROOM, DELETE IT
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