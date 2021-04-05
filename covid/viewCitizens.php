
<?php

 require_once 'config.php';

 // rest api - show citizens' details

 $response = array();
 if($_POST['id']){
	 $id = $_POST['id'];
	 $stmt = $conn->prepare("SELECT nid,fname,age,caddress,profession,email,affiliation,healthStatus FROM citizen WHERE id = ?");
	 $stmt->bind_param("s",$id);
	 $result = $stmt->execute();
	 if($result == TRUE){
		 $response['error'] = false;
		 $response['message'] = "Retrieval Successful!";
		 $stmt->store_result();
		 $stmt->bind_result($nid,$name,$age,$address,$profession,$email,$affiliation,$healthStatus);
		 $stmt->fetch();
		 $response['nid'] = $nid;
		 $response['fname'] = $name;
		 $response['age'] = $age;
		 $response['caddress'] = $address;
		 $response['profession'] = $profession;
		 $response['email'] = $email;
		 $response['affiliation'] = $affiliation;
		 $response['healthStatus'] = $healthStatus;
		 
	 } else{
		 $response['error'] = true;
		 $response['message'] = "Incorrect id";
	 }
 } else{
	  $response['error'] = true;
	  $response['message'] = "Insufficient Parameters";
 }
 echo json_encode($response);
?>