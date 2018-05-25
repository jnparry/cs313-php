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
        <title>Cleaning Schedule</title>
        <link rel="stylesheet" href="home.css">
        <script src="home.js"></script>
    </head>
    
    <body>
        <h2>
            <?php
                foreach ($db->query("SELECT name FROM projects WHERE id = '$projectId'") as $row) {
                    echo $row['name'] . " - ";
                }
                foreach ($db->query("SELECT name FROM rooms WHERE id = '$roomId'") as $row) {
                    echo $row['name'];
                }
            ?>
        </h2>
        <section>
            <button onclick="viewProjects()">Back to Projects</button>
            <button onclick="viewRooms()">Back to Rooms</button>
        </section>
        
        <section>
            <?php
                foreach ($db->query("SELECT * FROM bookshelves WHERE roomsid = '$roomId'") as $row) {
                    echo "<p>We have a bookcase. Its coordinates are (" . $row['x'] . ", " . $row['y'] . ")."; 
                }
            ?>
            
            Bookshelf image goes here
            <section>
                <p>Number of shelves</p>
                <input type="number" min="0" max="10">
                <button>Add Bookshelf</button>
            </section>
        </section>
    </body>
</html>