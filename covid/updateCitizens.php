
<?php

 require_once 'config.php';
// rest api - to update citizzens' health status (postive, negative) 

 $response = array();
 
 if($_POST['id'] && $_POST['healthStatus']){
	 $id = $_POST['id'];
	 $healthSatus = $_POST['healthStatus'];
	 $stmt = $conn->prepare("UPDATE citizen SET healthStatus = ? WHERE id = ?");
	 $stmt->bind_param("ss",$healthSatus, $id);
	 if($stmt->execute() == TRUE){
		 $response['error'] = false;
		 $response['message'] = "Citizen Updated Successfully!";
	 } else{
		 $response['error'] = true;
		 $response['message'] = "This ID is incorrect";
	 }
 } else{
	 $response['error'] = true;
	 $response['message'] = "Insufficient Parameters";
 }
 echo json_encode($response);
?>