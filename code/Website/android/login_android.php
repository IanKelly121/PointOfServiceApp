<?php
	
	// Database information
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "posapp_database";

	//create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	//check connection
	if($conn->connect_error){
		die(print("Connection failed"));
	}

	// Get values from android user
	$login_email = $_REQUEST['username'];
	$login_password = $_REQUEST['password'];

	// Query database for user
	$result = $conn->query("SELECT employee_email, password FROM employee_details WHERE employee_email = '$login_email' UNION ALL SELECT employers_email, employers_password FROM employers_details WHERE employers_email = '$login_email'") or die("False");

	$row = mysqli_fetch_array($result);
	$loginStatus= password_verify($login_password, $row['password']);;

	//Return email and password to be cached
	print($loginStatus);

	$conn->close();
?>