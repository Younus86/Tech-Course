<?php
// Database connection
$servername = "localhost";
$username = "admin";
$password = "root";
$dbname = "basephp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $gender = $_POST["gender"];

    // Insert new student record
    $sql = "INSERT INTO tbl_students (first_name, last_name, gender) VALUES ('$firstName', '$lastName', '$gender')";
    if ($conn->query($sql) === true) {
        echo "New student record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve and display student records
$sql = "SELECT * FROM tbl_students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "First Name: " . $row["first_name"] . "<br>";
        echo "Last Name: " . $row["last_name"] . "<br>";
        echo "Gender: " . $row["gender"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No student records found";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        /* CSS styles */
    </style>
</head>
<body>
    <h1>Add Student</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required><br>
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
        <input type="submit" value="Add Student">
    </form>
</body>
</html>
