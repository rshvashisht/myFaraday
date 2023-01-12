<?php

include('config.php');

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$stmt = $connection->prepare("SELECT password FROM customerDetails WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

if (!$stmt) {
    die("Execute failed: " . htmlspecialchars($stmt->error));
}

$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($result->num_rows == 1) {
    $hash = $row['password'];
    if (password_verify($password, $hash)) {
        session_start();
        echo "Logged in successfully!";
        $_SESSION['customerid'] = $row['customerid'];
        $_SESSION['name'] = $row['firstName'] . $row['lastName'];
        $_SESSION['dateOfBirth'] = $row['dateOfBirth'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['email'] = $email;
        $_SESSION['mobileNumber'] = $row['mobileNumber'];
    } else {
        echo "Invalid email or password.";
    }
} else {
	echo "Invalid email or password.";
}

$customerId = $row['customer id'];

if (password_needs_rehash($hash, PASSWORD_DEFAULT)) {
    $rehash = password_hash($password, PASSWORD_DEFAULT);
    $rehashQuery = "UPDATE customerDetails SET password = '$rehash' WHERE email = '$email' AND customerid = '$customerId'";
}

$stmt->close();
$connection->close();

?>