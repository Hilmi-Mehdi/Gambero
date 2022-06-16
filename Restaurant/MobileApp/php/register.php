<?php
$response = array();
include 'db/db_connect.php';
include 'functions.php';
 
//Get the input request parameters
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); //convert JSON into array
 
//Check for Mandatory parameters
if(isset($input['username']) && isset($input['password']) && isset($input['full_name'])){
	$username = $input['username'];
	$password = $input['password'];
	$fullName = $input['full_name'];
	
	//Check if user already exist
	if(!userExists($username)){
		
		//Query to register new user
		$insertQuery  = "INSERT INTO users(email, username, password) VALUES (?,?,?)";
		if($stmt = $con->prepare($insertQuery)){
			$stmt->bind_param("sss",$username,$fullName,$password);
			$stmt->execute();
			$response["status"] = 0;
			$response["message"] = "User created";
			$stmt->close();
		}
	}
	else{
		$response["status"] = 1;
		$response["message"] = "User exists";
	}
}
else{
	$response["status"] = 2;
	$response["message"] = "Missing mandatory parameters";
}
echo json_encode($response);
?>