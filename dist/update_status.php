<?php 

require("connect.php");

$con = getConn();

 

 	/*$price = $_POST['price'];
 	$availability = $_POST['availability'];
 	$id = $_POST['id'];
*/
 	$sql = "UPDATE restaurants set OperationStatus='".$_POST['status']."' where Restaurant_ID='".$_POST['id']."'";

 	$result = mysqli_query($con,$sql);

 	if($result) {
 		echo 'Data Updated ';
 	}



?>