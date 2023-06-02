<?php
//print_r($_GET);
//$username = $_GET['username'];
//$password = $_GET['password'];

if ($username == 'admin' && $password == 'test') {
    header('Location: http://localhost/basephp/dashboard.php');
    exit;
} else {
    //echo "Username and Password Wrong";
}

//print($username);
//print($password);

?>


<html>

<head>
</head>
<body>
    <div class="container">
        <form action="">
            <div class="field-group">
                <label> Username </label>
                    <input type="text" name="username"/>
            </div>
            <div class="field-group">
                <label> Password</label>
                    <input type="text" name="password" />
            </div>
            <div class="field-group">
                
                    <input type="submit" name="" value="login" />
            </div>
        </form>
    </div>
</body>
</html>            
