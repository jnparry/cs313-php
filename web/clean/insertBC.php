<?php

session_start();

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

require("dbConnect.php");
$db = get_db();

$numShelves = $_POST['shelfnum'];

try {
        $query = "INSERT INTO bookshelves(roomsid, isclean, date, x, y) VALUES(:roomsid, FALSE, NULL, 0, 0)";

        $statement = $db->prepare($query);
        $statement->bindValue(':roomsid', $roomId);
        $statement->execute();
    } catch (Exception $ex) {
        echo "Error with DB. Details: $ex";
        die();
} 

$last_id = $db->lastInsertId();
for ($i = 1; $i <= $numShelves; $i++) {
    try {
        $query = "INSERT INTO shelves (shelvesclean, shelvesdate, bookshelvesid, shelvesnum) VALUES(FALSE, NULL, :lastId, :i)";

        $statement = $db->prepare($query);
        $statement->bindValue(':lastId', $last_id);
        $statement->bindValue(':i', $i);
        $statement->execute();
    } catch (Exception $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }
}

header("Location: /clean/view.php");
die();