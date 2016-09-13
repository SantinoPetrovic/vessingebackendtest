<?php
require_once("/home/santino/www/vessinge/pdo/PDO.php");

$username = 'admin';
$password = 'vessingeadmin';
$salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
$hashed_password = crypt($password, $salt);
$query = $db->prepare("INSERT INTO vessinge_user (username, isAdmin, salt) VALUES (:username, 1, :salt)");           
$query->execute(array(
    'username'=>$username,
    'salt'=>$hashed_password
));
?>