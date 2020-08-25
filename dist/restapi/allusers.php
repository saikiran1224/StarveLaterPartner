<?php

require("connect.php");

header('Content-type: application/json');

 if($_SERVER["REQUEST_METHOD"] == "GET") {

  $conn = getConn();
   
    $sql = "SELECT * FROM users";


    $result = mysqli_query($conn,$sql);
          
  if(! $result ) {
      die('Could not get data: ' . mysqli_error());
  }

    //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


    if (mysqli_num_rows($result) > 0) {
         
        $users_array = array();
        
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

             $response = array();
            $response['userID'] = $row['userId'];
            $response['name'] = $row['name'];
            $response['email'] = $row['email'];
            $response['password'] = $row['password'];
            $response['phone'] = $row['phone'];
            array_push($users_array, $response);
         }
    
    echo json_encode(["status" => true, "data" => $users_array]); 

    } else {
    echo json_encode(["status" => false, "msg" => "No Records Found"]);
    }
    
                                                        
 } else {

  echo json_encode(["status" => false, "msg" => "Unauthorized User" ]);
 }




?>