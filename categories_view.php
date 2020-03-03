<?php 
 session_start();
  require_once 'db_connect.php';
  // $message1=$_GET[$_SESSION['message']];
  // $message2=$_GET[$_SESSION['message1']];
  // echo $message1;
  // echo $message2;
  // exit;
  $sql="SELECT * FROM categories WHERE 1";
  $result=$mysqli->query($sql);
 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Categories  view</title>
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
		<div class="col-md-9">
			<h2>Categories details</h2><hr>
			
			<div class="d-flex">
				
				<div class=" p-2 form-inline "> 
				     <label class=" input-group-text pull-left ">Search</label>       	
		        	<input  type="text" class="form-control" name="search" placeholder="search">	  	 
		        	<i class="pl-2 fas fa-search" aria-hidden="true"></i>
		        </div>
		        <div class="ml-auto p-2">
		        	<a class="btn btn-primary " href="categories.php">Add New</a>
		        </div>
		        
		       
			</div>

	        
            <table class="table table-hover table-bordered">
            	<thead>
            		<tr>
            			<th>ID</th>
            			<th>Categories Name</th>
            			<th>Categories Type</th>
            			<th>Status</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	 <tbody>
            	 	 <?php
            	 	   while ($row = $result->fetch_assoc()) {
                       
                       
	                       echo "<tr>"; 

	                        echo "<td>".$row['id']."</td>";
	                        echo "<td>".$row['categories_name']."</td>";
	                        echo "<td>".$row['categories_type']."</td>";
	                        echo "<td>".$row['status']."</td>";
	                        echo "<td><a href='categories_edit.php?id={$row['id']}'>Edit</a>
								  <a onclick='return confirm(\"are you sure? \")' href='categories_delete.php?id={$row['id']}'>delete</a></td>";
	                       echo "</tr>";
                        } 
            	 	  ?>
            	 </tbody>
            </table>
		</div>
		
	</div>


</body>
</html>