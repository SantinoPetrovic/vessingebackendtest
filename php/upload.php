<?php
require_once("/home/santino/www/vessinge/pdo/PDO.php");
$flName = $_POST['flname'];
$email = $_POST['email'];
$adress = $_POST['adress'];
$postnumber = $_POST['postnumber'];
$commentarea = $_POST['commentArea'];
$everythingIsOk = true;
$file = "";
if (empty($flName) || empty($email) || empty($commentarea)) {
	echo "Please consider to give your name, mail and message in the form.";
	$everythingIsOk = false;
}

if (!empty($_FILES['fileUpload']['name'])) {

	$uploadedFiles = '/home/santino/www/vessinge/uploadedFiles/';
	$uploadedFilesDbName = 'uploadedFiles/';
	$file = $uploadedFiles . basename($_FILES['fileUpload']['name']);
	$fileName = $uploadedFilesDbName . basename($_FILES['fileUpload']['name']);
	define('MB', 1048576);

	if (file_exists($file)) {
		echo "Sorry, file already exists.";
		$everythingIsOk = false;
	}
	// Check file if it's larger than 5mb.
	if ($_FILES['fileUpload']['size'] > 5 * MB) {
		echo "Sorry, your file is bigger than 5 MB. Please choose another file.";
		$everythingIsOk = false;
	}
	
/*	if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $file)) {
	    echo "The file ".$_FILES['fileUpload']['name']." has been uploaded.";
	} else {
	    echo $_FILES['fileUpload']['error']." Sorry, there was an error uploading your file.";
	    $everythingIsOk = false;
	}*/
	move_uploaded_file($_FILES['fileUpload']['tmp_name'], $file);
}

if ($everythingIsOk === true) {
        $sql = $db->prepare("INSERT INTO vessinge_error_messages (firstAndLastname, email, adress, postnumber, fileName, message)
        VALUES (:firstAndLastname, :email, :adress, :postnumber, :fileName, :message)");
        $sql->execute(array(
            'firstAndLastname'=>$flName,
            'email'=>$email,
            'adress'=>$adress,
            'postnumber'=>$postnumber,
            'fileName'=>$fileName,
            'message'=>$commentarea
        ));
        echo "You have sent your message!";
}
else {
	echo "Your form failed.";
}
?>