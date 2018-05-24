<?php

try {
    $dbUrl = getenv('DATABASE_URL');

    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dpopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost:)
}
catch {

}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cleaning Schedule | Project</title>
        <link rel="stylesheet" href="home.css">
        <script src="project.js"></script>
    </head>
    
    <body>
        <?php require ""?>
        <h2>Selected Project</h2>
        <section>
            <button>Add Room</button>
        </section>
        
        <section>
            <ul>
                <li>3rd Floor<button>edit</button></li>
                <li>West Wing<button>edit</button></li>
                <li>East Wing<button>edit</button></li>
            </ul>
        </section>
    </body>
</html>