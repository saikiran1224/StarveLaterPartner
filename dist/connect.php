<?php

	session_start();

	function getConn() {

		$servername = "fdb28.awardspace.net";
		$username = "3555583_starvelater";
		$password = "Rajam@123456";
		$dbname = "3555583_starvelater";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		    // Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

		return $conn;

	}


?>

