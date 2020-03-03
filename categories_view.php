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

<?php 
$pageTitle = 'Categories';
include "common/header.php";?>


	<div class="col-md-9">
		<h2>Categories details</h2><hr>
		
		<div class="d-flex">

			<?php 
			if ( isset($_SESSION['alert']) && !empty($_SESSION['alert']) ){
				$alertMessage = $_SESSION['alert'];
				// echo "<div class='alert alert-{$alertMessage['type']}'>{$alertMessage['message']}</div>";
				echo "<div class='alert alert-" .$alertMessage['type'] . "'>" . $alertMessage['message'] . "</div>";
				$_SESSION['alert'] = '';
			}
			?>
			
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
		
<?php include "common/footer.php";?>