<?php
class user {
    function __construct($db) {
      $this->db = $db;
    }
	public function login($username, $password) {
        $sql = $this->db->prepare("SELECT * FROM vessinge_user WHERE username = :username");
        $sql->bindValue(':username', $username);
        $sql->execute();
        $results = $sql->fetchAll();
        $hashedPassword = $results[0]['salt'];
        if(crypt($password, $hashedPassword) == $hashedPassword) {
            $_SESSION['userIsLoggedIn'] = $results[0]['id'];

?>
 		<h3>Logga ut</h3> 
        <div class="logoutUser" style="">
            <form action="../php/logout.php" method="post">
                <input type="submit" name="logout" id="logout" value="Logga ut">
            </form>
        </div>
<?php
        }
        else {  
          echo "0"; 

        }  
    }  
	public function is_loggedin() {
	  if(isset($_SESSION['userIsLoggedIn'])) {
	     return true;
	  }
	}

	public function redirect($url) {
	   header("Location: $url");
	}

	public function logout() {
	    session_destroy();
	    unset($_SESSION['userIsLoggedIn']);
	    
	}
	public function adminView() {
        $sql = $this->db->prepare("SELECT * FROM vessinge_error_messages");
        $sql->execute();
        $results = $sql->fetchAll();
?>		
		<html>
		<body>
		<head>
		  <link rel="stylesheet" type="text/css" href="../css/style.css">
		</head>
			<h1>Logga ut</h1> 
	        <div class="logoutUser" style="">
	            <form action="../php/logout.php" method="post">
	                <input type="submit" name="logout" id="logout" value="Logga ut">
	            </form>
	        </div>
			<h1>Felanmälningar</h1>
			<table class="reports">
			    <tr>
			        <th class="reportsCategory">Namn</th>
			        <th class="reportsCategory">E-post</th>
			        <th class="reportsCategory">Adress</th>
			        <th class="reportsCategory">Postnummer</th>
			        <th class="reportsCategory">Filvägen</th>
			        <th class="reportsCategory">Meddelande</th>
			    </tr>
<?php
		        foreach ($results as $result) {
?>					
					<tr>
			        	<td class="reportsContent"><?php echo $result['firstAndLastname'].' '; ?></td>
			        	<td class="reportsContent"><?php echo $result['email'].' '; ?></td>
			        	<td class="reportsContent"><?php echo $result['adress'].' '; ?></td>
			        	<td class="reportsContent"><?php echo $result['postnumber'].' '; ?></td>
			        	<td class="reportsContent"><a href="/<?php echo $result['fileName']; ?>">länk</a></td>
			        	<td class="reportsContent"><?php echo $result['message'].' '; ?></td>
					</tr>
	<?php
		        }
?>		
			</table>
		</body>
		</html>
<?php
	}
}
?>