<?php

	session_start();

	function getConn() {

		$servername = "johnny.heliohost.org";
		$username = "saikiran_starvelater";
		$password = "Gmrit@224";
		$dbname = "saikiran_starvelater";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		    // Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

		return $conn;

	}


?>

