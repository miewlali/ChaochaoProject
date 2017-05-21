<?php
	$con=mysqli_connect("127.0.0.1","root","","chaochao");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$fullname = mysqli_real_escape_string($con, $_POST['fullname']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$address = mysqli_real_escape_string($con, $_POST['address']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$type = mysqli_real_escape_string($con, $_POST['type']);

	$sql="INSERT INTO member ( username, password, name, email, type, address)
	VALUES ('$username', '$password','$fullname','$email','$type','$address')";
	
	mysqli_query($con, $sql);

	echo "1 record added";
	mysqli_close($con);

?>
