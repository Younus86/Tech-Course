<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config/db.php';

$row = array(
    'id' => '',
    'first_name' => '',
    'last_name' => '',
    'gender' => '',
    'fee' => '',
);

if (!empty($_GET['id'])) {
    $edit_id = $_GET['id'];

    mysqli_select_db($conn, $dbname);

    $sql = 'SELECT * FROM tbl_students WHERE id=' . $edit_id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'update') {
            if (!empty($_POST['updateid'])) {
                // Update existing record
                $update_id = $_POST['updateid'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $gender = $_POST['gender'];
                $fee = $_POST['fee'];

                mysqli_select_db($conn, $dbname);
                $sql = "UPDATE tbl_students SET first_name='$first_name', last_name='$last_name', gender='$gender', fee='$fee' WHERE id=$update_id";
                $result = $conn->query($sql);

                if ($result) {
                    echo "Record Updated Successfully";
                } else {
                    echo "Update Failed: " . $conn->error;
                }
            }
        } elseif ($action === 'add') {
            // Add new record
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $fee = $_POST['fee'];

            mysqli_select_db($conn, $dbname);
            $sql = "INSERT INTO tbl_students (first_name, last_name, gender, fee) VALUES ('$first_name', '$last_name', '$gender', '$fee')";
            $result = $conn->query($sql);

            if ($result) {
                echo "Record Added Successfully";
            } else {
                echo "Add Failed: " . $conn->error;
            }
        } elseif ($action === 'delete') {
            if (!empty($_POST['deleteid'])) {
                // Delete record
                $delete_id = $_POST['deleteid'];

                mysqli_select_db($conn, $dbname);
                $sql = "DELETE FROM tbl_students WHERE id=$delete_id";
                $result = $conn->query($sql);

                if ($result) {
                    echo "Record Deleted Successfully";
                } else {
                    echo "Delete Failed: " . $conn->error;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets\css\style.css">
</head>
<body>
    <div class="container">
        <div class="menu">
            <div class="user">
                <div class="Username">
                    <!-- Placeholder for displaying the username -->
                    <?php echo isset($edit_id) ? $edit_id : ''; ?>
                </div>
                <div class="logout">
                    <a href="http://localhost/basephp/index.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="content">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="field-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"/>
                </div>
                <div class="field-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"/>
                </div>
                <div class="field-group">
                    <label>Gender</label>
                    <input type="text" name="gender" value="<?php echo $row['gender']; ?>" />
                </div>
                <div class="field-group">
                    <label>Fee</label>
                    <input type="text" name="fee" value="<?php echo $row['fee']; ?>"/>
                </div>

                <br><br><br>

                <div class="field-group ib">
                    <?php if (isset($edit_id)): ?>
                        <input type="hidden" name="updateid" value="<?php echo $edit_id; ?>" />
                        <input type="hidden" name="action" value="update" />
                        <input type="submit" value="Update">
                    <?php else: ?>
                        <input type="hidden" name="action" value="add" />
                        <input type="submit" name="add" value="Add">
                    <?php endif; ?>

                    <a class="btn" href="dashboard.php">Go to dashboard</a>
                </div>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Fee</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    mysqli_select_db($conn, $dbname);
                    $sql = 'SELECT * FROM tbl_students';
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['fee'] . "</td>";
                            echo "<td>
                                <form method='POST' action='".$_SERVER['PHP_SELF']."'>
                                    <input type='hidden' name='deleteid' value='".$row['id']."' />
                                    <input type='hidden' name='action' value='delete' />
                                    <input type='submit' value='Delete' onclick=\"return confirm('Are you sure you want to delete this record?');\">
                                </form>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
                    <!--[if lt IE 7]>

