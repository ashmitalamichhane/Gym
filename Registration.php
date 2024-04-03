<?php
error_reporting(0);
$err = [];
$name = $email = $phone = $password = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])){
        $name = trim($_POST['name']);
        if(!preg_match("/^([A-Z][a-z\s]+)+$/",$name)){
            $err['name'] = 'Enter valid name';
        }
    }
    else{
        $err['name'] = 'Enter full name';
    }

    if(isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])){
        $email = trim($_POST['email']);
        if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/",$email)){
            $err['email'] = "Enter valid email";
        }
    }
    else{
        $err['email'] = 'Enter your email';
    }

    if(isset($_POST['password']) && !empty($_POST['password']) && trim($_POST['password'])){
        $password = trim($_POST['password']);
        $encrypted_password = md5($password);
        if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
            $err['password'] = 'Enter valid password';
        }
    }
    else{
        $err['password'] = 'Enter password';
    }
    if (isset($_POST['submit'])) {
        // Process registration form
        if (count($err) == 0) {
            try {
                require_once 'connection.php';
                $sql = "INSERT INTO users(username,email,password)
                VALUES('$name','$email','$encrypted_password')";
                mysqli_query($connection, $sql);
                echo 'Registration Successful.';
            } catch (Exception $ex) {
                die('Database Error:' . $ex->getMessage());
            }
        }
    } elseif (isset($_POST['login'])) {
        // Redirect to login page
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <div class="container">
        <h2>Registration</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div>
                <div class="form-box">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"/>
                    <?php echo isset($err['name'])?$err['name']:''; ?>
                </div>
                <div class="form-box">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"/>
                    <?php echo isset($err['email'])?$err['email']:''; ?>
                </div>
                <div class="form-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"/>
                    <?php echo isset($err['password'])?$err['password']:''; ?>
                </div>
                <div>
                <input type="submit" value="Submit" name="submit">
                <!-- Already registered option -->
                <a href="login.php" class="registered-link">Already Registered?</a>
            </div>
        </form>
    </div>
</body>
</html>