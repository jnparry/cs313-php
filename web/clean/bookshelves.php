<?php

    session_start();
    $projectId = $_SESSION['project'];
    $roomId = $_SESSION['room'];

    require("dbConnect.php");
    $db = get_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cleaning Schedule</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
    </head>
    
    <body>
        <?php require "user.php"?>
        
        <section class="content">
            <h2>
                <?php
                    $statement = $db->prepare("SELECT name FROM projects WHERE id = :pId");
                    $statement->bindValue(':pId', $projectId);
                    $statement->execute();

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        echo $row['name'] . " - ";
                    }
        
                    $statement = $db->prepare("SELECT name FROM rooms WHERE id = :roomId");
                    $statement->bindValue(':roomId', $roomId);
                    $statement->execute();

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        echo $row['name'];
                    }
                ?>
            </h2>

            <section>
                <?php
                $bstatement = $db->prepare("SELECT * FROM bookshelves WHERE roomsid = :roomId");
                $bstatement->bindValue(':roomId', $roomId);
                $bstatement->execute();

                while ($row = $bstatement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<button type='button' style='position: absolute; left: " . $row['x'] . "px; bottom: " . $row['y'] . "px;' id='bookcase' onmousedown='mouse(this, event)'></button>";

                    $sstatement = $db->prepare('SELECT * FROM shelves WHERE bookshelvesid = :bsid');
                    $sstatement->bindValue(':bsid', $row['id']);
                    $sstatement->execute();

                    // Go through each shelf in the bookcase
                    while ($sRow = $sstatement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo "<p>This shelf ";
                        if ($sRow['shelvesclean'] && $sRow['shelvesdate']) {
                            echo "was cleaned " . $sRow['shelvesdate'] . "</p>";
                        } else {
                            echo "is not clean</p>";
                        }
                    }     
                }
                ?>
            
<!--
                <div id="area">
                    <img alt="temp" src="https://js.cx/clipart/ball.svg" id="ball" onmousedown="mouse(this, event)">
                    <img alt="temp" src="https://images.vexels.com/media/users/3/137269/isolated/preview/56079bda3325d326dc4307a9cc8aed63-fire-cartoon-silhouette-by-vexels.png" onmousedown="mouse(this, event)">
                    <button type="button" onmousedown="mouse(this, event)" ontouchstart="touch(this, event)">Testerrr</button>
                </div>
-->
                
                <section>
                    <p>Number of shelves</p>
                    <input type="number" min="0" max="10">
                    <button type="button" onclick="soon()">Add Bookshelf</button>
                </section>
                
            </section>

            <section class="bottomNav">
                <button onclick="viewViews()">&#10094; Back to Layout</button>
                <button onclick="viewRooms()">&#10094; Back to Rooms</button>
            </section>
        </section>
    </body>
</html>