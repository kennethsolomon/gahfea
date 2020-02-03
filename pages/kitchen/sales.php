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
  <meta http-equiv="refresh" content="6; URL=http://localhost/gahfea/pages/kitchen/sales.php">
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

<body style="background-image: url('coffee-background.jpg');">

  <?php include('navfixed.php'); ?>
  <div class="container">
    <div class="col-lg-12">
      <center>
        <h1 class="page-header">Pending Orders</h1>
      </center>
    </div>


    <div class="row" style="background-color:white;">
      <!-- 1st ROW -->
      <div class="col-lg-6">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th> Table 1 </th>
              <th> Orders </th>
              <th> Quantity </th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $id = 'RS-30325022';
            include('connect.php');
            $result = $db->prepare("SELECT * FROM sales_order WHERE table_number = '1' AND order_status = 'pending'");
            $result->bindParam(':userid', $id);
            $result->execute();
            for ($i = 0; $row = $result->fetch(); $i++) {
            ?>
              <tr class="record">
                <td></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td>
                  <div class="col-lg-12">
                    <a onClick="javascript: return confirm('Serve order?');" class="btn btn-success" href="getinvoiceid.php?t_id=<?php echo $row['transaction_id']; ?>">Done</a>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-lg-6">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th> Table 2 </th>
              <th> Orders </th>
              <th> Quantity </th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $id = 'RS-30325022';
            include('connect.php');
            $result = $db->prepare("SELECT * FROM sales_order WHERE table_number = '2' AND order_status = 'pending'");
            $result->bindParam(':userid', $id);
            $result->execute();
            for ($i = 0; $row = $result->fetch(); $i++) {
            ?>
              <tr class="record">
                <td></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td>
                  <div class="col-lg-12">
                    <a onClick="javascript: return confirm('Serve order?');" class="btn btn-success" href="getinvoiceid.php?t_id=<?php echo $row['transaction_id']; ?>">Done</a>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row" style="background-color:white;">
      <div class="col-lg-6">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th> Table 3 </th>
              <th> Orders </th>
              <th> Quantity </th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $id = 'RS-30325022';
            include('connect.php');
            $result = $db->prepare("SELECT * FROM sales_order WHERE table_number = '3' AND order_status = 'pending'");
            $result->bindParam(':userid', $id);
            $result->execute();
            for ($i = 0; $row = $result->fetch(); $i++) {
            ?>
              <tr class="record">
                <td></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td>
                  <div class="col-lg-12">
                    <a onClick="javascript: return confirm('Serve order?');" class="btn btn-success" href="getinvoiceid.php?t_id=<?php echo $row['transaction_id']; ?>">Done</a>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- 2nd ROW -->
      <div class="col-lg-6">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th> Table 4 </th>
              <th> Orders </th>
              <th> Quantity </th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $id = 'RS-30325022';
            include('connect.php');
            $result = $db->prepare("SELECT * FROM sales_order WHERE table_number = '4' AND order_status = 'pending'");
            $result->bindParam(':userid', $id);
            $result->execute();
            for ($i = 0; $row = $result->fetch(); $i++) {
            ?>
              <tr class="record">
                <td></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td>
                  <div class="col-lg-12">
                    <a onClick="javascript: return confirm('Serve order?');" class="btn btn-success" href="getinvoiceid.php?t_id=<?php echo $row['transaction_id']; ?>">Done</a>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th> Table 5 </th>
                <th> Orders </th>
                <th> Quantity </th>
                <th> Status </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = 'RS-30325022';
              include('connect.php');
              $result = $db->prepare("SELECT * FROM sales_order WHERE table_number = '5' AND order_status = 'pending'");
              $result->bindParam(':userid', $id);
              $result->execute();
              for ($i = 0; $row = $result->fetch(); $i++) {
              ?>
                <tr class="record">
                  <td></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['qty']; ?></td>
                  <td>
                    <div class="col-lg-2">
                      <a onClick="javascript: return confirm('Serve order?');" class="btn btn-success" href="getinvoiceid.php?t_id=<?php echo $row['transaction_id']; ?>">Done</a>
                    </div>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-lg-6">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th> Table 6 </th>
                <th> Orders </th>
                <th> Quantity </th>
                <th> Status </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = 'RS-30325022';
              include('connect.php');
              $result = $db->prepare("SELECT * FROM sales_order WHERE table_number = '6' AND order_status = 'pending'");
              $result->bindParam(':userid', $id);
              $result->execute();
              for ($i = 0; $row = $result->fetch(); $i++) {
              ?>
                <tr class="record">
                  <td></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['qty']; ?></td>
                  <td>
                    <div class="col-lg-2">
                      <a onClick="javascript: return confirm('Serve order?');" class="btn btn-success" href="getinvoiceid.php?t_id=<?php echo $row['transaction_id']; ?>">Done</a>
                    </div>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>


  <script src="js/jquery.js"></script>

  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>

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