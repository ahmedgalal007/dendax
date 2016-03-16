<?php

include_once('../inc/conn.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){


	$json = file_get_contents('php://input');
	$obj = json_decode($json);

	// Get data
	$name = $obj->{'name'};
	$email = strtolower(trim($obj->{'email'}));
	$phone = $obj->{'phone'};
	$message =$obj->{'message'};
	
	// Check if the user exists
	$sql = "SELECT * FROM user Where email = '". strtolower(trim($email)) ."'";
	$result = $conn->query($sql) ;

	//Server side check for the mandatory fields (name, email, message)
	if (!empty($name) && !empty($email) && !empty($message) ) {
		
		//i If any user exists with that email update the User table and trigger the Before Update trigger
		//  to save the old values in the LOG table
		if ($result->num_rows  > 0) {
			//user exist update the table
			$sql = "UPDATE  user ".
	        		"SET  name = '$name', email = '$email', phone = '$phone', message = '$message'  ".
	         		"WHERE  ".
	         		" email = '$email' ";
	         	// Else insert a new user message in the User table
		}else if ($result->num_rows == 0) {
			// Is a new user, insert a new record
			$sql = "INSERT INTO  user ".
	        		"(ID, name, email, phone, message)  ".
	         		"VALUES  ".
	         		"(NULL, '$name', '$email',  '$phone' , '$message')";
		}

		// Run the Query
		if ($conn->query($sql) === TRUE) {
		 	$json = array("status" => 1, "msg" => "Done message added!");
		 }else{
		 	$json = array("status" => 0, "msg" => "Error adding message!", "Error" => $conn->error);
		 }
		}
	
}else{
	// Error it's not a POST method
 	$json = array("status" => 0, "msg" => "Request method not accepted");
}
 
/* Output header */
 header(`Content-type: application/json`);
 echo json_encode($json);

//close the connection
$conn->close();

?>


