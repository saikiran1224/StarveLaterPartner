<?php

require("connect.php");

header('Content-type: application/json');

if($_SERVER["REQUEST_METHOD"] == "POST") {

   	$conn = getConn();
    // Takes raw data from the request
    $json = file_get_contents('php://input');
    // Converts it into a PHP object
    $data = json_decode($json);

    $email = $data->email;
    $password = $data->password;

    $sql_query = "SELECT * from users where Email_ID= '$email' ";
   
    $check  = mysqli_query($conn,$sql_query);

    if(mysqli_num_rows($check) == 0) {

       echo json_encode(["status" => false,"msg" => "User not Registered"]);
       exit();

    } else {

        $sql = "SELECT * from users where Email_ID= '$email' AND Password = '$password'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
              
        if(!$result ) {
          die('Could not get data: ' . mysqli_error());
        }

        if($email == $row['Email_ID'] && $password == $row['Password']) {
          echo json_encode(["status" => true, "msg" => "Login Successfull"]);
        } else {
          echo json_encode(["status" => false, "msg" => "Invalid Password"]); 
        } 

    }

} else {

	  echo json_encode(["status" => false, "msg" => "Unauthorized User" ]);

}


?>