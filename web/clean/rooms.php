<?php

    session_start();

    if (!isset($_SESSION['project'])) {
        header("Location: /clean/home.php");
        die();
    }

    $projectId = $_SESSION['pro' + 'ject'];

    require("dbConnect.php");
    $db = get_db();
    
    echo $projectId;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cleaning Schedule | Room</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
    </head>
    
    <body>
        <?php require "user.php"?>
        <section class="content">
            <?php
                echo "<h2>";
                $statement = $db->prepare("SELECT name FROM projects WHERE id = :pId");
                $statement->bindValue(':pId', $projectId);
                $statement->execute();

                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo $row['name'];
                }
                echo "</h2>";
        
                if ($_SESSION["error"]) {
                    echo "<p style='color: red; text-align: center;'>*Error: " . $_SESSION["msg"] . "</p>";
                    $_SESSION["error"] = false;
                }
            ?>

            <form action="phpSession.php" method="post" name="rooms">
                <ul>
                    <?php
                    $bstatement = $db->prepare("SELECT * FROM rooms WHERE projectsid = :projectId ORDER BY id");
                    $bstatement->bindValue(':projectId', $projectId);
                    $bstatement->execute();

                    while ($bRow = $bstatement->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li>";
                        echo "<p class='first'><strong>" . $bRow['name'] . "</strong></p>";
                        
                        if ($bRow['isclean'] && $bRow['date']) {
                                echo "<p class='middle'>Cleaning completed " . $bRow['date'] . "</p>";
                        }
                        else {
                            echo "<p class='middle'>Cleaning incomplete.</p>";
                        }

                        echo "<p class='middle'></p>";
                        echo "<button class='last' type='submit' value='" . $bRow['id'] . "' name='viewRoom'>View</button>";
                        echo "<button class='last' type='button' onclick=\"showForm('hiddenForm', 'txtTitle', '" . $bRow['name'] . "', '" . $bRow['id'] . "')\">Edit</button>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </form>

            <section class="bottomNav">
                <button onclick="viewProjects()">&#10094; Back to Projects</button>
                <button type="button" onclick="showForm('hiddenForm', 'txtTitle', 'add')">Add Room</button>
            
                <form action="insert.php" method="post" name="add" id="hiddenForm" style="display: none;">
                    <br/><br/><br/>
                    <label id="anchor" for="txtTitle">Room Name: </label>	
                    <input type="text" id="txtTitle" name="rTitle">
                    <br/><br/>
                    <button type="submit" id="submit">Submit</button>
                    <button type="submit" id="remove" name="removeRoom" style="display: none;">Delete</button>
                </form>
            </section>
        </section>
    </body>
</html>