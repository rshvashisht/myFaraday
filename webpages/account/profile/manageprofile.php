<?php
session_start();
?>

<!doctype html>

<html lang="en">
 
 
    <head> 
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Get a Quote">
	    <title> myFaraday ElectroTech </title>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="/resources/js/script.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/resources/common-css/util.css">
		<link rel="stylesheet" type="text/css" href="/resources/common-css/navbar.css">
		<link rel="stylesheet" type="text/css" href="/resources/common-css/loginPopup.css">
		<link rel="stylesheet" type="text/css" href="/webpages/account/profile/local-css/profile.css">
	
	</head>
	 
	<body>



		<div class="header">
		
			<header>

				<nav class="navbar">
					<div class="logo">
						<a href="/index.php"><img src="/resources/images/springdale.png"  height="75px" alt="myFaraday"></a>
					</div>

					<div class="name">

						<div class="myfaraday">
							myFaraday
						</div>
						<div class="electrotech">
							ElectroTech
						</div>
					</div>	


					<ul class="nav-links">

						

						<div class="menu">

							<li><a href="/index.php">Home</a></li>

							<li><a href="/webpages/about/about.php">About</a></li>

							<li class="services">

								<a href="/webpages/services/services.php">Services</a>

								<ul class="servicesDropdown">

									<li><a href="/webpages/account/profile/manageprofile.php">Dropdown 1</a></li>

									<li><a href="/webpages/account/profile/manageprofile.php">Dropdown 2</a></li>

									<li><a href="/webpages/account/profile/manageprofile.php">Dropdown 3</a></li>

									<li><a href="/webpages/account/profile/manageprofile.php">Dropdown 4</a></li>

								</ul>

							</li>

							<li><a href="/webpages/getquote/getquote.php">Get a Quote</a></li>

							<li><a href="/webpages/contactus/contactus.php">Contact Us</a></li>
							<div class="accBtn">
								<button class="accountBtn" onclick="openAccountBtnDropdown()"><img src="/resources/images/profilepictures/default.png" height = 75px alt="<?php
																																														if (isset($_SESSION['customerid']) && isset($_SESSION['name'])) {
																																														echo 'manage your account';
																																														} else {
																																														echo 'log in or sign up';
																																														}
																																														?>"></button>
								<ul class="accountBtnDropdown" id="accountBtnDropdownID">
									<?php
									if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
										echo '<h4>Welcome back,<br>' . $_SESSION['name'] . '!</h4>' .
											'<li><a href="/webpages/account/profile/manageprofile.php">Manage Profile</a></li> 
											<li><a href="/webpages/account/manageaccount/manageaccount.php">Manage Account</a></li> 
											<li><a href="/webpages/account/requests/recentrequests.php">Recent Requests</a></li> 
											<li><a class="logOutBtn" href="/resources/php/logout.php"><u>Log Out</u></a></li>';
									} else {
										echo '<li><button class="logInButton" onclick="openLoginPopup()"><b>Log In</b></button></li>
											<li><a href="/webpages/signup/signup.php"><b>Sign Up</b></a></li>';
									}
									?>
								</ul>
							</div>	
						</div>
					</ul>
				</nav>
			</header>

			<div class="loginPopUp" id="loginPopUpID">
		
				<form class="loginClass" name="loginForm" action="/resources/php/login.php" method="POST">
					<button type="button" class="closeLogin" onclick="closeLoginBtnPressed()">&#10006;</button>
					<h2>Login</h2>
					<label for="email"><b>Email Address</b></label>
					<input type="email" placeholder="Enter Email Address" name="email" required>
					<label for="password"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="password" required>
					<a href="/webpages/signup/signup.php">Create an account</a>
					<button type="submit" class="submitLogin">Log in</button>
					
				</form>
				
				

			</div>
		
		</div>	

		<div class="main">
			
			<div class="profilepic">
				<img id="userProfilePic" src="/resources/images/profilepictures/default.png" height = 250px>				
			</div>

			<form class="profileInfo" name="profileForm" action="/resources/php/editprofile.php" method="POST">
				<label for="firstName"><b>First Name</b></label><br>

				<input type="text" placeholder="Enter Your First Name" id="firstName" name="firstName" value="<?php echo $_SESSION['firstName'];?>" required disabled><button type="button" class="editButton" id="editFirstNameButton" onclick='enableProfileEdit("firstName")'>&#128393;</button> <br><br>


				<label for="lastName"><b>Last Name</b></label><br>

				<input type="text" placeholder="Enter Your last Name" id="lastName" name="lastName" value="<?php echo $_SESSION['lastName'];?>" required disabled><button type="button" class="editButton" id="editLastNameButton" onclick='enableProfileEdit("lastName")'>&#128393;</button> <br><br>


				<label for="dateOfBirth"><b>Date of Birth</b></label><br>
				<input type="date" name="dateOfBirth" id="dateOfBirth" value="<?php echo $_SESSION['dateOfBirth'];?>" required disabled><button type="button" class="editButton" id="editDateOfBirthButton" onclick='enableProfileEdit("dateOfBirth")'>&#128393;</button> <br><br>


				<label for="gender"><b>Gender</b></label><br>
				<select name="gender" id="gender" value="<?php echo $_SESSION['gender'];?>" required disabled>
					<option value="m" id="maleGender">Male</option>
					<option value="f" id="femaleGender">Female</option>
					<option value="o" id="otherGender">Other</option>
				</select>				<button type="button" class="editButton" id="editGenderButton" onclick='enableProfileEdit("gender")'>&#128393;</button> <br><br>	

				<label for="email"><b>Email Address</b></label><br>

				<input type="email" placeholder="Enter Email Address" id="email" name="email" value="<?php echo $_SESSION['email'];?>" required disabled><button type="button" class="editButton" id="editEmailButton" onclick='enableProfileEdit("email")'>&#128393;</button> <br><br>


				<label for="mobileNumber"><b>Mobile Number</b></label><br>

				<input type="tel"  placeholder="Enter Mobile Number" id="mobileNumber" name="mobileNumber" value="<?php echo $_SESSION['mobileNumber'];?>" required disabled><button type="button" class="editButton" id="editMobileNumberButton" onclick='enableProfileEdit("mobileNumber")'>&#128393;</button> <br><br>

				<label for="address1"><b>Address 1</b></label><br>

				<input type="text" id="address1" name="address1" value="<?php echo $_SESSION['address1'];?>" required disabled><button type="button" class="editButton" id="editAddress1Button" onclick='enableProfileEdit("address1")'>&#128393;</button> <br><br>		
				
				
				<label for="address2"><b>Address 2</b></label><br>
				
				<input type="text" id="address2" name="address2" value="<?php echo $_SESSION['address2'];?>" required disabled><button type="button" class="editButton" id="editAddress2Button" onclick='enableProfileEdit("address2")'>&#128393;</button> <br><br>		
				
				
				<label for="district"><b>District</b></label><br>
				
				<input type="text"  id="district" name="district" value="<?php echo $_SESSION['district'];?>" required disabled><button type="button" class="editButton" id="editDistrictButton" onclick='enableProfileEdit("district")'>&#128393;</button> <br><br>			
				

				<label for="state"><b>State</b></label><br>
				<select name="state" id="state" value="<?php echo $_SESSION['state'];?>" required disabled>
					<option id="statePlaceholder"></option>
					<option value="AP" id="AP">Andhra Pradesh</option>
					<option value="AR" id="AR">Arunachal Pradesh</option>
					<option value="AS" id="AS">Assam</option>
					<option value="BR" id="BR">Bihar</option>
					<option value="CG" id="CG">Chattisgarh</option>
					<option value="GA" id="GA">Goa</option>
					<option value="GJ" id="GJ">Gujarat</option>
					<option value="HR" id="HR">Haryana</option>
					<option value="HP" id="HP">Himachal Pradesh</option>
					<option value="JH" id="JH">Jharkhand</option>
					<option value="KA" id="KA">Karnataka</option>
					<option value="KL" id="KL">Kerala</option>
					<option value="MP" id="MP">Madhya Pradesh</option>
					<option value="MH" id="MH">Maharashtra</option>
					<option value="MN" id="MN">Manipur</option>
					<option value="ML" id="ML">Meghalya</option>
					<option value="MZ" id="MZ">Mizoram</option>
					<option value="NL" id="NL">Nagaland</option>
					<option value="OR" id="OR">Odisha</option>
					<option value="PB" id="PB">Punjab</option>
					<option value="RJ" id="RJ">Rajasthan</option>
					<option value="SK" id="SK">Sikkim</option>
					<option value="TS" id="TS">Telangana</option>
					<option value="TN" id="TN">Tamil Nadu</option>
					<option value="TR" id="TR">Tripura</option>
					<option value="UK" id="UK">Uttarakhand</option>
					<option value="UP" id="UP">Uttar Pradesh</option>
					<option value="WB" id="WB">West Bengal</option>
					<option value="AN" id="AN">Andaman and Nicobar Islands</option>
					<option value="CH" id="CH">Chandigarh</option>
					<option value="DN" id="DN">Dadra and Nagar Haveli</option>
					<option value="DD" id="DD">Daman and Diu</option>
					<option value="DL" id="DL">Delhi</option>
					<option value="JK" id="JK">Jammu and Kashmir</option>
					<option value="LA" id="LA">Ladakh</option>
					<option value="LD" id="LD">Lakshadweep</option>
					<option value="PY" id="PY">Puducherry</option>

				</select>				<button type="button" class="editButton" id="editStateButton" onclick='enableProfileEdit("state")'>&#128393;</button> <br><br>


				<label for="pincode"><b>Pincode</b></label><br>
				
				<input type="number"  id="pincode" name="pincode" min="100000" max="999999" value="<?php echo $_SESSION['pincode'];?>" required disabled><button type="button" class="editButton" id="editPincodeButton" onclick='enableProfileEdit("pincode")'>&#128393;</button> <br><br>


				<label for="password"><b>Password</b></label><br>

				<input type="password" id="password" name="password" required disabled><button type="button" class="editButton" id="editPasswordButton" onclick='enableProfileEdit("password")'>&#128393;</button><br><br>
				
				<div id=reenterPass>
					<label for="confirmPassword"><b>Confirm New Password</b></label><br>

					<input type="password" id="reenterPassword" name="reenterPassword" onkeyup="validatePassword()" required disabled><button type="button" class="editButton" id="editPasswordButton" onclick='enableProfileEdit("password")'>&#128393;</button><br><br>
				</div>						
				<button type="button" onclick="openConfirmEdit()" class="submitEdit" id="submitEditBtn">Submit</button>

				<div class="editConfirmPopUp" id="editConfirmPopUpID">
						<button type="button" class="closeConfirmEdit" onclick="closeConfirmEditBtnPressed()">&#10006;</button>
						<h2>Confirm Edits</h2>
						<label for="currentPassword"><b>Current Password</b></label>
						<input type="password" placeholder="Enter Current Password" name="currentPassword" required>
						<button type="submit" onclick="closeConfirmEditBtnPressed()" class="submitEditConfirm">Confirm All Edits</button>	
				</div>
			</form>							
		</div>
	</body>
</html>