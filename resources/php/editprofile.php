<?php
session_start();
include("config.php");

$customerid = $_SESSION['customerid'];
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$dateOfBirth = filter_input(INPUT_POST, 'dateOfBirth');
$gender = filter_input(INPUT_POST, 'gender');
$email = filter_input(INPUT_POST, 'email');
$mobileNumber = filter_input(INPUT_POST, 'mobileNumber');
$address1 = filter_input(INPUT_POST, 'address1');
$address2 = filter_input(INPUT_POST, 'address2');
$state = filter_input(INPUT_POST, 'state');
$district = filter_input(INPUT_POST, 'district');
$pincode = filter_input(INPUT_POST, 'pincode');
$newPassword = filter_input(INPUT_POST, 'password');
$currentPassword = filter_input(INPUT_POST, 'currentPassword');

$stmt = $connection->prepare("SELECT password FROM customerDetails WHERE customerid = ?");
$stmt->bind_param("i", $customerid);
$stmt->execute();


if (!$stmt) {
    die("Execute failed: " . htmlspecialchars($stmt->error));
}

$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (mysqli_connect_error()) {
      die('Connection Error (' . mysqli_connect_errno() . ')'
     . mysqli_connect_error());
 } else {
    if ($result->num_rows == 1) {
        $hash = $row['password'];
        if (password_verify($currentPassword, $hash)) {
            if ($firstName != null) {
                $firstNameQuery = $connection->prepare("UPDATE customerDetails SET firstName = ? WHERE customerid = ?");
                $firstNameQuery->bind_param("si", $firstName, $customerid);
                $firstNameQuery->execute();
                if($firstNameQuery->affected_rows > 0) {
                    $_SESSION['firstName'] = $firstName;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
                
            }
            if ($lastName != null) {
                $lastNameQuery = $connection->prepare("UPDATE customerDetails SET lastName = ? WHERE customerid = ?");
                $lastNameQuery->bind_param("si", $lastName, $customerid);
                $lastNameQuery->execute();
                if($lastNameQuery->affected_rows > 0) {
                    $_SESSION['firstName'] = $firstName;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
            }
            if ($dateOfBirth != null) {
                $dateOfBirthQuery = $connection->prepare("UPDATE customerDetails SET dateOfBirth = ? WHERE customerid = ?");
                $dateOfBirthQuery->bind_param("si", $dateOfBirth, $customerid);
                $dateOfBirthQuery->execute();
                if($dateOfBirthQuery->affected_rows > 0) {
                    $_SESSION['lastName'] = $lastName;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
            }

            if($lastNameQuery->affected_rows > 0 && $firstNameQuery->affected_rows > 0) {
                $_SESSION['name'] = $firstName . " " . $lastName;
             }

            if ($gender != null) {
                $genderQuery = $connection->prepare("UPDATE customerDetails SET gender = ? WHERE customerid = ?");
                $genderQuery->bind_param("si", $gender, $customerid);
                $genderQuery->execute();
                if($genderQuery->affected_rows > 0) {
                    $_SESSION['gender'] = $gender;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
            }
            if ($email != null) {
                $emailQuery = $connection->prepare("UPDATE customerDetails SET email = ? WHERE customerid = ?");
                $emailQuery->bind_param("si", $email, $customerid);
                $emailQuery->execute();
                if($emailQuery->affected_rows > 0) {
                    $_SESSION['email'] = $email;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
            }
            if ($mobileNumber != null) {
                $mobileNumberQuery = $connection->prepare("UPDATE customerDetails SET mobileNumber = ? WHERE customerid = ?");
                $mobileNumberQuery->bind_param("ii", $mobileNumber, $customerid);
                $mobileNumberQuery->execute();
                if($mobileNumberQuery->affected_rows > 0) {
                    $_SESSION['mobileNumber'] = $mobileNumber;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
            }
            if ($address1 != null) {
                $address1Query = $connection->prepare("UPDATE customerDetails SET address1 = ? WHERE customerid = ?");
                $address1Query->bind_param("si", $address1, $customerid);
                $address1Query->execute();
                if($address1Query->affected_rows > 0) {
                    $_SESSION['address1'] = $address1;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
            }
            if ($address2 != null) {
                $address2Query = $connection->prepare("UPDATE customerDetails SET address2 = ? WHERE customerid = ?");
                $address2Query->bind_param("si", $address2, $customerid);
                $address2Query->execute();
                if($address2Query->affected_rows > 0) {
                    $_SESSION['address2'] = $address2;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
            }
            if ($state != null) {
                $stateQuery = $connection->prepare("UPDATE customerDetails SET state = ? WHERE customerid = ?");
                $stateQuery->bind_param("si", $state, $customerid);
                $stateQuery->execute();
                if($state->affected_rows > 0) {
                    $_SESSION['state'] = $state;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
            }
            if ($district != null) {
                $districtQuery = $connection->prepare("UPDATE customerDetails SET district = ? WHERE customerid = ?");
                $districtQuery->bind_param("si", $district, $customerid);
                $districtQuery->execute();
                if($districtQuery->affected_rows > 0) {
                    $_SESSION['district'] = $district;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
            }
            if ($pincode != null) {
                $pincodeQuery = $connection->prepare("UPDATE customerDetails SET pincode = ? WHERE customerid = ?");
                $pincodeQuery->bind_param("si", $pincode, $customerid);
                $pincodeQuery->execute();
                if($pincodeQuery->affected_rows > 0) {
                    $_SESSION['pincode'] = $pincode;
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 };
            }
            if ($newPassword != null) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $passwordQuery = $connection->prepare("UPDATE customerDetails SET password = ? WHERE customerid = ?");
                $passwordQuery->bind_param("si", $hash, $customerid);
                $passwordQuery->execute();
                if($passwordQuery->affected_rows > 0) {
                    echo "Update Successful";
                    header("location:/webpages/account/profile/manageprofile.php");
                 } else {
                    echo "Update Failed";
                 }
            }
        } else {
            echo "Incorrect Password!";
        }   
    } else {
        echo "Error";
    }

}
$connection->close();

exit();


?>