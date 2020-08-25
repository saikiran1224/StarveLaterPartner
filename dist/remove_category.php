<?php
     
     
require("connect.php");

$con = getConn();


    if(!$con){
        die("Connection Failed :" + mysqli_connect_error());
    }

    $query = "DELETE FROM category WHERE Category_ID='".$_POST['id']."'";
   
   $result = mysqli_query($con,$query);

   if($result) {
     echo "Data Updated";
   }
    
?>