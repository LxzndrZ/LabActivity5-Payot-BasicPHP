<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <form onsubmit="localStorage.setItem('registeredEmail', this.email.value.trim()); localStorage.setItem('registeredPassword', this.password.value); location.href = 'login.php'; return false;">
        <p>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </p>
        <p>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </p>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Log in</a></p>
</body>
</html>