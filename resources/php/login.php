<?php

session_start();

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
        echo '<script>alert("Logged in successfully.")</script>';
        $time = date('Y-m-d H:i:s');
        $customerId = $row['customerid'];
        $_SESSION['loggedIn'] = true;
        $_SESSION['customerid'] = $row['customerid'];
        $_SESSION['name'] = $row['firstName'] . $row['lastName'];
        $_SESSION['dateOfBirth'] = $row['dateOfBirth'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['email'] = $email;
        $_SESSION['mobileNumber'] = $row['mobileNumber'];
        $loginQuery = "UPDATE customerDetails SET lastLogin = '$time' WHERE email = '$email' AND customerid = '$customerId'";
        header("location:/index.php");
    } else {
        echo '<script>alert("Invalid email or password!")</script>';
        
    }
    $rehash = password_hash($password, PASSWORD_DEFAULT);
    $rehashQuery = "UPDATE customerDetails SET password = '$rehash' WHERE email = '$email'";
} else {
	echo '<script>alert("Invalid email or password!")</script>';
}
$stmt->close();
$connection->close();

exit();

?>
