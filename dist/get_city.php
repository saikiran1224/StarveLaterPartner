<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>
<?php

//$db_handle = new DBController();

require("connect.php");

$con = getConn();
    
    //Check for DB Connection
    if(!$con){
        die("Connection Failed :" + mysqli_connect_error());
    }else{

        $query ="SELECT Area_ID,Name FROM area WHERE City_ID='".$_POST["City_ID"] ."'";

         $retval = mysqli_query($GLOBALS['con'],$query);

    }

	
?>
	<option value="">Select Area</option>
<?php
	while($rs=$retval->fetch_assoc()) {
?>
	<option value="<?php echo $rs["Area_ID"]; ?>"><?php echo $rs["Name"]; ?></option>
<?php

}
?>
</body>
</html>