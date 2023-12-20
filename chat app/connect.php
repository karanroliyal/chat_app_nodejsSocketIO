<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	// $gender = $_POST['gender'];
	// $number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into regisration(firstName, lastName , password, email ) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $lastName, , $password , $email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>