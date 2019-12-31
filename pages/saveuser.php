<?php
session_start();
include('connect.php');
$a = $_POST['user'];
$b = $_POST['pass'];
$c = $_POST['name'];
$d = $_POST['post'];
if($d == 'Cashier'){
    $sql = "INSERT INTO cashier (username,password,cashier_name,position) VALUES (?,?,?,?)";
} else if($d == 'Kitchen'){
    $sql = "INSERT INTO kitchen (username,password,kitchen_name,position) VALUES (?,?,?,?)";
} else if($d == 'Front Attendant'){
    $sql = "INSERT INTO attendant (username,password,attendant_name,position) VALUES (?,?,?,?)";
} 
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d));
header("location: home.php");
?>