<?php 
 require_once 'db_connect.php';
 $sql="SELECT * FROM `expenses` WHERE 1";
 $result=$mysqli->query($sql);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Expenses report</title>
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
		<div class="col-md-4">
			<h4> Expenses</h4>
            <table class="table">
            	<thead>
            		<tr>
            			<td>id</td>
            			<td>user_id</td>
            			<td>exptype_id</td>
            			<td>amount</td>
            			<td>payment_method</td>
            			<td>payment_to</td>
            			<td>expenses_date</td>
            			<td>remark</td>
            			<td>status</td>
            			<td>created</td>
            			<td>updated</td>
            			<td>Action</td>
            		</tr>
            	</thead>
            	<tbody>
            	 <?php
					   while ($row = $result->fetch_assoc())

						  {
						  	
						
							echo "<tr>";
								echo "<td>".$row['id']."</td>";
								echo "<td>".$row['user_id']."</td>";
								echo "<td>".$row['exptype_id']."</td>";
								echo "<td>".$row['amount']."</td>";
								echo "<td>".$row['payment_method']."</td>";
								echo "<td>".$row['payment_to']."</td>";
								echo "<td>".$row['expensese_date']."</td>";
								echo "<td>".$row['remark']."</td>";
								echo "<td>".$row['status']."</td>";
								echo "<td>".$row['created']."</td>";
								echo "<td>".$row['updated']."</td>";
								echo "<td><a href='expedit.php?id={$row['id']}'>edit</a>
								  <a onclick='return confirm(\"are you sure? \")' href='delete.php?id={$row['id']}'>delete</a></td>";
							echo "</tr>";
						  }
					?>
            	</tbody>
            </table>
		</div>
		
	</div>


</body>
</html>