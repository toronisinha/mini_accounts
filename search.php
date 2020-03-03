<?php 
  
 session_start();
  require_once 'db_connect.php';

  $search=$_POST['search'];
 

   $sql="SELECT * FROM categories WHERE categories_name like '%$search%'";
  
   $result=$mysqli->query($sql);
   $counts=mysqli_num_rows($result);
   echo $counts;

  if ($counts>0) {
       while ($row=$result->fetch_assoc()) {
      
          echo $row['categories_name'];
       }
  }else{
  	echo "data not fount";
  }
 ?> 