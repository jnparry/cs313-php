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
                    <div id="container">
                    <?php
                        $bstatement = $db->prepare("SELECT * FROM bookshelves WHERE roomsid = '$roomId'");
                        $bstatement->execute();
                    
                        while ($row = $bstatement->fetch(PDO::FETCH_ASSOC)) {
//                            echo "<p>We have a bookercase. Its coordinates are (" . $row['x'] . ", " . $row['y'] . ").</p>";
                            echo "<button type='button' style='position: absolute; left: " . $row['x'] . "px; bottom: " . $row['y'] . "px;'>This is my bookcase x: " . $row['x'] . " y: " . $row['y'] .  "id='bookcase'</button>";
                            
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
                    </div>
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