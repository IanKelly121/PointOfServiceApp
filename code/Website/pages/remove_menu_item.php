<?php
	// Start the login session
	session_start();

	// Database information
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "posapp_database";

	// Menu info to be removed from the database
	$menu_id = $_SESSION["company_id"];
	$item_name = $_POST['item_name'];
	$item_catagory = $_POST['item_catagory'];

	//create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	//check connection
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	// Check fields aren't empty
	if(empty($item_name)){
		echo "Item Name is blank";
		die();
	}

	if(empty($item_catagory)){
		echo "Select an item catagory";
		die();
	}

	//Remove Menu data from menu_details table
	$sql = "DELETE FROM menu_details WHERE menu_id='$menu_id' AND item_name='$item_name' AND item_catagory='$item_catagory'";

	//Send query and print error if it failed
	if($conn->query($sql) === FALSE){
		header("location: ./error.php");
	}else{
		header("location: ./dashboard_menu.php");
	}

	$conn->close();
?>