<?php

include ('../connect.php');
session_start();

$session_id  = $_SESSION['SESS_MEMBER_ID'];
$session_position = $_SESSION['SESS_MEMBER_POSITION'];
$query = $db->prepare("SELECT * FROM user WHERE id = ?");
		$query->execute(array($session_id));
		$row = $query->fetch();
	
		$session_attendant_name = $row['name'];
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
	</div>
	<!-- /.navbar-header -->
	<div class="row">
		<div class="col-sm-4">
		<a style="font-size: 20px;" class="navbar-brand"  href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><b>GAHFEA<b></a>
		</div>
		<div class="col-sm-4 col-lg-8" style="text-align:right">
			<ul class="nav navbar-top-links navbar-right">
			Welcome:<strong> <?php echo $session_attendant_name; ?></strong>      
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
						<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
		</div>
	</div>
	
	
	
	
		<!-- /.navbar-top-links -->

		</nav>
