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
        loadingImage: 'src/loading.gif',
        closeImage: 'src/closelabel.png'
      })
    })
  </script>


</head>

<body style="background-image: url('../coffee-background.jpg');background-size:cover;">

  <?php include('navfixed.php');
  function formatMoney($number, $fractional = false)
  {
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

  ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header" style="color:white">Cashier<span> <img height="50px" width="50px" src="logo.jpg" alt=""></span></h1>
      </div>
      <div class="col-lg-8">
        <div id="maintable">
          <div style="margin-top: -19px; margin-bottom: 21px;">
          </div>
          <form action="getinvoiceid.php" method="get" id="tableForm" name="tableForm" class="form-group">
            <input type="hidden" name="invoice" class="form-control" value="" />
            <label style="color:white">Select a Table Number</label><br />
            <select name="table_number" id="table_number" style="width:500px;" class="chzn-select" required onchange="tableForm.submit()">
              <option><?php
                      if ($_GET['table_number']) {
                        echo $_GET['table_number'];
                      } ?></option>
              <option disabled>====================</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
            </select>
        </div>
      </div>
      </form>
      <div style="margin-top: 150px; "> </div>
      <form action="addDiscount.php" method="get" id="formDiscount" name="formDiscount" class="form-group">
        <input type="hidden" name="invoice" class="form-control" value=<?php echo $_GET['invoice']; ?> />
        <input type="hidden" name="table_number" class="form-control" value=<?php echo $_GET['table_number']; ?> />
        <label style="color:white">Select Discount:</label>
        <select name="discount" id="discount" style="width:90px;margin-top:0px" class="chzn-select" required onchange="formDiscount.submit()">
          <option><?php echo $_GET['cdiscount']; ?></option>
          <option disabled>======</option>
          <option value="0">0%</option>
          <option value="0.10">10%</option>
          <option value="0.20">20%</option>
        </select>
      </form>

      <div class="row" style=>
        <div class="col-lg-4">
          <br />
          <!-- <form action="" method="post"class = "form-group" >
            <input type="submit" class="btn btn-primary" name="viewinfo" value = "View Info" class = "form-control" style="width: 123px;" />
            </form> -->
        </div>
      </div>
      <div class="col-lg-4">
        <!-- <input type="hidden" name="discount" value="0" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              <input type="hidden" name="vat" value="0" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" /> -->
        <!-- <input type="submit" name="addproduct" class="btn btn-primary" value="add product" class = "form-control" style="width: 123px;" /> -->
        <br />
      </div>
      <?php
      if (isset($_GET['invoice']) && isset($_GET['table_number'])) {
        echo '
                  <table width="100%" class="table table-striped table-hover" id="dataTables-example" style="background-color:white; border-radius:10px">
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
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    ';

        include('connect.php');
        $table_number = $_GET['table_number'];
        $id = $_GET['invoice'];
        $result = $db->prepare("SELECT * FROM sales_order WHERE invoice = :invoiceid && order_status = 'served' && order_status != ''");
        $result->bindParam(':invoiceid', $id);
        $result->execute();
        for ($i = 0; $row = $result->fetch(); $i++) {
      ?>
          <tr class="record">
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['dname']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td>
              <?php
              $ppp = $row['price'];
              echo formatMoney($ppp, true);
              ?>
            </td>
            <td>
              <?php
              $ccc = $row['amount'];
              echo formatMoney($ccc, true);
              ?>
            </td>

            <td>
              <?php
              $dfdf = $row['total_amount'];
              echo formatMoney($dfdf, true);
              ?>
            </td>

            <td>
              <a href="#" id="<?php echo $row['transaction_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete">
                <i class="fa fa-trash"></i>
              </a>


              <!-- <a rel="facebox" class="btn btn-primary" href="editorder.php?id=<?php echo $row['transaction_id']; ?>">
                <i class="fa fa-pencil"></i>
              </a> -->

            </td>
          </tr>
        <?php
        }

        ?>
        <tr>
          <td colspan="7"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
          <td colspan="4"><strong style="font-size: 12px; color: #222222;">
            <?php

            $sdsd = $_GET['invoice'];
            $resultas = $db->prepare("SELECT sum(total_amount) FROM sales_order WHERE invoice= :a && order_status = 'served' && order_status != 'paid' && order_status != ''");
            $resultas->bindParam(':a', $sdsd);
            $resultas->execute();
            for ($i = 0; $rowas = $resultas->fetch(); $i++) {
              $fgfg = $rowas['sum(total_amount)'];
              $discountAmount = $_GET['discount'];
              $totalDiscount = $fgfg - ($fgfg * $discountAmount);
              echo formatMoney($totalDiscount, true);
            }
          }   ?>
            </strong></td>
        </tr>

        </tbody>
        </table><br>
        <a rel="facebox" class="btn btn-primary" href="checkout.php?discount=<?php echo $_GET['discount']; ?>&totalD=<?php echo $totalDiscount; ?>&pt=cash&invoice=<?php echo $_GET['invoice'] ?>&total=<?php echo $fgfg ?>&cashier=<?php echo $session_cashier_name ?>&p_amount=<?php echo $ccc ?>">Check Out</a>

        <div class="clearfix"></div>
    </div>

  </div>

  <!-- /#page-wrapper -->
  <script src="js/jquery.js"></script>
  <script type="text/javascript">
    $(function() {
      $(".delbutton").click(function() {

        //Save the link in a variable called element
        var element = $(this);

        //Find the id of the link that was clicked
        var del_id = element.attr("id");

        //Built a url to send
        var info = 'id=' + del_id;
        if (confirm("Sure you want to delete this update? There is NO undo!")) {
          $.ajax({
            type: "GET",
            url: "deleteorder.php",
            data: info,
            success: function() {
              document.location.href = 'sales.php?invoice=<?php $_GET['invoice'] ?>&discount=<?php $_GET['discount'] ?>&table_number=<?php $_GET['table_number'] ?>&cdiscount=<?php $_GET['cdiscount'] ?>';
            }
          });
          // $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
          // .animate({ opacity: "hide" }, "slow");

        }

        return false;

      });

    });
  </script>


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
