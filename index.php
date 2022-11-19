<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="add.php" class="btn_add"> <img src="images/plus.png">Add</a>

        <table>
            <tr id="items">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
                // include the connect 
                include_once "connection.php";
                // query to display the list of employees
                $req = mysqli_query($con, "SELECT * FROM Employee");
                if (mysqli_num_rows($req) == 0) {
                    // if there is no employee in the database, then this message is displayed :
                        echo "There is not yet added employees";
                }else{
                    // if not, display the list of all employees
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['firstName']?></td>
                            <td><?=$row['lastName']?></td>
                            <td><?=$row['age']?></td>
                            <!--We will put the id of each employee in this link-->
                            <td><a href="update.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
                            <td><a href="delete.php?id=<?=$row['id']?>"><img src="images/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>