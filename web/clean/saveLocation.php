<?php

session_start();

$projectId = $_SESSION['project'];

if (isset($_POST['rename']))
    $submitType = $_POST['rename'];
if (isset($_POST['add']))
    $submitType = $_POST['add'];
if (isset($_POST['removeP'])) {
    $_SESSION["deleteId"] = $_POST['removeP'];
    header("Location: /clean/remove.php");
    die();
}
if (isset($_POST['removeRoom'])) {
    $_SESSION["deleteId"] = $_POST['removeRoom'];
    header("Location: /clean/removeRoom.php");
    die();
}

require("dbConnect.php");
$db = get_db();

// PROJECTS
if (isset($_POST['pTitle'])) {
    $title = $_POST['pTitle'];
    
    // CHECK TO SEE IF WE ALREADY HAVE THIS NAME OF PROJECT
    try {
        $statement = $db->prepare("SELECT * FROM projects");
        $statement->execute();
        $_SESSION["error"] = false;
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            if ($row["name"] == $title) {
                $_SESSION["error"] = true;
                $_SESSION["msg"] = "Project '" . $title . "' already exists. Please use another name.";
                header("Location: /clean/projects.php");
                die();
            }
        }
    } catch (Exception $ex) {
        echo "Error with DB. Details: $ex";
        die();
    } 
    
    // EITHER ADD OR UPDATE IF THE NAME ISN'T ALREADY USED
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
            echo "Error wttith DB. Details: $ex";
            die();
    } 
    
    header("Location: /clean/projects.php");
    die();
}

?>