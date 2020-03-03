<?php 
session_start();
require_once 'db_connect.php';
  $id=$_GET['id'];
  echo "$id";
  if (isset($_POST['submit'])) {
	  $new_categories_name=$_POST['categories_name'];
	  $new_categories_type=$_POST['categories_type'];

	  $sql="UPDATE `categories` SET categories_name='$new_categories_name',categories_type='$new_categories_type' WHERE id=$id";
	  $result=$mysqli->query($sql);
	  if ($result){
	  	$_SESSION['alert'] = ['type'=>'success', 'message'=>'Category has been added successfully.'];
	  } else {
	  	$_SESSION['alert'] = ['type'=>'danger', 'message'=>'Sorry, something went wrong!'];
	  }

	  header("Location: categories_view.php");
  }

  // fetch category
  $query = "select * from categories where id=$id";
  $category = $mysqli->query($query)->fetch_row();
 ?>
<?php 
$pageTitle = 'Edit Category';
include "common/header.php";?>

		<div class="col-md-9">
			<a href="categories_view.php">view page</a>
           <form action="#" method="post">
           	<div class="form-group">
           		<label>Categories Name:</label>
           		<input class="form-control" type="text" name="categories_name" value="<?php echo $category['categories_name'];?>" placeholder="Categories Name">
           	</div>
           	<div class="form-group">
           		<span  for="categories_type">categories Type</span>
		    		<select class="form-control"name="categories_type">
		    			<option <?php echo $category['categories_type']=='expenses' ? 'selected' : '';?> value="expenses">expenses</option>
		    			<option <?php echo $category['categories_type']=='income' ? 'selected' : '';?> value="income">income</option>
                    </select>
           		
           	</div>
           	<div><input class="btn btn-secondary" type="submit" name="submit" value="Save"></div>
           </form>
		</div>
		
<?php include "common/footer.php";?>