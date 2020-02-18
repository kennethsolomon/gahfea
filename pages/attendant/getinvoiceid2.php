<?php
include('connect.php');
if (isset($_POST['select_cat'])) {
        $category = $_GET['category'];
        $invoice = $_GET['invoice'];
        header("location: sales.php?invoice=$invoice&category=$category");
        die();
}
