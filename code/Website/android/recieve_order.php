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
		die("Connection failed: " . $conn->connect_error);
		echo("con failed");
	}

	// Get cache login values from android user
	$login_email = $_REQUEST['username'];
	$login_password = $_REQUEST['password'];
	// Get order details from user and store in database
	$order_number = $_REQUEST['order_number'];
	$order_details = $_REQUEST['order_details'];
	$order_price = $_REQUEST['order_price'];

	// Query database for user and get company_id
	$result = $conn->query("SELECT company_id FROM employee_details WHERE employee_email = '$login_email' UNION ALL SELECT employer_id FROM employers_details WHERE employers_email = '$login_email'") or die("Failed to query database ".$conn->connect_error);

	$row = mysqli_fetch_array($result);
	$company_id = $row['company_id'];

	// Add order to database
	$result = "INSERT INTO orders(order_id, order_number ,order_details, order_price) VALUES ('$company_id','$order_number','$order_details','$order_price')";

	$out = $conn->query($result);

	//Send query and print error is it failed
	if($out === FALSE){
		echo ("failed");
	}else{
		echo("sent");
	}

	$conn->close();
?>