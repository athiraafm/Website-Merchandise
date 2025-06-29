<?php
session_start();

$users = [
    "admin" => ["pass" => "admin123", "level" => "admin"],
    "staf" => ["pass" => "staf123", "level" => "staf"],
    "user" => ["pass" => "user123", "level" => "user"]
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($users[$username]) && $users[$username]["pass"] === $password) {
        $_SESSION["username"] = $username;
        $_SESSION["level"] = $users[$username]["level"];

        if ($_SESSION["level"] === "admin") {
            header("Location: dashboard_admin.php");
        } elseif ($_SESSION["level"] === "staf") {
            header("Location: dashboard_staf.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        $error = "Login gagal: Username atau Password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('bg.png') no-repeat center center/cover;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-overlay {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
            color: white;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }

        .login-overlay h2 {
            text-align: center;
            color: #ff69b4;
            margin-bottom: 25px;
        }

        .login-overlay label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        .login-overlay input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: none;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
        }

        .login-overlay button {
            width: 100%;
            background-color: #ff69b4;
            color: white;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-overlay button:hover {
            background-color: #ff1493;
        }

        .error {
            color: #ffcccb;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-overlay">
    <h2>Login</h2>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
</div>

</body>
</html>
