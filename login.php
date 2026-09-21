<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');

    if ($email !== '') {
        $_SESSION['user'] = $email;
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Log in</h2>

    <p id="error" style="color: red;"></p>

    <form method="POST" action="login.php" onsubmit="return checkEmail(this);">
        <p>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </p>
        <p>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </p>
        <button type="submit">Log in</button>
    </form>

    <p>No account yet? <a href="register.php">Register</a></p>

    <script>
        function checkEmail(form) {
            var registeredEmail = localStorage.getItem('registeredEmail');
            var error = document.getElementById('error');

            if (!registeredEmail) {
                error.textContent = 'No account found. Please register first.';
                return false;
            }
            if (form.email.value.trim() !== registeredEmail) {
                error.textContent = 'Incorrect email. Check it and try again.';
                return false;
            }

            error.textContent = '';
            return true;
        }
    </script>
</body>
</html>