<?php
    // database connection
    include_once "connection.php";
    // retrieve the id in the link
    $id = $_GET['id'];
    // Request for deletion
    $req = mysqli_query($con, "DELETE FROM employee WHERE id = $id");
    // redirect to index.php page
    header("Location:index.php");

?>