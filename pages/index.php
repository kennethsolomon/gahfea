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

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


	<body>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
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

    	<div class="container">
    		<div class="row">
    			<div class="col-md-4 col-md-offset-4">
    				<div class="login-panel panel panel-default">
    					<div class="panel-heading">
    						<h3 class="panel-title"><b>GAHFEA CAFE </b></h3>
    					</div>
    					<ul class="nav nav-pills">
						<br />
    						<center><li class="active"><a data-toggle="pill" href="#home">WELCOME ! Please Login your Credentials.</a></li></center>
							<!-- <li><a data-toggle="pill" href="#menu3">Front Attendant</a></li>
							<li><a data-toggle="pill" href="#menu1">Kitchen</a></li>
    						<li><a data-toggle="pill" href="#menu2">Cashier</a></li> -->
    					</ul>
    					<div class="tab-content">
    						<!-- Department -->
    						<div id="home" class="tab-pane fade in active">
    							<br />
    							<form method="post" name="admin_form">
    								<div class="form-group">
    									<input type="text" class="form-control" name="username" placeholder="Username">
    								</div>
    								<div class="form-group">
    									<input type="password" class="form-control" name="pass" placeholder="Password">
    								</div>
    								<div class="form-group">
    									<button class="btn btn-block btn-success" id = "btn-login" name = "btn-login">Log in</button>
    								</div>
    								<div class="form-group" id="alert-msg">
    								</div>

    							</form>
    						</div>
							<!-- FRONT ATTENDANT -->
							<div id="menu3" class="tab-pane fade">
    							<br />
    							<form method="post" name="attendant_form">
    								<div class="form-group">
    									<input type="text" class="form-control" name="attendant_username" placeholder="Username">
    								</div>
    								<div class="form-group">
    									<input type="password" class="form-control" name="attendant_pass" placeholder="Password">
    								</div>
    								<div class="form-group">
    									<button class="btn btn-block btn-success" id = "btn-attendant" name = "btn-login">Log in</button>
    								</div>
    								<div class="form-group" id="alert-msg3">
    								</div>

    							</form>
    						</div>
							<!-- KITCHEN -->
							<div id="menu1" class="tab-pane fade">
    							<br />
    							<form method="post" name="kitchen_form">
    								<div class="form-group">
    									<input type="text" class="form-control" name="kitchen_username" placeholder="Username">
    								</div>
    								<div class="form-group">
    									<input type="password" class="form-control" name="kitchen_pass" placeholder="Password">
    								</div>
    								<div class="form-group">
    									<button class="btn btn-block btn-success" id = "btn-kitchen" name = "btn-login">Log in</button>
    								</div>
    								<div class="form-group" id="alert-msg2">
    								</div>

    							</form>
    						</div>
							<!-- CASHIER -->
    						<div id="menu2" class="tab-pane fade">
    							<br />
    							<form method="post" name="cashier_form">
    								<div class="form-group">
    									<input type="text" class="form-control" name="cashier_username" placeholder="Username">
    								</div>
    								<div class="form-group">
    									<input type="password" class="form-control" name="cashier_pass" placeholder="Password">
    								</div>
    								<div class="form-group">
    									<button class="btn btn-block btn-success" id = "btn" name = "btn">Log in</button>
    								</div>
    								<div class="form-group" id="alert-msg1">
    								</div>
    							</form>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>

    	<!-- jQuery -->
    	<script src="../vendor/jquery/jquery.min.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    	<!-- Metis Menu Plugin JavaScript -->
    	<script src="../vendor/metisMenu/metisMenu.min.js"></script>

    	<!-- Custom Theme JavaScript -->
    	<script src="../dist/js/sb-admin-2.js"></script>

    	<script type="text/javascript">
    		jQuery(function(){
				//ADMIN
    			$('form[name="admin_form"]').on('submit', function(donard){
    				donard.preventDefault();

    				var a = $(this).find('input[name="username"]').val();
    				var b = $(this).find('input[name="pass"]').val();

    				if (a === '' && b ===''){
    					$('#alert-msg').html('<div class="alert alert-danger">All fields are required!</div>');
    				}else{
    					$.ajax({
    						type: 'POST',
    						url: 'new_login.php',
    						data: {
    							username: a,
    							password: b
    						},
    						beforeSend:  function(){
    							$('#alert-msg').html('');
    						}
    					})
    					.done(function(donard){
    						if (donard == 0){
    							$('#alert-msg').html('<div class="alert alert-danger">Incorrect username or password!</div>');
    						}else{
    							$("#btn-login").html('<img src="loading.gif" /> &nbsp; Signing In ...');
    							setTimeout(' window.location.href = "home.php"; ',2000);
    						}
    					});
    				}
    			});

				//FRONT ATTENDANT
				$('form[name="attendant_form"]').on('submit', function(donard){
    				donard.preventDefault();

    				var a = $(this).find('input[name="attendant_username"]').val();
    				var b = $(this).find('input[name="attendant_pass"]').val();

    				if (a === '' && b ===''){
    					$('#alert-msg3').html('<div class="alert alert-danger">All fields are required!</div>');
    				}else{
    					$.ajax({
    						type: 'POST',
    						url: 'attendant/new_login.php',
    						data: {
    							username: a,
    							password: b
    						},
    						beforeSend:  function(){
    							$('#alert-msg3').html('');
    						}
    					})
    					.done(function(donard){
    						if (donard == 0){
    							$('#alert-msg3').html('<div class="alert alert-danger">Incorrect username or password!</div>');
    						}else{
    							$("#btn-attendant").html('<img src="loading.gif" /> &nbsp; Signing In ...');
								setTimeout(' window.location.href = "attendant/sales.php?id=cash&invoice=<?php echo $finalcode ?>"; ',2000);
    						}
    					});
    				}
    			});

				//KITCHEN
				$('form[name="kitchen_form"]').on('submit', function(donard){
    				donard.preventDefault();

    				var a = $(this).find('input[name="kitchen_username"]').val();
    				var b = $(this).find('input[name="kitchen_pass"]').val();

    				if (a === '' && b ===''){
    					$('#alert-msg2').html('<div class="alert alert-danger">All fields are required!</div>');
    				}else{
    					$.ajax({
    						type: 'POST',
    						url: 'kitchen/new_login.php',
    						data: {
    							username: a,
    							password: b
    						},
    						beforeSend:  function(){
    							$('#alert-msg2').html('');
    						}
    					})
    					.done(function(donard){
    						if (donard == 0){
    							$('#alert-msg2').html('<div class="alert alert-danger">Incorrect username or password!</div>');
    						}else{
    							$("#btn-kitchen").html('<img src="loading.gif" /> &nbsp; Signing In ...');
								setTimeout(' window.location.href = "kitchen/sales.php"; ',2000);
    						}
    					});
    				}
    			});

				//CASHIER
    			$('form[name="cashier_form"]').on('submit', function(donard){
    				donard.preventDefault();

    				var a = $(this).find('input[name="cashier_username"]').val();
    				var b = $(this).find('input[name="cashier_pass"]').val();

    				if (a === '' && b ===''){
    					$('#alert-msg1').html('<div class="alert alert-danger">All fields are required!</div>');
    				}else{
    					$.ajax({
    						type: 'POST',
    						url: 'cashier/new_login.php',
    						data: {
    							username: a,
    							password: b
    						},
    						beforeSend:  function(){
    							$('#alert-msg1').html('');
    						}
    					})
    					.done(function(donard){
    						if (donard == 0){
    							$('#alert-msg1').html('<div class="alert alert-danger">Incorrect username or password!</div>');
    						}else{
    							$("#btn").html('<img src="loading.gif" /> &nbsp; Signing In ...');
    							setTimeout(' window.location.href = "cashier/sales.php?id=cash&invoice=&table_number="; ',2000);
    						}
    					});
    				}
    			});
    		});
    	</script>

    </body>

    </html>
