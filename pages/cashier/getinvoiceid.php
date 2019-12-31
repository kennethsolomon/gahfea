<?php 
include('connect.php');
$table_number=$_GET['table_number'];
    $result = $db->prepare("SELECT * FROM sales_order WHERE table_number = $table_number");
    $result->execute();
        for($i=0; $row = $result->fetch(); $i++){
            $invoiceID = $row['invoice'];
                header("location: sales.php?invoice=$invoiceID&table_number=$table_number");
        }
?>
