<?php 
include('connect.php');
$t_id=$_GET['t_id'];
$orderStatus = 'served';

// query
$sql = "UPDATE sales_order 
        SET order_status=?
	WHERE transaction_id=?";
$q = $db->prepare($sql);
$q->execute(array($orderStatus,$t_id));
header("location: sales.php");
die();
?>
