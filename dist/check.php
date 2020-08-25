<?php

   require("connect.php");
   
   $con = getConn();
   
   
	$sql = "select sum(Net_Bill) from orders where Order_Id='201' ";

	$result = mysqli_query($con,$sql);

	$resultarr = mysqli_fetch_array($result);

 
   echo $resultarr[0];
?>