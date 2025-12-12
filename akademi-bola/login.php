<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        body { font-family: Arial; padding: 30px; }
        form { width: 300px; margin: auto; }
        input { width: 100%; padding: 8px; margin: 5px 0; }
        button { padding: 8px; width: 100%; background: blue; color: white; }
    </style>
</head>
<body>

<h2>Login Admin</h2>

<form action="login_proses.php" method="POST">
    <label>Username</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>

</body>
</html>
