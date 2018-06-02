<?php

    session_start();
    $projectId = $_SESSION['project'];

    require("dbConnect.php");
    $db = get_db();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cleaning Schedule | Room</title>
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
                        echo $row['name'];
                    }
                ?>
            </h2>

            <form action="phpSession.php" method="post" name="rooms">
                <ul>
                    <?php
                    $bstatement = $db->prepare("SELECT * FROM rooms WHERE projectsid = :projectId");
                    $bstatement->bindValue(':projectId', $projectId);
                    $bstatement->execute();

                    while ($bRow = $bstatement->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li>";
                        echo "<p class='first'><strong>" . $bRow['name'] . "</strong></p>";
                        
                        if ($bRow['isclean'] && $bRow['date']) {
                                echo "<p class='middle'>Cleaning completed " . $bRow['date'] . "</p>";
                        }
                        else {
                            echo "<p class='middle'>Cleaning incomplete.</p>";
                        }

                        echo "<p class='middle'></p>";
                        echo "<button class='last' type='submit' value='" . $bRow['id'] . "' name='viewRoom'>View</button>";
                        echo "<button class='last' type='button' onclick='soon()'>Edit</button>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </form>

            <section class="bottomNav">
                <button onclick="viewProjects()">&#10094; Back to Projects</button>
                <button type="button" onclick="soon()">Add Room</button>
            </section>
        </section>
    </body>
</html>