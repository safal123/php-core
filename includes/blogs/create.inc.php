<?php
session_start();

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    if (empty($title) || empty($description)) {
        header("location: ../../blogs/create.php?error=missingField");
        exit();
    }
    require_once '../dbh.inc.php';
    require_once '../functions.inc.php';
    $user_id = $_SESSION["id"];
    createBlog($conn, $user_id, $title, $description);
} else {
    header("location: ../../login.php");
}
