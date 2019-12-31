<?php
session_start();
include('connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['qty'];
$w = $_POST['pt'];
$r = $_POST['vat'];
$date = date('m/d/Y');
$month = date('F');
$year = date('Y');
$table_number = $_POST['table_number'];
$order_list = $_POST['order_list'];

$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['price'];
$name=$row['product_name'];
$dname=$row['description_name'];
$categ=$row['category'];
$qtyleft=$row['qty_left'];
}

if(empty($order_list)){
    //edit qty
    $sql = "UPDATE products 
    SET qty_left=qty_left-?
    WHERE product_code=?";
    $q = $db->prepare($sql);
    $q->execute(array($c,$b));
    $fffffff=$asasa-$discount;
    $d=$fffffff*$c;
    $z=$qtyleft-$c;
    $vat=$d*$r;
    $total=$vat+$d;
    // query
    $sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,discount,category,date,omonth,oyear,qtyleft,dname,vat,total_amount,table_number,order_status) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,'pending')";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':g'=>$discount,':h'=>$categ,':i'=>$date,':j'=>$month,':k'=>$year,':l'=>$z,':m'=>$dname,':n'=>$vat,':o'=>$total,':p'=>$table_number));
    header("location: sales.php?id=$w&invoice=$a");
    // header("location: sales.php?invoice=$finalcode");
} else if(!empty($order_list)) {
    //edit qty
    $sql = "UPDATE products 
    SET qty_left=qty_left-?
    WHERE product_code=?";
    $q = $db->prepare($sql);
    $q->execute(array($c,$b));
    $fffffff=$asasa-$discount;
    $d=$fffffff*$c;
    $z=$qtyleft-$c;
    $vat=$d*$r;
    $total=$vat+$d;
    // query
    $sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,discount,category,date,omonth,oyear,qtyleft,dname,vat,total_amount,table_number,order_status) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,'pending')";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>strchr($order_list, "RS"),':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':g'=>$discount,':h'=>$categ,':i'=>$date,':j'=>$month,':k'=>$year,':l'=>$z,':m'=>$dname,':n'=>$vat,':o'=>$total,':p'=>$table_number));
    header("location: sales.php?id=$w&invoice=$a");
}




?>