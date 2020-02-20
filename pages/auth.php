<?php
include 'connect.php';
//Start session
session_start();




//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
	header("location: index.php");
	exit();
}

if (!isset($_SESSION['SESS_MEMBER_POSITION']) || (trim($_SESSION['SESS_MEMBER_POSITION']) == '')) {
	header("location: index.php");
	exit();
}

$session_id  = $_SESSION['SESS_MEMBER_ID'];
$session_position = $_SESSION['SESS_MEMBER_POSITION'];

if ($session_position == 'Front Attendant') {
	function createRandomPassword()
	{
		$chars = "003232303232023232023456789";
		srand((float) microtime() * 1000000);
		$i = 0;
		$pass = '';
		while ($i <= 7) {

			$num = rand() % 33;

			$tmp = substr($chars, $num, 1);

			$pass = $pass . $tmp;

			$i++;
		}
		return $pass;
	}
	$finalcode = 'RS-' . createRandomPassword();
	$query = $db->prepare("SELECT * FROM user WHERE id = ?");
	$query->execute(array($session_id));
	$row = $query->fetch();

	$session_attendant_name = $row['name'];
	header("location: attendant/sales.php?id=cash&invoice=$finalcode&category=");
} else if ($session_position == 'Kitchen') {

	$query = $db->prepare("SELECT * FROM user WHERE id = ?");
	$query->execute(array($session_id));
	$row = $query->fetch();

	$session_attendant_name = $row['name'];
	header("location: kitchen/sales.php");
} else if ($session_position == 'Cashier') {

	$query = $db->prepare("SELECT * FROM user WHERE id = ?");
	$query->execute(array($session_id));
	$row = $query->fetch();

	$session_attendant_name = $row['name'];
	header("location: cashier/sales.php?id=cash&invoice=&table_number=&discount=0&cdiscount=0%");
} else {
	$query = $db->prepare("SELECT * FROM user WHERE id = ?");
	$query->execute(array($session_id));
	$row = $query->fetch();

	$session_admin_name = $row['name'];
}
