<?php
session_start();
unset($_SESSION['admin_logged_in']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<div class="login">
    <form action="action/do-login.php" method="post">
        <input type="text" name="username" placeholder="Enter your username"><br>
        <input type="password" name="password" placeholder="Enter your password"><br>
        <input type="submit" name="login" value="login to admin section">
    </form>
</div>
</body>
</html>
