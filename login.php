<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'test') {
        $_SESSION['username'] = $username;
        header('Location: http://localhost/basephp/dashboard.php');
        exit;
    } else {
        echo "Username or Password is Wrong"; 
    }
}
?>

<html>
<head>
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <div class="field-group">
                <label>Username</label>
                <input type="text" name="username" />
            </div>
            <div class="field-group">
                <label>Password</label>
                <input type="password" name="password" />
            </div>
            <div class="field-group">
                <input type="submit" value="Login" />
            </div>
        </form>
    </div>
</body>
</html>
