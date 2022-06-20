<?php
$response = array();
include 'db/db_connect.php';
include 'functions.php';
 
//Get the input request parameters
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); //convert JSON into array
 
//Check for Mandatory parameters
if(isset($input['username']) && isset($input['date'])){
	$username = $input['username'];
	$password = $input['date'];
	
	//Check if user already exist
	if(userExists($username)){
		
		//Query to register new user
		$insertQuery  = "INSERT INTO shifts (username, check_in_date) VALUES (?,?)";
		if($stmt = $con->prepare($insertQuery)){
			$stmt->bind_param("ss",$username,$password);
			$stmt->execute();
			$response["status"] = 0;
			$response["message"] = "User created";
			$stmt->close();
		}
	}
	else{
		$response["status"] = 1;
		$response["message"] = "User does not exists";
	}
}
else{
	$response["status"] = 2;
	$response["message"] = "Missing mandatory parameters";
}
echo json_encode($response);
?>