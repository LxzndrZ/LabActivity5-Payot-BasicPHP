<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h2>Welcome!</h2>
    <p>You are logged in as <strong><?= htmlspecialchars($_SESSION['user']) ?></strong>.</p>
    <a href="index.php?logout=1">Log out</a>
</body>
</html>