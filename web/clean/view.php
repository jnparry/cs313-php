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
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <script src="home.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

                        $statement = $db->prepare("SELECT * FROM bookshelves WHERE roomsid = :roomId ORDER BY id");
                        $statement->bindValue(':roomId', $roomId);
                        $statement->execute();

                        if ($statement->fetch(PDO::FETCH_ASSOC)) {
                            echo '<style type="text/css">
                                #container {
                                    display: block;
                                }
                                </style>';
                        }

                        $bstatement = $db->prepare("SELECT * FROM bookshelves WHERE roomsid = :roomId ORDER BY id");
                        $bstatement->bindValue(':roomId', $roomId);
                        $bstatement->execute();

//                    onclick='popUp(" . $row['id'] . ")' 
                        while ($row = $bstatement->fetch(PDO::FETCH_ASSOC)) {
                            $sstatement = $db->prepare('SELECT * FROM shelves WHERE bookshelvesid = :bsid ORDER BY shelvesnum');
                            $sstatement->bindValue(':bsid', $row['id']);
                            $sstatement->execute();
                            
                            $myModalContent = "";

                            // Go through each shelf in the bookcase
                            $empty = true;
                            
                            while ($sRow = $sstatement->fetch(PDO::FETCH_ASSOC)) {
                                $empty = false;
                                $myModalContent = $myModalContent . "Shelf #" . $sRow['shelvesnum'] . " ";
                                if ($sRow['shelvesclean'] && $sRow['shelvesdate']) {
                                    $myModalContent = $myModalContent . "was cleaned " . $sRow['shelvesdate'] . "/n";
                                } else {
                                    $myModalContent = $myModalContent . "is not clean\n";
                                    $notClean = True;
                                }
                            }                            
                                 
                            if ($empty)
                                $myModalContent = $myModalContent . "No shelves here\n";
                            
                            
                            echo "<button data-toggle='modal' data-target='#myModal' type='button' class='popup btn btn-info btn-lg' onclick=\"setModalContent('" . $myModalContent . "')\" style='padding: 1em; height: 2em; width: 4em; color: black; position: absolute; left: " . $row['x'] . "px; top: " . $row['y'] . "px;' id='bookcase'>"; 
                            
                            
                            
                            
                            
                            if (!$notClean)
                                echo "Clean";
                            echo"</button>";    
                        }
                    ?>
                </section>

                <!-- Trigger the modal with a button -->
<!--                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button style="font-size: 1em; padding: 0;" type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">This is my modal.</h4>
                      </div>
                      <div class="modal-body">
                        <p id="myModalContent"></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                
                <section class="bottomNav">
                    <br/>
                    <button type="button" onclick="viewRooms()">&#10094; Back to Room</button>
                    <?php 
                    if ($_SESSION['admin']) {
                        echo "<button type='submit' value='$roomId' name='roomId'>Edit</button>";
                    }
                    ?>
                </section>
            </form>
        </section>
    </body>
</html>