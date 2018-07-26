<?php

	// Users query information
	$user_name = $_POST["name"];
	$user_email = $_POST["email"];
	$user_message = $_POST["message"];

	// Send it to my email
	$to = 'finnian.oneill27@mail.dcu.ie'; // note the comma

	// Subject
	$subject = 'Contact Query - $user_name';

	// Message
	$message = "
	<html>
	<head>
	  <title>Order 66 - Query</title>
	</head>
	<body>
	  <h1>You have recieved a message query from $user_name</h1>
	  <hr>
	  <p>
	  Name: '$user_name'<br>
	  Email: '$user_email'<br>
	  Message: '$user_message'
	  </p>
	  
	</body>
	</html>
	";

	// Set header information for HTML
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';

	// Additional headers
	$headers[] = 'To: Order 66 Query <finnian.oneill27@mail.dcu.ie>';
	$headers[] = 'From: Order 66 Query <finnian.oneill27@mail.dcu.ie>';

	// Mail it
	mail($to, $subject, $message, implode("\r\n", $headers));

	// ---------------------------------------------------------------------------

	// Auto Generated email confirmation for the user
	$to = $user_email;

	// Subject
	$subject = "Contact Query - '$user_name'";

	// Message
	$message = "
	<html>
	<head>
	  <title>Order 66 - Query</title>
	</head>
	<body>

	  <p>Thank you for your message, we will try to get back to you as soon as we can. </p>
	  <hr>
	  <p>Your Message was: <br> </p>
	  <p>
	  Name: '$user_name'<br>
	  Email: '$user_email'<br>
	  Message: '$user_message'
	  </p>
	  
	</body>
	</html>
	";

	// Set header information for HTML
	$headers2[] = 'MIME-Version: 1.0';
	$headers2[] = 'Content-type: text/html; charset=iso-8859-1';

	// Additional headers
	$headers2[] = "To: $user_name <'$user_email'>";
	$headers2[] = 'From: Order 66 Query <finnian.oneill27@mail.dcu.ie>';

	// Mail it
	mail($to, $subject, $message, implode("\r\n", $headers2));
	header("location: ./contactUs.php");

?>