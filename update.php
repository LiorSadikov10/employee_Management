<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php


        // database connection
        include_once "connection.php";
        // we retrieve the id in the link
        $id = $_GET['id'];

        // query to display employee info
        $req = mysqli_query($con, "SELECT * FROM Employee WHERE id = $id");
        $row = mysqli_fetch_assoc($req);




        // check that the add button has been clicked
        if(isset($_POST['button'])){
            // extraction of information sent in variables by the method POST
            extract($_POST);
            // check that all fields have been completed
            if(isset($firstName) && isset($lastName) && ($age)){
                //change request
                $req = mysqli_query($con, "UPDATE employee SET firstName = '$firstName', lastName = '$lastName', age = '$age' WHERE id =$id");

                if($req){ //if the request has been made successfully, we make a redirection
                    header("Location:index.php");
                }else{ //if not
                    $message = "Employee not Update";
                }
            }else{
                //if not
                $message = "please complete all fields";
            }
        }
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png">Return</a>
        <h2>Update Employee : <?=$row['firstName']?> </h2>
        <p class="error_message">
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="POST">
            <label>First Name</label>
            <input type="text" name="firstName" value="<?=$row['firstName']?>">
            <label>Last Name</label>
            <input type="text" name="lastName" value="<?=$row['lastName']?>">
            <label>Age</label>
            <input type="number" name="age" value="<?=$row['age']?>">
            <input type="submit" value="Update" name="button">
        </form>
    </div>
</body>
</html>