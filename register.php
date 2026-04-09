<?php
session_start();
include "db_connect.php";

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if username/email exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $message = "Username or email already exists!";
    } else {
        mysqli_query($conn, "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')");
        $message = "Account created successfully! <a href='login.php'>Login here</a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body{font-family: Arial; background:#f4f6f8;}
        .form-box{width: 400px; margin:auto; margin-top:100px; background:white; padding:25px; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
        input{width:100%; padding:12px; margin:8px 0; border-radius:8px; border:1px solid #ccc;}
        button{width:100%; padding:12px; background:#28a745; color:white; border:none; border-radius:8px;}
        .message{color:red; margin:10px 0;}
    </style>
</head>
<body>
<div class="form-box">
    <h2>Register</h2>
    <?php if($message) echo "<div class='message'>$message</div>"; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>
</body>
</html>