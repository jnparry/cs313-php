<?php

session_start();

$projectId = $_SESSION['project'];

if (isset($_POST['delete'])) {
    $_SESSION['deleteId'] = $_POST['delete'];
    header("Location: /clean/remove.php");
    die();
}
if (isset($_POST['rename']))
    $submitType = $_POST['rename'];
if (isset($_POST['add']))
    $submitType = $_POST['add'];

require("dbConnect.php");
$db = get_db();

if (isset($_POST['pTitle'])) {
    $title = $_POST['pTitle'];
    
    try {
        if ($submitType == "add") {
            $query = "INSERT INTO projects(name, iscomplete, date) VALUES(:name, FALSE, NULL)";

            $statement = $db->prepare($query);
            $statement->bindValue(':name', $title);
            $statement->execute();
        }
        else if (is_numeric($submitType)) {
            $query = "UPDATE projects SET name = :title WHERE id = :pId";

            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':pId', $submitType);
            $statement->execute();
        }
    } catch (Exception $ex) {
            echo "Error with DB. Details: $ex";
            die();
    } 
    
    header("Location: /clean/projects.php");
    die();
}
else if (isset($_POST['rTitle'])) {
    $title = $_POST['rTitle'];
    
    try {
        if ($submitType == "add") {
            $query = "INSERT INTO rooms(name, projectsid, isclean, date) VALUES(:name, :pId, FALSE, NULL)";

            $statement = $db->prepare($query);
            $statement->bindValue(':name', $title);
            $statement->bindValue(':pId', $projectId);
            $statement->execute();
        }
        else if (is_numeric($submitType)) {
            $query = "UPDATE rooms SET name = :name WHERE id = :pId";

            $statement = $db->prepare($query);
            $statement->bindValue(':name', $title);
            $statement->bindValue(':pId', $projectId);
            $statement->execute();
        }
    } catch (Exception $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }
    
    header("Location: /clean/rooms.php");
    die();
}
else if (isset($_POST['shelfnum'])) {
    $roomId = $_SESSION['room'];
    $num = $_POST['shelfnum'];
    
    try {
        $query = "INSERT INTO bookshelves(roomsid, isclean, date, x, y) VALUES(:rId, FALSE, NULL, 0, 0)";

        $statement = $db->prepare($query);
        $statement->bindValue(':rId', $roomId);
        $statement->execute();
    } catch (Exception $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }
    
    header("Location: /clean/bookshelves.php");
    die();
}

?>