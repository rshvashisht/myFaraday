<?php

session_start();

include('config.php');

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$stmt = $connection->prepare("SELECT customerid, firstName, lastName, dateOfBirth, gender, mobileNumber, address1, address2, state, district, pincode, password FROM customerDetails WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

if (!$stmt) {
    die("Execute failed: " . htmlspecialchars($stmt->error));
}

$result = $stmt->get_result();
$row = $result->fetch_assoc();
$indexRedirect = "location:/index.php";
if ($result->num_rows == 1) {
    $hash = $row['password'];
    if (password_verify($password, $hash)) {
        header($indexRedirect);
        date_default_timezone_set("Asia/Kolkata");
        $time = date('Y-m-d H:i:s');
        $customerid = $row['customerid'];
        $_SESSION['loggedIn'] = true;
        $_SESSION['customerid'] = $row['customerid'];
        $_SESSION['name'] = $row['firstName'] . " " . $row['lastName'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];
        $_SESSION['dateOfBirth'] = $row['dateOfBirth'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['email'] = $email;
        $_SESSION['mobileNumber'] = $row['mobileNumber'];
        $_SESSION['address1'] = $row['address1'];
        $_SESSION['address2'] = $row['address2'];
        $_SESSION['state'] = $row['state'];
        $_SESSION['district'] = $row['district'];
        $_SESSION['pincode'] = $row['pincode'];
        $loginQuery = $connection->prepare("UPDATE customerDetails SET lastLogin = ? WHERE email = ? AND customerid = ?");
        $loginQuery->bind_param("ssi", $time, $email, $customerid);
        $loginQuery->execute();
        
    } else {
        header($indexRedirect);
        echo '<script>alert("Invalid email or password!")</script>';
        
    }
    $rehash = password_hash($password, PASSWORD_DEFAULT);
    $rehashQuery = $connection->prepare("UPDATE customerDetails SET password = ? WHERE email = ?");
    $rehashQuery->bind_param("ss", $rehash, $email);
    $rehashQuery->execute();
} else {
    header($indexRedirect);
	echo '<script>alert("Invalid email or password!")</script>';
}
$stmt->close();
$connection->close();

exit();

?>
