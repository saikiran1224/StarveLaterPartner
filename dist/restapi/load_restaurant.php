<?php

require("connect.php");

header('Content-type: application/json');

 if($_SERVER["REQUEST_METHOD"] == "POST") {

 	$conn = getConn();

 	$json = file_get_contents('php://input');

    $data = json_decode($json);



    $sql_name = "SELECT Restaurant_Name from restaurants where Restaurant_ID = '".$data->id."'";

     $result = mysqli_query($conn,$sql_name);
                                                      
    $followingdata = $result->fetch_array(MYSQLI_ASSOC);

    //Getting Restaurant ID Foreign Key in Items Table
    $restaurantName = $followingdata['Restaurant_Name'];

    $sql = "SELECT * FROM items where Restaurant_ID='".$data->id."' ";

    $restaurant_profile_arr =array();
                                                    
    $retval = mysqli_query($conn,$sql);
                                                       
    if(! $retval ) {
        die('Could not get data: ' . mysqli_error());
    }

    $restaurant_items_arr =array();
                                                       
    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {

        $item_data = array();
        $item_data['itemPhoto'] = "http://starvelater.net/".$restaurantName."/".$row['photoname'];
        $item_data['itemID'] = $row['item_id'];
        $item_data['itemName'] = $row['Name'];
        $item_data['itemType'] = $row['Type'];
        $item_data['itemCategory'] = $row['category'];
        $item_data['itemPrice'] = $row['price'];
        $item_data['itemAvailability'] = $row['availability'];

        array_push($restaurant_items_arr, $item_data);
    }


  echo json_encode(["status" => true,"restaurantName" => $restaurantName, "data" => $restaurant_items_arr]);	

 } else {
 	echo json_encode(["status" => false, "msg" => "Unauthorized User" ]);
 }



?>