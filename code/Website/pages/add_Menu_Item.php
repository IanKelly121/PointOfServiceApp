<?php
	// Start the login session
	session_start();

	// Database information
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "posapp_database";

	// Menu info to be added to database
	$menu_id = $_SESSION["company_id"];
	$item_name = $_POST['item_name'];
	$item_catagory = $_POST['item_catagory'];
	$item_description = $_POST['item_description'];
	$item_price = $_POST['item_price'];

	//create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	//check connection
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	//Check if any fields are blank
	if(empty($item_name)){
		echo "Item Name is blank";
		die();
	}

	if(empty($item_catagory)){
		echo "Select an item catagory";
		die();
	}

	if(empty($item_price)){
		echo "Item price is blank";
		die();
	}

	//Insert data into company table
	$sql = "INSERT INTO menu_details (menu_id, item_name, item_catagory, item_description, item_price) values ('$menu_id','$item_name','$item_catagory','$item_description','$item_price')";

	//Send query and print error is it failed
	if($conn->query($sql) === FALSE){
		header("location: ./error.php");
	}else{
		header("location: ./dashboard_menu.php");
	}

	$conn->close();

?>