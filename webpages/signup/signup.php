<?php
session_start();
?>

<!doctype html>

<html lang="en">
 
 
    <head> 
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="The Student Council Webpage of Spring Dale Senior School, Amritsar">
	    <title> myFaraday ElectroTech </title>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="/resources/js/script.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/resources/common-css/navbar.css">
		<link rel="stylesheet" type="text/css" href="/resources/common-css/util.css">
		<link rel="stylesheet" type="text/css" href="/resources/common-css/loginPopup.css">
		<link rel="stylesheet" type="text/css" href="local-css/signup.css">
		
	
	</head>
	 
	<body>
		
		<div class="header">

			<nav class="navbar">
				<div class="logo">
					<a href="/index.php"><img src="/resources/images/springdale.png" alt="myFaraday ElectroTech"  height="75px"></a>
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

						<li><a href="../about/about.php">About</a></li>

						<li class="services">

							<a href="../services/services.php">Services</a>

							<ul class="servicesDropdown">

								<li><a href="/">Dropdown 1 </a></li>

								<li><a href="/">Dropdown 2</a></li>

								<li><a href="/">Dropdown 3</a></li>

								<li><a href="/">Dropdown 4</a></li>

							</ul>

						</li>

						<li><a href="../getquote/getquote.php">Get a Quote</a></li>

						<li><a href="../contactus/contactus.php">Contact Us</a></li>
				        
						<div class="accBtn">
							<button class="accountBtn" onclick="openAccountBtnDropdown()"><img src="/resources/images/istockphoto-1161086164-170667a-removebg-preview.png" height = 75px alt="<?php
																																													if (isset($_SESSION['customerid']) && isset($_SESSION['name'])) {
																																													echo 'manage your account';
																																													} else {
																																													echo 'log in or sign up';
																																													}
																																													?>"></button>
							<ul class="accountBtnDropdown" id="accountBtnDropdownID">
								<?php
								if (!empty($_SESSION['customerid'])) {
									echo '<h2>Welcome back, ' . $_SESSION['name'] . '!</h2>' .
										 '<li><a href="/">Dropdown 1</a></li> 
										  <li><a href="/">Dropdown 2</a></li> 
										  <li><a href="/">Dropdown 3</a></li> 
										  <li><a href="/resources/php/logout.php">Log Out</a></li>';
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
		</div>

		<div class="loginPopUp" id="loginPopUpID">
	
			<form class="loginClass" name="loginForm" action="/resources/php/login.php" method="POST">

				<button type="button" class="closeLogin" onclick="closeLoginBtnPressed()">&#10006;</button>

				<h2>Login</h2>


				<label for="email"><b>Email Address</b></label>

				<input type="email" placeholder="Enter Email Address" name="email" required>


				<label for="password"><b>Password</b></label>

				<input type="password" placeholder="Enter Password" name="password" required>


				<a href="signup.php">Create an account</a>

				<button type="submit" class="submitLogin">Log in</button>
				
			</form>
			
			

		</div>

		<form class="signUpForm" name="signUpForm" action="/resources/php/signUpConnect.php" method="POST">


			<label for="firstName"><b>First Name</b></label><br>

			<input type="text" placeholder="Enter Your First Name" id="firstName" name="firstName" required><br><br>


			<label for="lastName"><b>Last Name</b></label><br>

			<input type="text" placeholder="Enter Your Last Name" id="lastName" name="lastName" required><br><br>


			<label for="dateOfBirth"><b>Date of Birth</b></label><br>
			<input type="date" name="dateOfBirth" id="dateOfBirth" required><br><br>


			<label for="gender"><b>Gender</b></label><br>

			<input type="radio" id="maleGender" name="gender" id="gender" value="m" required>
			<label for="male">Male</label><br>

			<input type="radio" id="femaleGender" name="gender" value="f">
			<label for="female">Female</label><br>

			<input type="radio" id="otherGender" name="gender" value="o">
			<label for="others">Other</label><br><br>


			<label for="email"><b>Email Address</b></label><br>

			<input type="email" placeholder="Enter Email Address" id="email" name="email" required><br><br>


			<label for="mobileNumber"><b>Mobile Number</b></label><br>

			<input type="tel"  placeholder="Enter Mobile Number" id="mobileNumber" name="mobileNumber" required><br><br>


			<label for="password"><b>Set a Password</b></label><br>

			<input type="password" placeholder="Enter a Password" id="password" name="password" required>

			<input type="checkbox" onclick="showPassword()">Show Password <br><br>


			<label for="reenterPassword"><b>Re-enter your Password</b></label><br>

			<input type="password" placeholder="Re-enter your Password" id="reenterPassword" name="reenterPassword" onkeyup="validatePassword()" required><br><br>


			<button type="submit" class="submitSignUp">SignUp</button>

		</form>

	</body>

</html>
