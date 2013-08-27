<?php
include '../connect.inc.php';
$db = new PDO("mysql:host=$MySQLhost;dbname=$MySQLdbname;charset=utf8", 
			$MySQLuser, 
			$MySQLpass);
if(isset($_POST['name'])&&isset($_POST['college'])&&isset($_POST['city'])&&isset($_POST['mail'])){
	$name = $_POST['name'];
	$college = $_POST['college'];
	$city = $_POST['city'];
	$mail = $_POST['mail'];
	if($name&&$mail&&$college&&$city){
		if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
			$query = $db->prepare("INSERT INTO users(name, college, city, email) VALUES (?, ?, ?, ?)");
			$query->execute(array($name, $college, $city, $mail));
			echo "Registration Successful.";
		} else {
			echo "Invalid Email.";
		}
	} else {
		echo "All details are neccessary.";
	}
}
?>