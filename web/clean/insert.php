<?php

    if (isset($_POST['txtTitle'])) {    
        $title = $_POST['txtTitle'];
        echo "In if";
        echo "$title";
    }

    // we could (and should!) put additional checks here to verify that all this data is actually provided
    echo "out of if ";
    echo "$title";

    $newtitle = $_POST['txtTitle'];
    echo "new title: ";
    echo "$newtitle";

    echo "new title no quotes: ";
    echo $newtitle;
    
    require("dbConnect.php");
    $db = get_db();

    echo "whuddup";
?>