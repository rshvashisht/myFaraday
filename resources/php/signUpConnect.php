<?php
include("config.php");

$path = realpath("myFaraday/php/signUpConnect.php");

$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$dateOfBirth = filter_input(INPUT_POST, 'dateOfBirth');
$gender = filter_input(INPUT_POST, 'gender');
$email = filter_input(INPUT_POST, 'email');
$mobileNumber = filter_input(INPUT_POST, 'mobileNumber');
$passwordSignUp = filter_input(INPUT_POST, 'password');
$hash = password_hash($passwordSignUp, PASSWORD_DEFAULT);

if (mysqli_connect_error()) {
	die('Connection Error (' . mysqli_connect_errno() . ')'
	. mysqli_connect_error());
} else {
	$sql = "INSERT INTO customerDetails (firstName, lastName, dateOfBirth, gender, email, mobileNumber, password)  values ('$firstName', '$lastName', '$dateOfBirth', '$gender', '$email', '$mobileNumber', '$hash')";
	
	if ($connection->query($sql)){
		echo "New account has been created successfully.";
	} else {
		echo "Error:" . $sql . "<br>" . $connection->error;
	}
	$connection->close();

	
}


?>