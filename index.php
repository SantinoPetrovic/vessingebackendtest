<?php
require_once("/home/santino/www/vessinge/PDO.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="requests.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="uploadMessage" style="">
  <h1>Rapportera här</h1> 
  <form method="post" enctype='multipart/form-data'>
      <input type="text" name="flname" id="flname" class="inputField" placeholder="För & efternamn:">
      <input type="email" name="email" id="email" class="inputField" placeholder="E-mail:">
      <input type="text" name="adress" id="adress" class="inputField" placeholder="Adress:">
      <input type="number" name="postnumber" id="postnumber" class="inputField" placeholder="ZIP code:">
      Ladda upp fil: 
      <input type="file" name="fileUpload" id="fileUpload" class="inputField">
      <textarea name="commentArea" id="commentArea" rows="4" cols="30" placeholder="Skriv text här..." maxlength="500" class="inputField"></textarea>
      <input type="button" name="upload" id="upload" class="inputField" value="Skicka Felanmälning">
  </form>
</div>
<?php if(!$_SESSION['userIsLoggedIn']): ?>
<div class="loginUser" style="">
  <h1>Logga in</h1>
    <form method="post">
        <input type="text" name="username" id="username" class="inputField" placeholder="användarnamn">
        <input type="password" name="password" id="password" class="inputField" placeholder="lösenord">
        <input type="button" name="login" id="login" class="inputField" value="Logga in">
    </form>
</div>
<?php else: ?>
<h3>Logga ut</h3> 
<div class="logoutUser">
    <form action="logout.php" method="post">
        <input type="submit" name="logout" id="logout" value="Logga ut">
    </form>
</div>
<?php endif; ?>

</body>
</html>