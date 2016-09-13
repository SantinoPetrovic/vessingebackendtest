<?php

require_once("/home/santino/www/vessinge/pdo/PDO.php");

if($user->is_loggedin()!="") {
	$user->adminView();
}
else {
?>
<script>
alert('Du är inte inloggad.');
location.replace("http://vessinge.santinopetrovic.com/");
</script>
<?php
}

?>