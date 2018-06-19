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

                <section id='container'>
                    <?php

                        $statement = $db->prepare("SELECT * FROM bookshelves WHERE roomsid = :roomId");
                        $statement->bindValue(':roomId', $roomId);
                        $statement->execute();

                        if ($statement->fetch(PDO::FETCH_ASSOC)) {
                            echo '<style type="text/css">
                                #container {
                                    display: block;
                                }
                                </style>';
                        }

                        $bstatement = $db->prepare("SELECT * FROM bookshelves WHERE roomsid = :roomId");
                        $bstatement->bindValue(':roomId', $roomId);
                        $bstatement->execute();

                        while ($row = $bstatement->fetch(PDO::FETCH_ASSOC)) {
                            echo "<button type='button' class='popup' onclick='popUp(" . $row['id'] . ")' 
                            style='height: 2em; width: 4em; color: black; position: relative; 
                            left: " . $row['x'] . "px; top: " . $row['y'] . "px;' id='bookcase'>
                                <span class='popuptext' id='myPopup" . $row['id'] . "'>";

                            $sstatement = $db->prepare('SELECT * FROM shelves WHERE bookshelvesid = :bsid ORDER BY shelvesnum');
                            $sstatement->bindValue(':bsid', $row['id']);
                            $sstatement->execute();

                            // Go through each shelf in the bookcase
                            while ($sRow = $sstatement->fetch(PDO::FETCH_ASSOC))
                            {
                                echo "<p>Shelf #" . $sRow['shelvesnum'] . " ";
                                if ($sRow['shelvesclean'] && $sRow['shelvesdate']) {
                                    echo "was cleaned " . $sRow['shelvesdate'] . "</p>";
                                } else {
                                    echo "is not clean</p>";
                                    $notClean = True;
                                }
                            }                            
                                        
                            echo "</span>";
                            if (!$notClean)
                                echo "Clean";
                            echo"</button>";    
                        }
                    ?>
                </section>

                <section class="bottomNav">
                    <br/>
                    <button type="button" onclick="viewRooms()">&#10094; Back to Room</button>
                    <?php echo "<button type='submit' value='$roomId' name='roomId'>Edit</button>"; ?>
                </section>
            </form>
        </section>
    </body>
</html>