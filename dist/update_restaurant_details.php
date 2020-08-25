<?php 

require("connect.php");

$con = getConn();

 
 

 	/*$price = $_POST['price'];
 	$availability = $_POST['availability'];
 	$id = $_POST['id'];
*/
    $sql = "UPDATE restaurants SET FoodLicense = '".$_POST["FoodLicenceNumber"]."', LabourLicense = '".$_POST["LabourLicenceNumber"]."',Margin = '".$_POST["Margin"]."' where Restaurant_ID='".$_POST['restaurantID']."' ";


    $result = mysqli_query($GLOBALS['con'],$sql) or die("Error: " . mysqli_error($con));

    if($result) {
        echo "Details Updated Successfully";
    } else {
        echo "Something Went Wrong";
    }



?>