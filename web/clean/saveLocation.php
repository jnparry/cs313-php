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
    header("Location: /clean/rooms.php");
    die();
}

require("dbConnect.php");
$db = get_db();

$projectId = $_SESSION['project'];
$roomId = $_SESSION['room'];
$num_items = $_POST['num'];
$idnum = $_POST['id'];
echo "NUM ITEMS: " . $num_items;

for ($i = 0; $i < $num_items; $i++) {
    if ($_POST['left' . $i]) {
        echo "Post left.<br>";
        
        $whole = $_POST['left' . $i];

        try {
            echo "query left. Whole: " . $whole . " idnum: " . $idnum . "<br>";
            $query = "UPDATE bookshelves SET x = :left WHERE id = :bId";

            $statement = $db->prepare($query);
            $statement->bindValue(':left', $whole);
            $statement->bindValue(':bId', $idnum);
            $statement->execute();
        } catch (Exception $ex) {
                echo "Error wttith DB. Details: $ex";
                die();
        } 
    }
    
    if ($_POST['top' . $i]) {
        echo "Post top.<br>";
        
        $whole = $_POST['top' . $i];

        try {
            echo "query top. Whole: " . $whole . " idnum: " . $idnum . "<br>";
            $query = "UPDATE bookshelves SET y = :top WHERE id = :bId";

            $statement = $db->prepare($query);
            $statement->bindValue(':top', $whole);
            $statement->bindValue(':bId', $idnum);
            $statement->execute();
        } catch (Exception $ex) {
                echo "Error wttith DB. Details: $ex";
                die();
        } 
    }
} 

header("Location: /clean/bookshelves.php");
die();

?>