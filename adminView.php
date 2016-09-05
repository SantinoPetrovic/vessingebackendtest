<?php

require_once("/home/santino/www/vessinge/PDO.php");

if($user->is_loggedin()!="") {
	$user->adminView();
}
else {
?>
<script>
alert('Du är inte inloggad.');
window.location.href='index.php';
</script>
<?php
}

?>