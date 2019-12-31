<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['total_amount'];
// $c = $_POST['contact'];
// $d = $_POST['memno'];
// query
$sql = "UPDATE sales_order 
        SET name=?, total_amount=?
		WHERE transaction_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$id));
header("location: sales.php");

?>