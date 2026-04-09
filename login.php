<?php
session_start();
include "db_connect.php";

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit;
        } else {
            $message = "Invalid password!";
        }
    } else {
        $message = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body{font-family: Arial; background:#f4f6f8;}
        .form-box{width: 400px; margin:auto; margin-top:100px; background:white; padding:25px; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
        input{width:100%; padding:12px; margin:8px 0; border-radius:8px; border:1px solid #ccc;}
        button{width:100%; padding:12px; background:#007bff; color:white; border:none; border-radius:8px;}
        .message{color:red; margin:10px 0;}
    </style>
</head>
<body>
<div class="form-box">
    <h2>Login</h2>
    <?php if($message) echo "<div class='message'>$message</div>"; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>No account? <a href="register.php">Register here</a></p>
</div>
</body>
</html>