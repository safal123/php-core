<?php
session_start();
if (isset($_POST["submit"])) {
    $id = $_GET["id"];
    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';
    deleteBlog($conn, $id);
} else {
    header("location: ../home.php");
    exit();
}
