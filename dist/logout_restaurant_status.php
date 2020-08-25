<?php

require("connect.php");

$con = getConn();

 
   $sql = "UPDATE restaurants SET sessionID='".$_POST['status']."' where Email_ID='".$_POST['email']."'";

 	$result = mysqli_query($con,$sql);

 	if($result) {
 		echo 'Data Updated ';
 		session_destroy();
 	}



?>