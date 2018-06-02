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
                        echo $row['name'];
                    }
                ?>
            </h2>

            <section>
                Bookshelf image goes here
                <h3>This data is coming soon.</h3>
                
                <div id="area">
                    <img alt="temp" src="https://js.cx/clipart/ball.svg" id="ball" onmousedown="myFunction(this, event)">
                    <img alt="temp" src="https://images.vexels.com/media/users/3/137269/isolated/preview/56079bda3325d326dc4307a9cc8aed63-fire-cartoon-silhouette-by-vexels.png" onmousedown="myFunction(this, event)">
                </div>
                
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