<?php

include_once('../inc/conn.php');

if($_SERVER['REQUEST_METHOD'] == "GET"){


	// Get data
	$menuId = $_GET['menuId'];

	// Buid and Run the sql query to get the menu item childs from the database
	$json = array();
	$sql = "SELECT * FROM menu Where parent = '". strtolower(trim($menuId)) ."'";
	if ($result = $conn->query($sql)) {
	 	while ($row = $result->fetch_row()) {
	 		$item = array(
	 				"ID" => $row[0], 
	 				"name" => $row[1],
	 				"link" => $row[2],
	 				"parent" => $row[3],
	 				"childs" => $row[4]
	 			);
	      		array_push($json, $item);
	 	}
	 	 /* free result set */
    		$result->close();
	 }  
	
}else{
	// Error it's not a GET method
 	$json = array("status" => 0, "msg" => "Request method not accepted");
}
 
/* Output header */
 header(`Content-type: application/json`);
 echo json_encode($json);

//close the connection
$conn->close();

?>


