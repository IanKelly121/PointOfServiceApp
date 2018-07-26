<?php
	// Start the login session
	session_start();
 
	// Database information
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "posapp_database";

	// Employee info to be added to database
	$company_id = $_SESSION["company_id"];
	$employee_pps = $_POST['employee_pps'];
	$employee_name = $_POST['employee_name'];
	$employee_tel = $_POST['employee_tel'];
	$employee_email = $_POST['employee_email'];
	$employee_password = $_POST['password'];

	//create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	//check connection
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	//Check if any fields are blank
	if(empty($employee_pps)){
		echo "Employee PPS Number is blank";
		die();
	}

	if(empty($employee_name)){
		echo "Employee name is blank";
		die();
	}

	if(empty($employee_tel)){
		echo "Employee telephone is blank";
		die();
	}

	if(empty($employee_email)){
		echo "Employee email is blank";
		die();
	}

	if(empty($employee_password)){
		echo "Employee password is blank";
		die();
	}

	//Hash password
	$hashed_password = password_hash($employee_password, PASSWORD_DEFAULT);

	//Insert data into company table
	$sql = "INSERT INTO employee_details (company_id, employee_pps, employee_name, employee_tel, employee_email, password) values ('$company_id','$employee_pps','$employee_name','$employee_tel','$employee_email','$hashed_password')";

	//Send query and print error is it failed
	if($conn->query($sql) === FALSE){
		header("location: ./error.php");
	}else{
		header("location: ./dashboard_employee.php");
	}

	$conn->close();

?>