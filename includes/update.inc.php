<?php
session_start();

require '../vendor/autoload.php';

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $id = $_GET["id"];
    $file = $_FILES["blog_image"];
    if (empty($title) || empty($description)) {
        header("location: ../../blogs/edit.php?id={$id}");
        exit();
    }
    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';
    $path = "blogs";
    // var_dump(file_exists($file["tmp_name"]));
    $user_id = $_SESSION["id"];
    if (file_exists($file["tmp_name"])) {
        flash()->error($fileStatus = uploadFile($path, $file)[0]);
        var_dump($fileStatus);
        // if ($fileStatus === true) {
        //     $target_dir = "public/{$path}/";
        //     $target_file = $target_dir . basename($file["name"]);
        // } else {
        //     $target_file = null;
        //     header("location: ../blogs/edit.php?id={$id}");
        //     exit();
        // }
    }
    // updateBlog($conn, $id, $title, $description, $target_file);
    // exit();
} else {
    header("location: ../home.php");
    exit();
}
