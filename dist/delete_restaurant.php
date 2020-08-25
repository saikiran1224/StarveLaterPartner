<?php 

 require("connect.php");
 
 $con = getConn();
 

 	/*$price = $_POST['price'];
 	$availability = $_POST['availability'];
 	$id = $_POST['id'];
*/
 	   $sql = "DELETE from restaurants where Restaurant_ID = '".$_POST['resID']."' ";


       $result = mysqli_query($con,$sql) or die("Error: " . mysqli_error($con));


 	if($result) {
 		echo 'Data Updated ';
 	}



?>