<?php

    session_start();

    if (!isset($_SESSION['project'])) {
        header("Location: /clean/home.php");
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
                    $bstatement = $db->prepare("SELECT * FROM bookshelves WHERE roomsid = :roomId");
                    $bstatement->bindValue(':roomId', $roomId);
                    $bstatement->execute();

                    while ($row = $bstatement->fetch(PDO::FETCH_ASSOC)) {
                        echo '<style type="text/css">
                                #bookcase' . $row['id'] . ' {
                                    position: relative;
                                    left: ' . $row['x'] . 'px;
                                    top: ' . $row['y'] . 'px;
                                }
                            </style>';

                        echo "<button style='max-height: 10px;' type='button' class='cases' id='bookcase" . $row['id'] . "' onmousedown=\"mouse(this, event, 'bookcase" . $row['id'] . "')\" ontouchstart=\"touch(this, event, 'bookcase" . $row['id'] . "')\" onload='setUp(this)'></button>";

                        $sstatement = $db->prepare('SELECT * FROM shelves WHERE bookshelvesid = :bsid');
                        $sstatement->bindValue(':bsid', $row['id']);
                        $sstatement->execute();

                        // Go through each shelf in the bookcase
//                        while ($sRow = $sstatement->fetch(PDO::FETCH_ASSOC))
//                        {
//                            echo "<p>This shelf ";
//                            if ($sRow['shelvesclean'] && $sRow['shelvesdate']) {
//                                echo "was cleaned " . $sRow['shelvesdate'] . "</p>";
//                            } else {
//                                echo "is not clean</p>";
//                            }
//                        }     
                    }
                    ?>
                </div>
                
                <section>
                    <form action="insertBC.php" method="post" id="addBC">
                        <p>Number of shelves</p>
                        <input type="number" min="0" max="10" required>
                        <button type="submit" id="shelfnum" name="shelfnum">Add Bookshelf</button>
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