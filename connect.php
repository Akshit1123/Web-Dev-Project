<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $conn = new mysqli('localhost','root','@kshit9204','avptechmod');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into complaints(username, email, message) values(?, ?, ?)");
		$stmt->bind_param("sss", $username, $email, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>