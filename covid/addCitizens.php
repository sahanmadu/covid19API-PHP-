
<?php 
 
 require_once 'config.php';

 //rest api for add new citizens
 
 $response = array();
 
 if($_POST['nid'] && $_POST['fname'] && $_POST['age'] && $_POST['caddress'] && $_POST['profession'] && $_POST['email'] && $_POST['affiliation'] && $_POST['password'] && $_POST['healthStatus']){
	 $nid = $_POST['nid'];
	 $name = $_POST['fname'];
	 $age = $_POST['age'];
	 $address = $_POST['caddress'];
	 $profession = $_POST['profession'];
	 $email = $_POST['email'];
	 $affiliation = $_POST['affiliation'];
	 $password = $_POST['password'];
	 $healthStatus = $_POST['healthStatus'];
	 
	 $stmt = $conn->prepare("INSERT INTO citizen(nid,fname,age,caddress,profession,email,affiliation,password,healthStatus) VALUES (?,?,?,?,?,?,?,?,?)");
	 $stmt->bind_param("ssissssss",$nid,$name,$age,$address,$profession,$email,$affiliation,$password,$healthStatus);
	 if($stmt->execute() == TRUE){
		 $response['error'] = false;
		 $response['message'] = "citizen added successfully!";
	 } else{
		 $response['error'] = true;
		 $response['message'] = "failed\n ".$conn->error;
	 }
 } else{
	 $response['error'] = true;
	 $response['message'] = "Insufficient parameters";
 }
 echo json_encode($response);