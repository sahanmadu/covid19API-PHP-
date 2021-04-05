
<?php

 require_once 'config.php';
 //rest api - to delete any citizen

 $response = array();
 if($_POST['id']){
	 $id = $_POST['id'];
	 $stmt = $conn->prepare("DELETE FROM citizen WHERE id = ?");
	 $stmt->bind_param("s",$id);
	 if($stmt->execute()){
		 $response['error'] = false;
		 $response['message'] = "Citizen Deleted Successfully!";
	 } else{
		 $response['error'] = true;
		 $response['message'] = "an error occured";
	 }
 } else{
	 $response['error'] = true;
	 $response['message'] = "Insufficient Parameters";
 }
 echo json_encode($response);
?>