<?php
session_start();
include 'config/db.php';

$uname = '';
if (!empty($_SESSION['username'])) {
    $uname = $_SESSION['username'];
}

// Select the database
if (!$conn->select_db('basephp')) {
    die("Database selection failed: " . $conn->error);
}


$sql = "SELECT * FROM tbl_students";
$result = $conn->query($sql);

?>

 <?php



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="menu">
            <div class="user">
                <div class="Username">
                <?php echo $uname; ?>
                </div>
                <div class="logout">
                    <a href="http://localhost/basephp/index.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="content">
            <table>
            <?php

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){

                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['first_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['last_name']; ?>
                        </td> 
                        <td>
                            <?php echo $row['gender']; ?>
                        </td>
                        <td>
                            <?php echo $row['class_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['fee']; ?>
                        </td>
                    </tr>


                    <?php
                }

            }
            ?>
            </table>
        </div>
    </div>    

    <script src="" async defer></script>
</body>
</html>
