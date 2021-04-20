<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInput($name, $email, $password, $confirm_password) !== false) {
        header("location: ../register.php?error=emptyInput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidEmail");
        exit();
    }

    if (pwdMatch($password, $confirm_password) !== false) {
        header("location: ../register.php?error=passwordMisMatch");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../register.php?error=emailTaken");
        exit();
    }

    createUser($conn, $name, $email, $password);
} else {
    header("location: ../index.php");
}
