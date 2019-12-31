<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
        $invoice=$row['invoice'];
        $result = $db->prepare("DELETE FROM sales_order WHERE invoice= :invoiceid");
        $result->bindParam(':invoiceid', $invoice);
        $result->execute();
      }
    //   include('connect.php');
    //   $id=$_GET['id'];
    //   $result = $db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
    //   $result->bindParam(':memid', $id);
    //   $result->execute();
     
?>