<?php

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "amt2017";
$dbName     =  "safalphp";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
