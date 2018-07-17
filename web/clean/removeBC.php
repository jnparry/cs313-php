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
    header("Location: /clean/home.php");
    die();
}

if (!isset($_SESSION['room'])) {
    header("Location: /clean/projects.php");
    die();
}

$projectId = $_SESSION['project'];
$roomId = $_SESSION['room'];
$bcId = $_POST['bookcase'];

require("dbConnect.php");
$db = get_db();

try {
        $query = "INSERT INTO bookshelves(roomsid, isclean, date, x, y) VALUES(:roomsid, FALSE, NULL, 0, 0)";

        $statement = $db->prepare($query);
        $statement->bindValue(':roomsid', $roomId);
        $statement->execute();
    } catch (Exception $ex) {
        echo "Error with DB. Details: $ex";
        die();
} 

// CHECK IF THERE ARE ANY SHELVES REFERENCING THIS BOOKCASE, IF SO, DELETE
try {
    $query = "DELETE FROM shelves WHERE bookshelvesid = :id";

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $bcId);
    $statement->execute();
} catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
    die();
} 

// ONCE THERE ARE NO SHELVES REFERENCING THIS BOOKCASE, DELETE IT
try {
    $query = "DELETE FROM bookshelves WHERE id = :id";

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $bcId);
    $statement->execute();
} catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
    die();
}

header("Location: /clean/view.php");
die();

?>