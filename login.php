<?php 
session_start();
 require_once 'db_connect.php';

 	
 	

  if ( isset($_POST['submit']) ) {

  	$username=$_POST['username'];
  	$password=$_POST['password'];

  	if ( empty($username) ) {
  	$error_name="username must be require";
  	}
  	if( empty($password) ){
  		$error_pass=" password must be require";
  	}
    $sql="SELECT * FROM `users` WHERE username='$username'";
    $result=$mysqli->query($sql);
   
       if(mysqli_num_rows($result)>0)
      {
         $row=$result->fetch_assoc();
         if($row['password']==$password)
           {
             $_SESSION['id']=$row['id'];
             $_SESSION['user_login']=$username;
             // header("Location: dashboard.php"); 
              if ( !empty(@$_SESSION['user_login'] && $_SESSION['id'] )  ) {
                   header("Location:dashbord.php");}
           }
         else
           {
            $password_not_match="Username or password does not match";
           }
      }
      else
        {
           $password_not_match="Username or password does not match";
        }
   }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>login</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
   <div class="container">
   	<div class=" text-center">
   		<img src="img/login.jpg" >
   	   <form action="" method="post">
     	 	
     	 		<div class="form_group">
     	 			<span> Username:</span>
     	 			<input type="text" name="username" placeholder="username"><br>
     	 			<span class="text-danger"><?php echo @$error_name; ?></span>
     	 		</div>
     	 		<div class="form_group pt-2">
  	   	 		 <span> Password :</span>
  	   	 		 <input type="password" name="password" placeholder="password">	<br>
  	   	 		 <span class="text-danger"><?php echo @$error_pass; ?></span>
     	 		</div>			
     	 		<div class="pt-2">
     	 			<input class=" btn btn-primary" type="submit" name="submit" value="login">
     	 		</div>
     	 		<div  class=" text-center pt-5">
     	 				<span class="text-danger"><?php echo @$error_name_or_pass; ?></span>
     	 		</div>
  	  </form>	
      <div>
        <h4 class="text-danger"><?php if ( isset($password_not_match) ) {
          echo $password_not_match;
        }; ?></h4>
      </div>
   	</div>

   </div>
 </body>
 </html>