<?php
session_start();
header('Content-type: text/html; charset=utf-8');
$dsn = 'mysql:dbname=vessinge;host=localhost;port=3306';
$servername = "vessinge.santinopetrovic.com";
$username = USERNAME;
$password = PASSWORD;
$dbname = "vessinge";

try {
    $db = new PDO($dsn, $username, $password, array (
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}
include_once 'classUser.php';
$user = new user($db);
?>