<?php

function emptyInput($name, $email, $password, $confirm_password)
{
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $confirm_password)
{
    if ($password !== $confirm_password) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Check if user exists or not
function emailExists($conn, $email)
{
    $sql = "SELECT *  FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

// Register user
function createUser($conn, $name, $email, $password)
{
    $sql = "INSERT into users(name, email, password) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
    }
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?success=signupsuccess");
}

// Login User
function loginUser($conn, $email, $password)
{
    $user = emailExists($conn, $email);

    if ($user === false) {
        header("location: ../login.php?error=wrongEmailPassword");
        exit();
    }

    $passwordHashed = $user['password'];
    $checkPassword = password_verify($password, $passwordHashed);
    if ($checkPassword === false) {
        header("location: ../login.php?error=wrongEmailPassword");
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION["id"] = $user["id"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["email"] = $user['email'];
        header("location: ../home.php");
    }
}

// Create new blog
function createBlog($conn, $user_id, $title, $description)
{
    $sql = "INSERT INTO blogs(user_id, title, description) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /blogs/create.php?error=stmtfailed");
    }
    mysqli_stmt_bind_param($stmt, "sss", $user_id, $title, $description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../home.php?success=createBlogSuccess");
}

function allBlogs($conn)
{
    $sql = "SELECT *  FROM blogs;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_all($result)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

// Check if user exists or not
function findUserById($conn, $id)
{
    $sql = "SELECT name, email  FROM users WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
    }
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row['name'];
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}
