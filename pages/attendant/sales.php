<?php
?>
<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GAHFEA</title>
  
  <link rel="shortcut icon" href="logo.jpg">
  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="lib/jquery.js" type="text/javascript"></script>
        <script src="src/facebox.js" type="text/javascript"></script>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
              loadingImage : 'src/loading.gif',
              closeImage   : 'src/closelabel.png'
            })
          })
        </script>


      </head>

      <body>
            
        <?php include('navfixed.php');?>

        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Front Attendant</h1>
            </div>
            <div id="maintable">
            <div style="margin-top: -19px; margin-bottom: 21px;">
              <form action="getinvoiceid2.php" method="get" id="tableForm" name="tableForm" class = "form-group" >
                <input type="hidden" name="invoice" class = "form-control" value="<?php echo $_GET['invoice']; ?>" />
                <label>Select a Category</label><br />
                  <select name="category" id="table_number" style="width:300px;" class="chzn-select"required onchange="tableForm.submit()" >
                    <option></option>
                    <option>All Day Rice Meal</option>
                    <option>Appetizer</option>
                    <option>Bundle Meal</option>
                    <option>Hot Drinks</option>
                    <option>Pasta</option>
                    <option>Smoothie</option>
                  </select>
                  <br />
                </div>
                </div>
              </form>
            <form action="incoming.php" method="post" class = "form-group" >
              <input type="hidden" name="pt" class = "form-control" value="<?php echo $_GET['id']; ?>" />
              <input type="hidden" name="invoice" class = "form-control" value="<?php echo $_GET['invoice']; ?>" />
              <div class="col-lg-4">
                <label>Select a Product</label><br />
                <select  name="product"  id="product"  class="chzn-select" style="width: 280px;" required> 
                  <option></option>
                  <?php
                  include('connect.php');
                  $category = $_GET['category'];
                  $result = $db->prepare("SELECT * FROM products WHERE category = '$category  '");
                  $result->bindParam(':userid', $res);
                  $result->execute();
                  for($i=0; $row = $result->fetch(); $i++){
                    ?>
                    <option value="<?php echo $row['product_code'];?>" 
                      <?php
                      if($row['qty_left'] == 0)
                      {
                        echo'disabled';
                      }
                      ?>
                      >
                      <!-- <?php echo $row['product_code']; ?>- -->
                       <?php echo $row['product_name']; ?>
                      <!-- - <?php echo $row['description_name']; ?> -->
                      - <?php echo $row['qty_left']; ?>

                    </option>
                  } 
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col-lg-2">
              <label>Table Number:</label>
              <input  type="number" name="table_number" class = "form-control" required />
              </div>
              <div class="col-lg-2">
                <label>Quantity</label>
                <input type="number" name="qty" value="1" min = "1" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
                <!-- <label>Discount</label> -->
                <input type="hidden" name="discount" value="0" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
                <!-- <label>Value Add Tax:</label> --><br>
                <input type="hidden" name="vat" value="0" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              </div>
              <div class="col-lg-2">
               <label>List of Orders:</label>
              <select name="order_list"  id="order_list" class = "form-control" >
                <option></option>
                <?php
                    include('connect.php');
                    $result = $db->prepare("SELECT * FROM sales_order WHERE order_status = 'pending' ORDER BY invoice ");
                    $result->bindParam(':userid', $res);
                    $result->execute();
                    for($i=0; $row = $result->fetch(); $i++){
                      ?>
                      <option name="invoice_number" id="invoice_number" value="<?php echo $row['invoice'];?>" 
                        <?php
                        if($row['qty'] == 0)
                        {
                          echo'disabled';
                        }
                        ?>
                        >
                        <?php echo '';?>
                          <?php echo 'Table'.$row['table_number']; ?>
                         - <?php echo $row['invoice']; ?>
                      </option>
                    } 
                      <?php
                    }
                    ?>
                  </select>
                  </div>
              <div class="col-lg-2">
              <br>
                <input type="submit" class="btn btn-primary" value="Add Order" class = "form-control" style="width: 123px;margin-top:5px" />
              </div>
            </form>
            
            <div class="col-lg-12">
            <table style="margin-top:10px" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th> Name </th>
                  <th> Description Name </th>
                  <th> Category </th>
                  <th> Quantity </th>
                  <th> Price </th>
                  <!-- <th> Discount </th>
                  <th> VAT </th> -->
                  <th> Amount </th>
                  <th> Total Amount </th>
                  <th> Delete </th>
                </tr>
              </thead>
              <tbody>

                <?php
                $id=$_GET['invoice'];
                include('connect.php');
                $result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
                $result->bindParam(':userid', $id);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
                  ?>
                  <tr class="record">
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['dname']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td>
                      <?php
                      $ppp=$row['price'];
                      echo formatMoney($ppp, true);
                      ?>
                    </td>
                    <!-- <td>
                      <?php
                      // $ddd=$row['discount'];
                      // echo formatMoney($ddd, true);
                      ?>
                    </td> -->
                    <!-- <td> -->
                      <?php
                      // $fff=$row['vat'];
                      // echo formatMoney($fff, true);
                      ?>
                    <!-- </td> -->
                    <td>
                      <?php
                      $ccc=$row['amount'];
                      echo formatMoney($ccc, true);
                      ?>
                    </td>

                    <td>
                      <?php
                      $dfdf=$row['total_amount'];
                      echo formatMoney($dfdf, true);
                      ?>
                    </td>
                    
                    <td><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"> Delete</a></td>
                  </tr>
                  <?php
                }
                ?>
                <tr>
                  <td colspan="7"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
                  <td colspan="4"><strong style="font-size: 12px; color: #222222;">
                    <?php
                    function formatMoney($number, $fractional=false) {
                      if ($fractional) {
                        $number = sprintf('%.2f', $number);
                      }
                      while (true) {
                        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                        if ($replaced != $number) {
                          $number = $replaced;
                        } else {
                          break;
                        }
                      }
                      return $number;
                    }
                    $sdsd=$_GET['invoice'];
                    $resultas = $db->prepare("SELECT sum(total_amount) FROM sales_order WHERE invoice= :a");
                    $resultas->bindParam(':a', $sdsd);
                    $resultas->execute();
                    for($i=0; $rowas = $resultas->fetch(); $i++){
                      $fgfg=$rowas['sum(total_amount)'];
                      echo formatMoney($fgfg, true);
                    }
                    ?>
                  </strong></td>
                </tr>

              </tbody>
            </table>
            </div>
            <!-- <a rel="facebox" class = "btn btn-primary" href="checkout.php?invoice=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&cashier=<?php echo $session_cashier_name?>&p_amount=<?php echo $ccc?>">Check Out</a> -->
            
            <div class="clearfix"></div>
          </div>

        </div>
      </div>
      <!-- /#page-wrapper -->
      <div class="container">
      <form action="" method="post" class = "form-group" >
        <div class="col-lg-10">
           
                <input name="list_order_button" type="submit" style="margin-bottom:10px" class="btn btn-primary" value="Order Pending List" class = "form-control" />
              </div>
           
                  <!-- Database List of Orders -->
                  <table style="margin-top:10px" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th> Table Number </th>
                  <th> Invoice Number </th>
                  <th> Brand Name </th>
                  <th> Description Name </th>
                  <th> Category </th>
                  <th> Quantity </th>
                  <th> Price </th>
                  <!-- <th> Discount </th>
                  <th> VAT </th> -->
                  <th> Amount </th>
                  <th> Total Amount </th>
                  <th> Delete </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($_POST["list_order_button"])){
                // $invoice_number = $_POST['invoice_number'];
                $result = $db->prepare("SELECT * FROM sales_order where order_status = 'pending' ORDER BY invoice ");
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
                  ?>
                  <tr class="record">
                    <td><?php echo $row['table_number']; ?></td>
                    <td><?php echo $row['invoice']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['dname']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td>
                      <?php
                      $ppp=$row['price'];
                      echo formatMoney($ppp, true);
                      ?>
                    </td>
                    <!-- <td>
                      <?php
                      // $ddd=$row['discount'];
                      // echo formatMoney($ddd, true);
                      ?>
                    </td> -->
                    <!-- <td> -->
                      <?php
                      // $fff=$row['vat'];
                      // echo formatMoney($fff, true);
                      ?>
                   
                    <td>
                      <?php
                      $ccc=$row['amount'];
                      echo formatMoney($ccc, true);
                      ?>
                    </td>

                    <td>
                      <?php
                      $dfdf=$row['total_amount'];
                      echo formatMoney($dfdf, true);
                      ?>
                    </td>
                    
                    <td><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $row['invoice']; ?>&dle=<?php echo 'cash'; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"> Delete</a></td>
                  </tr>
                  <?php
                }
              }
                ?>
                </tbody>
                </table>
                </form>
   
        <div class="col-lg-2">
         <a onClick="javascript: return confirm('Proceed to Next Customer?');" class = "btn btn-success" href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Next Customer</a>
        </div> 
      <!-- jQuery -->
      <script src="vendor/jquery/jquery.min.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

      <!-- Metis Menu Plugin JavaScript -->
      <script src="vendor/metisMenu/metisMenu.min.js"></script>

      <!-- Custom Theme JavaScript -->
      <script src="dist/js/sb-admin-2.js"></script>

      <link href="vendor/chosen.min.css" rel="stylesheet" media="screen">
      <script src="vendor/chosen.jquery.min.js"></script>
      <script>
        $(function() {
          $(".chzn-select").chosen();

        });
      </script>

    </body>

    </html>
