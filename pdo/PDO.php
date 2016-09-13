<?php
session_start();
header('Content-type: text/html; charset=utf-8');
$dsn = 'mysql:dbname=vessinge;host=localhost;port=3306';
$servername = "vessinge.santinopetrovic.com";
$username = "root";
$password = "188830aaa";
$dbname = "vessinge";
define('MY_DOC_ROOT', '/home/santino/www/vessinge/');
try {
    $db = new PDO($dsn, $username, $password, array (
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}
include_once MY_DOC_ROOT.'class/classUser.php';
$user = new user($db);
?>