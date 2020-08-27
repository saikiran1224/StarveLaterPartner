<?php

ob_start();

require("connect.php");

header('Content-type: application/json');

 if($_SERVER["REQUEST_METHOD"] == "POST") {

 	$conn = getConn();

  // Takes raw data from the request
  $json = file_get_contents('php://input');

  // Converts it into a PHP object
  $data = json_decode($json);

  $city_name = $data->city;
  $area_name = $data->area;
 
   
  $sql = "SELECT * from restaurants 
         where City = '$city_name' and Area = '$area_name' ";

  $result = mysqli_query($conn,$sql);
          
	if(! $result ) {
	    die('Could not get data: ' . mysqli_error());
	}
  
  	if (mysqli_num_rows($result) > 0) {
         
        $res_array = array();
        
    		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

             $response = array();
             $response['Restaurant_ID'] = $row['Restaurant_ID'];
             $response['Type'] = $row['Type'];
             $response['RestaurantLogo'] = "http://starvelater.ml/uploads/".$row['logoFileName'];
             $response['Restaurant_Name'] = $row['Restaurant_Name'];
             $response['KnownFor'] = $row['KnownFor'];
             $response['Address'] = $row['Address'];
             $response['OperationStatus'] = $row['OperationStatus'];
             $response['AvgPrepTime'] = $row['AvgPrepTime'];
             array_push($res_array, $response);

         }
		
	    	echo json_encode(["status" => true, "data" => $res_array]);	

  	} else {
		echo json_encode(["status" => false, "msg" => "No Restaurants Found"]);
  	}
		
                                                        
 } else {

	echo json_encode(["status" => false, "msg" => "Unauthorized User" ]);
 }

 ob_flush();

?>