<?php 
require_once 'db_connect.php';
 if (isset($_POST['submit'])) {
 	$username=$_POST['username'];
 	$email=$_POST['email'];
 	$password=$_POST['password'];
 	$confirm_password=$_POST['confirm_password'];

 	if (empty($username)) {
 		$name_error="Insert your name";
 	}
 	if (empty($email)) {
 		$email_eror="Insert your email";
 	}
 	if (empty($password)) {
 		$pass_error="Insert your password";
 	}
 	if (empty($confirm_password)) {
 		$confirm_pass_error="Insert your confirm_password";
 	}
     
   if (!empty($username & $email)) {
   
          
	 	if ( $password==$confirm_password) {
	 		$sql="INSERT INTO `users`(`id`, `username`, `email`, `password`, `status`, `confirm_password`) VALUES ('','$username','$email','$password',1,'$confirm_password')";
	       $result=$mysqli->query($sql); 
	       if ($result) {
	       	echo "yes";
	       } else{
	       	echo "no";
	       }
	 	}else{
	 		$pass_nat_match="password does nat match";
	 	}
  }else{
  	$name_email_error="ckeck Username or email";
  }

 	  

 }
 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add new user</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
	  <nav class="navbar navbar-expend-lg navbar-dark bg-dark text-light">
	  	<div class="pull-left">
	  		<a class="navbar-brand" href="#">Daily Acount Management </a>
	  	</div>
	  	
	  	<div class="full-right">
	  		<div class="dropdown">
	  			<a class="btn text-light" href="developer.php">developer</a>
			  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <i class="fa fa-user"> User</i>
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			    <a class="dropdown-item" href="#"> <i class="fa fa-gear"></i>setting</a>
			    <a class="dropdown-item" href="login.php"> <i class="fa fa-sign-out"></i>logout</a>
			  </div>
		     </div>
	  	</div>
	  </nav>	
	<div class="row">
		<div class="col-md-3 bgcolor">
		  <h3 class="text-center pt-2"><i class="fa fa-dashboard "></i>DASHBORD<hr></h3>
		  <ul class="list-group">
		  		<a class="list-group-item list-group-item-action" href="#">Dashboard</a>
				<a class="list-group-item" href="dashbord.php"><i class="fa fa-dashboard "></i> Dashboard<i class="pull-right fa fa-angle-right"></i></a>
				<a class="list-group-item" href="#"><i class="fa fa-calculator "></i> Calculator<i class="pull-right fa fa-angle-right"></i></a>
				<a class="list-group-item" href="categories_view.php"><i class="fa fa-refresh"></i> Categories<i class="pull-right fa fa-angle-right"></i></a>
				<a class="list-group-item" href="income.php"><i class="fa fa-bar-chart"></i> Incomes<i class="pull-right fa fa-angle-right"></i></a> 
				<a class="list-group-item" href="expenses.php"><i class="fa fa-calculator"></i> Expenses<i class="pull-right fa fa-angle-right"></i></a>
				<a class="list-group-item " data-toggle="collapse" href="#dropdownitem"><i class="fa fa-user"></i> Account<i class="pull-right fa fa-angle-right"></i></a>
				<div id="dropdownitem" class="collapse">
					<a class="list-group-item" href="adduser.php"><i class="fas fa-user-friends"></i> Add user<i class="pull-right fa fa-angle-right"></i></a> 
					
				</div>
				<a class="list-group-item" href="#"><i class="fa fa-fax"></i> Budgets<i class="pull-right fa fa-angle-right"></i></a>
		  </ul>	
		</div>
		<div class="col-md-6 ">
			 <h2>Registration New User</h2><hr>
			 <div class="input-group">
			 	<form action="#" method="post">
			 		<div class=" form-group">
			 			<label>Username</label>
			 			<input class=" form-control " type="text" name="username" placeholder="username">
			 			<span class="text-danger"> <?php echo @$name_error; ?></span>
			 		</div>
			 		<div class="form-group">
			 			<label>Email</label>
			 			<input class=" form-control" type="email" name="email" placeholder="Email">
			 			<span class="text-danger"> <?php echo @$email_eror; ?></span>
			 			<span class="text-danger"> <?php echo @$name_email_error; ?></span>
			 		</div>
			 		<div class="form-group">
			 			<label>Password</label>
			 			<input class=" form-control " type="password" name="password" placeholder="password">
			 			<span class="text-danger"> <?php echo @$pass_error; ?></span>
			 		</div>
			 		<div class="form-group">
			 			<label>Confairm Password</label>
			 			<input class=" form-control " type="password" name="confirm_password" placeholder="confirm password">
			 			<span class="text-danger"> <?php echo @$confirm_pass_error; ?></span>
			 			<span class="text-danger"> <?php echo @$pass_nat_match; ?></span>
			 			
			 		</div>

			 		<div>
			 			<input class="btn btn-primary" type="submit" name="submit" value="Add user">
			 		</div>
			 	</form>
			 </div>
		</div>
		<div class="col-md-3">
			<h2>ghjghjd</h2>
		</div>
		
	</div>


</body>
</html>