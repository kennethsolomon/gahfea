<?php
require_once('auth.php');
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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet" type="text/css" media="print" href="print.css" />

    <link rel="stylesheet" type="text/css" href="tcal.css" />
    
    <script type="text/javascript" src="tcal.js"></script>

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

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <img src="gahfea.png" alt="Smiley face" height="70" width="1050" style="text-align:right; margin-top:10px">
                    <h1 class="page-header"> Accounts Receivables Report</h1>
                </div>
            </div>

            <!-- Search -->
                <label style="font-size:20px; margin-right: 2px">Search </label>
                <form method="post" action="">
                      <label>
                      <select name = "dmonth" class="form-control input-sm">
                        <option value=""></option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                        
                      </select>
                      </label>
                    <label><input name="dyear" id="dyear" type="number" class="form-control input-sm" placeholder="" aria-controls="dataTables-example" style="width: 100px;"></label>
                   <!-- <label><input type="button" value="Search" class="form-control" placeholder="" aria-controls="dataTables-example"></label> -->
                   <label><button class="form-control"  name="submitdate" >Submit</button></label>
                   <label style="margin-left:495px">
                   <input style="width: 100px; "name="dailydate" id="dailydate" class="datepicker" placeholder="mm/dd/yyyy" data-date-format="mm/dd/yyyy">
                   <!-- <input id="dailydate" name="dailydate" type="text" placeholder="Due Date" style="width: 150px; margin-bottom: 15px; margin-left: 170px"  /> -->
                   </label>
                   <label><button class="form-control"  name="accountduedate" >Daily Reports</button></label>
                    </div>
                </form>

            <div id="maintable">
                <div style="margin-top: -19px; margin-bottom: 21px;">
                </div>
                    <table border="1" cellpadding="5" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th > Transaction ID </th>
                                <th > Date </th>
                                <th > Customer Name </th>
                                <th > Invoice Number </th>
                                <th > Overall Balance </th>
                                <th > Due Date </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if(isset($_POST["submitdate"]))
                            {
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
                            include('connect.php');
                            $dmonth=$_POST["dmonth"];
                            $dyear=$_POST["dyear"];
                            $c='credit';
                            $d='paid';
                            echo'<center><p style="font-size:32px;">';
                            echo $dmonth.' '.$dyear;
                            echo'</p></center>';
                            if(!empty($dmonth) && !empty($dyear) && !empty($dyear)){
                            $result = $db->prepare("SELECT * FROM sales WHERE type=:c AND due_date!= :d AND month = '$dmonth' && year = '$dyear'");
                            } else if (!empty($dmonth)){
                            $result = $db->prepare("SELECT * FROM sales WHERE type=:c AND due_date!= :d AND month = '$dmonth'");  
                            } else if (!empty($dyear)){
                            $result = $db->prepare("SELECT * FROM sales WHERE type=:c AND due_date!= :d AND year = '$dyear'");      
                            } else if (empty($dmonth) && empty($dyear)){
                            $result = $db->prepare("SELECT * FROM sales WHERE type=:c AND due_date!= :d"); 
                            } else {
                                $result = $db->prepare("SELECT * FROM sales WHERE type=:c AND due_date!= :d "); 
                            }
                            $result->bindParam(':c', $c);
                            $result->bindParam(':d', $d);
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td>STI-000<?php echo $row['transaction_id']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['invoice_number']; ?></td>
                                    <td><?php
                                        $dsdsd=$row['balance'];
                                        echo formatMoney($dsdsd, true);
                                        ?></td>
                                        <td><?php echo $row['due_date']; ?></td>
                                    </tr>
                                    <?php
                                }}


                                if(isset($_POST["accountduedate"]))
                                {
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
                                include('connect.php');
                                $dyear=$_POST["dyear"];
                                $dailydate = $_POST['dailydate'];
                                $cdate = str_replace("-", "/", $dailydate);
                                $c='credit';
                                $d='paid';
                                echo'<center><p style="font-size:32px;">';
                                echo $dailydate;
                                echo'</p></center>';
                                if(!empty($dailydate)){
                                $result = $db->prepare("SELECT * FROM sales WHERE type=:c AND due_date!= :d AND date = '$dailydate'");
                                $result->bindParam(':c', $c);
                                $result->bindParam(':d', $d);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <tr class="record">
                                        <td>STI-000<?php echo $row['transaction_id']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['invoice_number']; ?></td>
                                        <td><?php
                                            $dsdsd=$row['balance'];
                                            echo formatMoney($dsdsd, true);
                                            ?></td>
                                            <td><?php echo $row['due_date']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    }
                                }
                                ?>

                            </tbody>

                            <!-- TOTAL -->
                            <thead>
                                <tr>
                                    <th colspan="4" style="border-top:1px solid #999999"> Total </th>
                                    <th colspan="3" style="border-top:1px solid #999999"> 
                                        <?php
                                        if(isset($_POST["submitdate"]))
                                        {
                                            $c='credit';
                                            if(!empty($dmonth) && !empty($dyear)){
                                                $results = $db->prepare("SELECT sum(balance) FROM sales WHERE type=:c AND month = '$dmonth' AND year = '$dyear'");
                                                $results->bindParam(':c', $c);
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(balance)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            } else if (!empty($dmonth)){
                                                $results = $db->prepare("SELECT sum(balance) FROM sales WHERE type=:c AND month = '$dmonth' ");
                                                $results->bindParam(':c', $c);
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(balance)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            } else if (!empty($dyear)){
                                                $results = $db->prepare("SELECT sum(balance) FROM sales WHERE type=:c AND year = '$dyear' ");
                                                $results->bindParam(':c', $c);
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(balance)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            } else if (empty($dmonth) && empty($dyear)){
                                                $results = $db->prepare("SELECT sum(balance) FROM sales WHERE type=:c");
                                                $results->bindParam(':c', $c);
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(balance)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            } else{
                                                $results = $db->prepare("SELECT sum(balance) FROM sales WHERE type=:c");
                                                $results->bindParam(':c', $c);
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(balance)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            }
                                        }

                                        if(isset($_POST["accountduedate"])){
                                            $dailydate = $_POST['dailydate'];
                                            $c='credit';
                                            $results = $db->prepare("SELECT sum(balance) FROM sales WHERE type=:c AND date = '$dailydate'");
                                            $results->bindParam(':c', $c);
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(balance)'];
                                                echo formatMoney($dsdsd, true);
                                            }
                                        }

                                        ?>
                                    </th>
                                </tr>
                            </thead>
                            <!-- TOTAL -->
                            
                        </table>
                    </div>
                                        
                    <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>
                    <div class="clearfix"></div>
                    
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>
        <!-- <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script> -->
        <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
        <script>
        
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
     
     




    </body>

    </html>
