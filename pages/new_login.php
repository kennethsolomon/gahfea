<?php 
	include ('connect.php');

	$a = $_POST['username'];
	$b = $_POST['password'];
	$admin = "ADMIN";
	$fattendant = "Front Attendant";
	$kitchen = "Kitchen";
	$cashier = "Cashier";

	$sql = "SELECT * FROM user WHERE username = ? AND password = ? AND (position = ? || position = ? || position = ? || position = ?)";
	$query = $db->prepare($sql);
	$query->execute(array($a, $b, $admin, $fattendant, $kitchen, $cashier));
	$row = $query->fetch();

	if ($query->rowCount() > 0){
		session_start();
		$_SESSION['SESS_MEMBER_ID'] = $row['id'];
		$_SESSION['SESS_MEMBER_POSITION'] = $row['position'];
		echo 1;
	}else{
		echo 0;
	}


?>
