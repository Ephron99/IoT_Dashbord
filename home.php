<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IoT Dashboard Home</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f6f8;
            color: #333;
        }
        header {
            background: #007bff;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .hero {
            text-align: center;
            padding: 80px 20px;
        }
        .hero h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 18px;
            margin-bottom: 40px;
        }
        .buttons a {
            display: inline-block;
            padding: 14px 28px;
            margin: 0 10px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }
        .buttons a.login {
            background: #007bff;
        }
        .buttons a:hover {
            opacity: 0.9;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #eee;
            margin-top: 40px;
        }
        @media (max-width: 600px) {
            .hero h2 {
                font-size: 28px;
            }
            .buttons a {
                margin: 10px 0;
                display: block;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>IoT Sensor Dashboard</h1>
        <nav>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="index.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="hero">
        <h2>Welcome to Your Smart IoT Dashboard</h2>
        <p>Monitor temperature, humidity, and sensor data from your ESP32 devices in real-time. Visualize trends, analyze readings, and manage your IoT sensors easily.</p>
        <div class="buttons">
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="index.php" class="login">Go to Dashboard</a>
            <?php else: ?>
                <a href="register.php">Register</a>
                <a href="login.php" class="login">Login</a>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> IoT Dashboard. All rights reserved.
    </footer>
</body>
</html>