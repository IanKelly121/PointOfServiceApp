<?php
	// Start the login session
	session_start();

	// Database information
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "posapp_database";

	// Company info to be added to the database
	$company_name = $_POST['company_name'];
	$company_tel = $_POST['company_tel'];
	$company_address1 = $_POST['company_address1'];
	$company_address2 = $_POST['company_address2'];
	$company_address3 = $_POST['company_address3'];

	// Employer info to be added to the database
	$employer_name = $_POST['employer_name'];
	$employer_tel = $_POST['employer_tel'];
	$employer_email = $_POST['employer_email'];
	$employer_address1 = $_POST['employer_address1'];
	$employer_address2 = $_POST['employer_address2'];
	$employer_address3 = $_POST['employer_address3'];
	$employers_password = $_POST['employer_password'];

	//create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	//check connection
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	// Check all fields are not blank
	if(empty($company_name)){
		echo "Company Name is blank";
		die();
	}

	if(empty($company_tel)){
		echo "Company telephone is blank";
		die();
	}

	if(empty($company_address1)){
		echo "Company address is blank";
		die();
	}

	if(empty($company_address2)){
		echo "Line 2 is blank";
		die();
	}

	if(empty($company_address3)){
		echo "Line 3 is blank";
		die();
	}

	if(empty($employer_name)){
		echo "Employer Name is blank";
		die();
	}

	if(empty($employer_tel)){
		echo "Employer telephone is blank";
		die();
	}

	if(empty($employer_email)){
		echo "Company Email is blank";
		die();
	}

	//Insert company data into company table
	$sql = "INSERT INTO company_members (company_name, company_tel, company_address1, company_address2, company_address3) values ('$company_name','$company_tel','$company_address1','$company_address2','$company_address3')";

	if($conn->query($sql) === FALSE){
		header("location: ./error.php");
	}

	//Query database for company_id to link company & employer
	$company_id = $conn->query("SELECT id FROM company_members WHERE company_name = '$company_name' AND company_tel = '$company_tel'") or die("Failed to query database ".$conn->connect_error);

	//Fetch company_id and save it as session variable
	$employer_id = mysqli_fetch_array($company_id);
	$newCompany_id = $employer_id['id'];
	$_SESSION["company_id"] = $newCompany_id;

	//Hash password
	$hashed_password = password_hash($employers_password, PASSWORD_DEFAULT);

	//Insert data into employer table
	$sql = "INSERT INTO employers_details (employer_id, employer_name, employer_tel, employers_email, employers_address1, employers_address2, employers_address3,   employers_password) values ('$newCompany_id','$employer_name', '$employer_tel', '$employer_email', '$employer_address1', '$employer_address2', '$employer_address3', '$hashed_password')";

	if($conn->query($sql) === TRUE){
		header("location: ./dashboard.php");
	}else{
		header("location: ./error.php");
	}

	$conn->close();
?>