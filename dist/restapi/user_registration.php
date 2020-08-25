<?php

require("connect.php");

header('Content-type: application/json');

 if($_SERVER["REQUEST_METHOD"] == "POST") {

 	$conn = getConn();

  // Takes raw data from the request
  $json = file_get_contents('php://input');

  // Converts it into a PHP object
  $data = json_decode($json);

  $name = $data->name;
  $email = $data->email;
  $password = $data->password;
  $phone = $data->phone;

  $sql_query = "SELECT * from users where Email_ID= '$email' OR Phone='$phone' ";
 
  $check  = mysqli_query($conn,$sql_query);

  if(mysqli_num_rows($check) > 0) {
      echo json_encode(["status" => false, "msg" => "Already Registered !"]);
    
    exit();
  }

   $custID = uniqid();

  $sql = "INSERT INTO users (Customer_ID,Name,Email_ID,Password,Phone,Total_Orders) VALUES ('$custID','$name','$email', '$password', '$phone','0'); ";


  $result = mysqli_query($conn,$sql);
          
	if(!$result ) {
	    die('Could not get data: ' . mysqli_error());
	}

  if($result) {
   
    echo json_encode(["status" => true, "msg" => "Record has been added successfully"]);
    
  } else {
    
    echo json_encode(["status" => false, "msg" => "Something went wrong"]);
    
  } 


 } else {

	echo json_encode(["status" => false, "msg" => "Unauthorized User" ]);
 }




?>