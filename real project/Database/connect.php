<?php
	$_firstName = $_POST['firstName'];
	$_lastName = $_POST['lastName'];
	$_primaryaddress = $_POST['primaryaddress'];
    $_secondaryaddress = $_POST['secondaryaddress'];
	$_email = $_POST['email'];
	$_number = $_POST['number'];

    // Database connection
	   $conn = new mysqli('localhost','root','','test');
	   if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, primaryaddress, secondaryaddress, email,  number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $primaryaddress, $secondaryaddress, $email, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>



	
	