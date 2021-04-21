<?php
session_start();
var_dump($_POST);

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $id = $_GET["id"];
    if (empty($title) || empty($description)) {
        header("location: ../../blogs/edit.php?id={$id}");
        exit();
    }
    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';
    $user_id = $_SESSION["id"];
    $updated_at = time();
    updateBlog($conn, $id, $title, $description);
} else {
    header("location: ../home.php");
    exit();
}
