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
            
            for ($i = 1; $i < 11; $i++) {
                if (($i % 2) == 0) {
                    echo "<div id=\"div$i\" color=red>$i</div>";
                }
                else {
                    echo "<div id=\"div$i\">$i</div>";
                }
            }
        ?>
    </body>
</html>