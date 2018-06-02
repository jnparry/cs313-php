<?php

session_start();

$projectId = $_SESSION['project'];
$roomId = $_SESSION['room'];

try {
    $dbUrl = getenv('HEROKU_POSTGRESQL_CRIMSON_URL');
    $dbopts = parse_url($dbUrl);
    
    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');
    
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
}
catch (PDOException $ex){
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cleaning Schedule</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
<!--        <script src="https://cdn.rawgit.com/konvajs/konva/2.1.3/konva.min.js"></script>-->
    </head>
    
    <body>
        <?php require "user.php"?>
        <section class="content">
            <h2>
                <?php
                    foreach ($db->query("SELECT name FROM projects WHERE id = '$projectId'") as $row) {
                        echo $row['name'] . " - ";
                    }
                    foreach ($db->query("SELECT name FROM rooms WHERE id = '$roomId'") as $row) {
                        echo $row['name'] . " - Full View";
                    }
                ?>
            </h2>
            <form action="phpSession.php" method="post" name="rooms">
                <section>
                    <div id="area">
                        <img alt="temp" src="https://js.cx/clipart/ball.svg" id="ball" onmousedown="myFunction(this, event)">
                        <img alt="temp" src="https://images.vexels.com/media/users/3/137269/isolated/preview/56079bda3325d326dc4307a9cc8aed63-fire-cartoon-silhouette-by-vexels.png" onmousedown="myFunction(this, event)">
                    </div>
    
                    <?php
                        $statement = $db->prepare("SELECT * FROM bookshelves b, shelves s WHERE roomsid = '$roomId' AND b.id = s.bookshelvesid");
                        $statement->execute();
                    
                        // Go through each result
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            echo "<p>We have a BOOOOOKCASE. Its coordinates are (" . $row['x'] . ", " . $row['y'] . ").";
                            echo "<button type='button' style='position: relative; right: " . $row['x'] . "px; top: " . $row['y'] . "px;'>This is my bookcase</button>";
                            echo "<p>This shelf ";
                            if ($row['shelvesclean'] && $row['shelvesdate']) {
                                echo "was cleaned " . $row['shelvesdate'] . "</p>";
                            } else {
                                echo "is not clean</p>";
                            }
                        }
                            
//                        foreach ($db->query("SELECT * FROM bookshelves b, shelves s WHERE roomsid = '$roomId' AND b.id = s.bookshelvesid") as $row) {
//                            echo "<p>We have a bookcase. Its coordinates are (" . $row['x'] . ", " . $row['y'] . ").";
//                            echo "<button type='button' style='position: relative; right: " . $row['x'] . "px; top: " . $row['y'] . "px;'>This is my bookcase</button>";
//                            echo "<p>This shelf ";
//                            if ($row['shelvesclean'] && $row['shelvesdate']) {
//                                echo "was cleaned " . $row['shelvesdate'] . "</p>";
//                            } else {
//                                echo "is not clean</p>";
//                            }
//                        }
                    ?>
                    <h3>This data is coming soon.</h3>
                </section>

                <section class="bottomNav">
                    <button type="button" onclick="viewRooms()">&#10094; Back to Room</button>
                    <?php echo "<button type='submit' value='$roomId' name='roomId'>Add Bookshelf</button>"; ?>
                </section>
            </form>
        </section>
    </body>
</html>