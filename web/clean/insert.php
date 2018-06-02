<?php

    if (isset($_POST['txtTitle'])) {    
        $title = $_POST['projectId'];
        echo "In if";
        echo $title;
    }

    // we could (and should!) put additional checks here to verify that all this data is actually provided
    echo $title;

    require("dbConnect.php");
    $db = get_db();

    echo "whuddup";
?>