<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>My PHP Title Page</title>
        
        <script>
        </script>
        
        <style>
        </style>
    </head>
    
    <body>
        <p>This is a php page</p>
        <?php
            $x = 4 + "cat";
            echo "<p>$x</p>";
            
            for ($i = 0; $i < 10; $i++) {
                echo "<div id=\"div($i + 1)\"></div>";
            }
        ?>
    </body>
</html>