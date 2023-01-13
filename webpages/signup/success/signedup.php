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
		<link rel="stylesheet" type="text/css" href="/resources/common-css/util.css">
		<link rel="stylesheet" type="text/css" href="/resources/common-css/navbar.css">
		<link rel="stylesheet" type="text/css" href="/resources/common-css/loginPopup.css">
		
	
	</head>
	 
	<body>
		
		<div class="header">

			<nav class="navbar">
				<div class="logo">
					<a href="index.php"><img src="/resources/images/springdale.png"  height="75px" alt="myFaraday"></a>
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

								<li><a href="/">Dropdown 1 </a></li>

								<li><a href="/">Dropdown 2</a></li>

								<li><a href="/">Dropdown 3</a></li>

								<li><a href="/">Dropdown 4</a></li>

							</ul>

						</li>

						<li><a href="/webpages/getquote/getquote.php">Get a Quote</a></li>

						<li><a href="/webpages/contactus/contactus.php">Contact Us</a></li>
				
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
				<a href="../signup.php">Create an account</a>
				<button type="submit" class="submitLogin">Log in</button>
				
			</form>			
		</div>

		<div class="success-message">
    		<h1>Congratulations!</h1>
   			<p>Your account has been created successfully.</p>
		</div>						
	</body>

</html>