<?php
    // connection to database
    $con = mysqli_connect("localhost", "root", "","company");
    if(!$con){
        echo "you are not connected to the database";
    }
?>