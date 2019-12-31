<?php
session_start();
include('connect.php');
$a = date("m/d/Y");
$b = $_POST['name'];
$c = $_POST['invoice'];
$d = $_POST['tot'];
$e = $_POST['amount'];
$f = $_POST['remarks'];


$results = $db->prepare("SELECT sum(amount) FROM collection WHERE name= :a");
$results->bindParam(':a', $b);
$results->execute();
for($i=0; $rows = $results->fetch(); $i++){
$sdsdd=$rows['sum(amount)'];
if($sdsdd==''){
$dsdsd=0;
}
if($sdsdd!=''){
$dsdsd=$rows['sum(amount)'];
}
}				
$b1=$d-$dsdsd;
$balance=$b1-$e;
$cmonth = date('F');
$cyear = date('Y');

$sql = "INSERT INTO collection (date,name,invoice,amount,remarks,balance,cmonth,cyear) VALUES (:k,:l,:m,:n,:o,:p,:cm,:cy)";
$q = $db->prepare($sql);
$q->execute(array(':k'=>$a,':l'=>$b,':m'=>$c,':n'=>$e,':o'=>$f,':p'=>$balance,':cm'=>$cmonth,':cy'=>$cyear));

$sqla = "UPDATE sales 
        SET balance=?, amount=amount+?, due_date = ?, date = ?
		WHERE invoice_number=?";
$qa = $db->prepare($sqla);
$qa->execute(array($balance,$e,$f,$a,$b));


header("location: customer_ledger.php.?cname=$b");

?>