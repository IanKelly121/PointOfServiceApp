<?php
	// Start the login session
	session_start();

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
	}

	// Get values from form
	$login_email = $_POST['login_email'];
	$login_password = $_POST['login_password'];

	// SQL Injection prevention
	//$login_email = stripcslashes($login_email);
	//$login_password = stripcslashes($login_password);

	// Query database for user
	$result = $conn->query("SELECT * FROM employers_details WHERE employers_email = '$login_email'") or die(header("location: ./error.php"));

	$row = mysqli_fetch_array($result);

	//Make sure the user is from the same company
	$_SESSION["company_id"] = $row['employer_id'];

	//Hash the inputted password and check they match
	$verified_password = password_verify($login_password, $row['employers_password']);

	if($row['employers_email'] == $login_email && $verified_password){
		header("location: ./dashboard.php");
	}else{
		header("location: ./error.php");
	}

	$conn->close();

?>