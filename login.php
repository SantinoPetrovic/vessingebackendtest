<?php  
  
require_once("/home/santino/www/vessinge/PDO.php");

if($user->is_loggedin()!="") {
     /*$user->redirect('home.php');*/
     echo 'already logged in';
}
else {
 
    $username = $_POST['username'];  
    $password = $_POST['password'];  
    $user->login($username, $password);
}
?>


