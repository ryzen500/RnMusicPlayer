<?php
	include("../includes/config.php");
	include("../includes/classes/adminAccount.php");
	include("../includes/classes/Constants.php");
	error_reporting(0);
	$adminAccount = new adminAccount($con,$_SESSION['adminLoggedIn']);

	include("handlers/register-handler.php");
	include("handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome to RnMusicPlayer!</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/register.js"></script>
</head>
<body>

<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>
	<div id="background">

	<div id="loginContainer">
	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<p>
				<!-- <?php echo $adminAccount->getError(Constants::$loginFailed); ?> -->
				<label for="loginUsername">Username</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="Your Username" value="<?php getInputValue('loginUsername') ?>" required>
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
			</p>

			<button type="submit" name="loginButton">LOG IN</button>

			<div class="hasAccountText">
			<!-- <span id="hideLogin">Dont have an account yet ?Sign up here.</span> -->
			</div>
		</form>



		<form id="registerForm" action="register.php" method="POST">
			<h2>Create your free account</h2>
			<p>
				<?php echo $adminAccount->getError(Constants::$usernameCharacters); ?>
				<?php echo $adminAccount->getError(Constants::$usernameTaken); ?>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="Your Username" value="<?php getInputValue('username') ?>" required>
			</p>

			<p>
				<?php echo $adminAccount->getError(Constants::$firstNameCharacters); ?>
				<label for="firstName">First name</label>
				<input id="firstName" name="firstName" type="text" placeholder=" Your First Name" value="<?php getInputValue('firstName') ?>" required>
			</p>

			<p>
				<?php echo $adminAccount->getError(Constants::$lastNameCharacters); ?>
				<label for="lastName">Last name</label>
				<input id="lastName" name="lastName" type="text" placeholder="Your Last Name" value="<?php getInputValue('lastName') ?>" required>
			</p>

			<p>
				<?php echo $adminAccount->getError(Constants::$emailsDoNotMatch); ?>
				<?php echo $adminAccount->getError(Constants::$emailInvalid); ?>
				<?php echo $adminAccount->getError(Constants::$emailTaken); ?>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="Your Email " value="<?php getInputValue('email') ?>" required>
			</p>

			<p>
				<label for="email2">Confirm email</label>
				<input id="email2" name="email2" type="email" placeholder="Confirm Your Email" value="<?php getInputValue('email2') ?>" required>
			</p>

			<p>
				<?php echo $adminAccount->getError(Constants::$passwordsDoNoMatch); ?>
				<?php echo $adminAccount->getError(Constants::$passwordNotAlphanumeric); ?>
				<?php echo $adminAccount->getError(Constants::$passwordCharacters); ?>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Your password" required>
			</p>

			<p>
				<label for="password2">Confirm password</label>
				<input id="password2" name="password2" type="password" placeholder="Your password" required>
			</p>

			<button type="submit" name="registerButton">SIGN UP</button>
			
			<div class="hasAccountText">
			<span id="hideRegister">Already have an account ?Log in here.</span>
			</div>
		</form>


	</div>

	<div id="loginText">
		<h1>Welcome  Admin</h1>
		<h2>in Your Own Web Music</h2>
		<ul>
			<li>Monitoring Music Data</li>
			<li>Create user And Delete </li>
			<li>Create Administrator and Delete Administrator </li>
		</ul>
	</div>

</div>
	</div>

</body>
</html>