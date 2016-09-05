<?php

require_once("/home/santino/www/vessinge/PDO.php");

if (isset($_POST['logout'])) {  
	$user->logout();
	$user->redirect('index.php');
}
?>