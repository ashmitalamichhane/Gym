<?php
session_start();
$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) { 
    array_push($errors, "Username should contain only letters and numbers"); 
  }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password_1)) { 
    array_push($errors, "Password should be at least 8 characters long and contain at least one letter, one number, and one special character"); 
  }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE LOWER(username) = LOWER('$username') OR LOWER(email) = LOWER('$email') LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if (strtolower($user['username']) === strtolower($username)) {
      array_push($errors, "Username already exists");
    }

    if (strtolower($user['email']) === strtolower($email)) {
      array_push($errors, "Email already exists");
    }
  }

  if (count($errors) == 0) {
        $password = password_hash($password_1, PASSWORD_DEFAULT); // Better password hashing

        $query = "INSERT INTO users (username, email, password) 
                          VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: Book a membership.php');
  }
}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
          array_push($errors, "Username is required");
    }
    if (empty($password)) {
          array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
          $query = "SELECT * FROM users WHERE LOWER(username) = LOWER('$username')";
          $result = mysqli_query($db, $query);
          if ($user = mysqli_fetch_assoc($result)) {
              if (password_verify($password, $user['password'])) {
                  $_SESSION['username'] = $username;
                  $_SESSION['success'] = "You are now logged in";
                  header('location: Book a membership.php');
              } else {
                  array_push($errors, "Wrong password");
              }
          } else {
              array_push($errors, "Username not found");
          }
    }
}
?>  
