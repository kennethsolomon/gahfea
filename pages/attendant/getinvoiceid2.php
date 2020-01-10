<?php 
include('connect.php');
$category=$_GET['category'];
$invoice=$_GET['invoice'];
        header("location: sales.php?invoice=$invoice&category=$category");
        die();
?>
