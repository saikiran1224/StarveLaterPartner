<?php

require("connect.php");

header('Content-type: application/json');

 if($_SERVER["REQUEST_METHOD"] == "GET") {

 	$conn = getConn();
   
    $sql = "SELECT Restaurant_ID,Restaurant_Name,fname,Email_ID,Phone,State,City,GSTIN,logoFileName FROM restaurants";


  	$result = mysqli_query($conn,$sql);
          
	if(! $result ) {
	    die('Could not get data: ' . mysqli_error());
	}

  	//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


  	if (mysqli_num_rows($result) > 0) {
         
        $res_array = array();
        
  		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

             $response = array();
             $response['imgurl'] = "http://starvelater.net/partner/uploads/".$row['logoFileName'];
             $response['res_ID'] = $row['Restaurant_ID'];
             $response['restaurantName'] = $row['Restaurant_Name'];
             $response['firstName'] = $row['fname'];
             $response['emailID'] = $row['Email_ID'];
             $response['phone'] = $row['Phone'];
             $response['CityName'] = $row['City']; 
             $response['GSTINno'] = $row['GSTIN'];
             array_push($res_array, $response);
         }
		
		echo json_encode(["status" => true, "data" => $res_array]);	

  	} else {
		echo json_encode(["status" => false, "msg" => "No Records Found"]);
  	}
		
                                                        
 } else {

	echo json_encode(["status" => false, "msg" => "Unauthorized User" ]);
 }




?>