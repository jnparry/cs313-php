<?php

session_start();


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

for ($i = 0; $i < $num_items; $i++) {
    if ($_POST['left' . $i]) {
        $n = $_POST['left' . $i];
        $whole = floor($n);
        $fraction = $n - $whole;
        $fraction = Math.round($fraction);
        
        // chop off the leading zero and the decimal, then everything after the 1st number
        $id = substr($fraction, 2);
        $id = substr($id, 0, 1);

        echo "N: " . $n;
        echo "Whole: " . $whole;
        echo "Fraction: " . $fraction;
        echo " Id: " . $id . " Then the error: ";

        try {
            $query = "UPDATE bookshelves SET x = :left WHERE id = :bId";

            $statement = $db->prepare($query);
            $statement->bindValue(':left', $whole);
            $statement->bindValue(':bId', $id);
            $statement->execute();
        } catch (Exception $ex) {
                echo "Error wttith DB. Details: $ex";
                die();
        } 
    }
    
    if ($_POST['top' . $i]) {
        $n = $_POST['top' . $i];
        $whole = floor($n);
        $fraction = $n - $whole;
        
        // chop off the leading zero and the decimal, then everything after the 1st number
        $id = substr($fraction, 2);
        $id = substr($id, 0, 1);
        
        echo "N: " . $n;
        echo "Whole: " . $whole;
        echo "Fraction: " . $fraction;
        echo " Id: " . $id . " Then the error: ";

        try {
            $query = "UPDATE bookshelves SET y = :top WHERE id = :bId";

            $statement = $db->prepare($query);
            $statement->bindValue(':top', $whole);
            $statement->bindValue(':bId', $id);
            $statement->execute();
        } catch (Exception $ex) {
                echo "Error wttith DB. Details: $ex";
                die();
        } 
    }
} 

//header("Location: /clean/bookshelves.php");
//die();

//var_dump($_REQUEST);

?>