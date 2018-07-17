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

    if (!$_SESSION['admin']) {
        header("Location: /clean/bookshelves.php");
        die();
    }

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
                <div id="area" onmousedown="savePos(this, event)">
                    <?php
                    $bstatement = $db->prepare("SELECT * FROM bookshelves WHERE roomsid = :roomId ORDER BY id");
                    $bstatement->bindValue(':roomId', $roomId);
                    $bstatement->execute();

                    while ($row = $bstatement->fetch(PDO::FETCH_ASSOC)) {
                        echo '<style type="text/css">
                                #bookcase' . $row['id'] . ' {
                                    position: absolute;
                                    left: ' . $row['x'] . 'px;
                                    top: ' . $row['y'] . 'px;
                                }
                            </style>';

                        echo "<button style='max-height: 10px; margin: 0;' type='button' class='popup cases' id='bookcase" . $row['id'] . "' onmousedown=\"mouse(this, event, 'bookcase" . $row['id'] . "')\" ontouchstart=\"touch(this, event, 'bookcase" . $row['id'] . "')\" onload='setUp(this)'>";

                        echo"</button>";   
                    }
                    ?>
                    
                    <img id='trash' src="https://www.shareicon.net/download/2015/09/06/96799_trash_512x512.png" alt="Trash Icon">
                </div>
                
                <div id="hidden_form_container" style="display:none;"></div>
                <div id="hidden_form_container2" style="display:none;"></div>
                <br />
                <section>
                    <form action="insertBC.php" method="post" id="addBC">
                        <label for="shelves">Number of shelves:</label>
                        <input type="number" min="0" max="10" required name="shelves">
                        <button type="submit" id="shelfnum" name="shelfnum">Add Bookshelf</button>
<!--                        <button type="button" id="removeBC" onclick=-->
                    </form>
                </section>
                
            </section>

            <section class="bottomNav">
                <button onclick="viewRooms()">&#10094; Back to Rooms</button>
                <button onclick="saveChanges()">Save Changes</button>
            </section>
        </section>
    </body>
</html>