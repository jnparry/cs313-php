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
                    $pstatement = $db->prepare("SELECT name FROM projects WHERE id = :pId");
                    $pstatement->bindValue(':pId', $projectId);
                    $pstatement->execute();
                    while ($project = $pstatement->fetch(PDO::FETCH_ASSOC)) {
                        echo $project['name'] . " - ";
                    }
        
                    $rstatement = $db->prepare("SELECT name FROM rooms WHERE id = :rId");
                    $rstatement->bindValue(':rId', $roomId);
                    $rstatement->execute();
                    while ($room = $rstatement->fetch(PDO::FETCH_ASSOC)) {
                        echo $room['name'] . " - Full View";
                    }
                ?>
            </h2>
            <form action="phpSession.php" method="post" name="rooms">
                <section>
                    <?php
                        $result = $db->query("SELECT * FROM bookshelves WHERE roomsid = '$roomId'");
                        echo "NUMBER OF ROWS: ";
                        echo $result->num_rooms;
                    
                        if($result->num_rows != 0) {
                            echo "<section id='container'>";

                            $bstatement = $db->prepare("SELECT * FROM bookshelves WHERE roomsid = :roomId");
                            $bstatement->bindValue(':roomId', $roomId);
                            $bstatement->execute();

                            while ($row = $bstatement->fetch(PDO::FETCH_ASSOC)) {
                                echo "<button type='button' style='position: absolute; left: " . $row['x'] . "px; bottom: " . $row['y'] . "px;' id='bookcase'></button>";

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
                            echo "</section>";
                        }
                    ?>
                </section>

                <section class="bottomNav">
                    <button type="button" onclick="viewRooms()">&#10094; Back to Room</button>
                    <?php echo "<button type='submit' value='$roomId' name='roomId'>Add Bookshelf</button>"; ?>
                </section>
            </form>
        </section>
    </body>
</html>