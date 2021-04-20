<?php

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        header("location: ../login.php?error=invalidInput");
        exit();
    }
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    loginUser($conn, $email, $password);
} else {
    header("location: ../login.php");
    exit();
}
