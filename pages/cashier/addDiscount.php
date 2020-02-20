<?php
include('connect.php');
$invoice = $_GET['invoice'];
$table_number = $_GET['table_number'];
$discount = $_GET['discount'];


if ($discount == "0.10") {
    header("location: sales.php?invoice=$invoice&discount=$discount&cdiscount=10%&table_number=$table_number");
} else if ($discount == "0.20") {
    header("location: sales.php?invoice=$invoice&discount=$discount&cdiscount=20%&table_number=$table_number");
} else if ($discount == "0") {
    header("location: sales.php?invoice=$invoice&discount=$discount&cdiscount=0%&table_number=$table_number");
}
