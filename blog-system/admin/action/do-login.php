<?php
    require_once 'db.php';
    global $db;
    session_start();
    unset($_SESSION['admin_logged_in']);
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $check_admin = mysqli_query($db, "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'");

    if (mysqli_num_rows($check_admin) > 0) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: ../index.php');
    } else {
        header('Location: ../login.php');
    }
?>