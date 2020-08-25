<?php

require("connect.php");

header('Content-type: application/json');

 if($_SERVER["REQUEST_METHOD"] == "POST") {

 	$conn = getConn();
   
    $sql = "SELECT * from city ";

  	$result = mysqli_query($conn,$sql);
          
	if(! $result ) {
	    die('Could not get data: ' . mysqli_error());
	}

  	//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


  	if (mysqli_num_rows($result) > 0) {
         
        $res_array = array();
        
    		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

             $response = array();
             $response['City_ID'] = $row['City_ID'];
             $response['City_Name'] = $row['Name'];
             
             array_push($res_array, $response);

         }
		
		echo json_encode(["status" => true, "data" => $res_array]);	

  	} else {
		echo json_encode(["status" => false, "msg" => "No Cities Found"]);
  	}
		
                                                        
 } else {

	echo json_encode(["status" => false, "msg" => "Unauthorized User" ]);
 }




?>