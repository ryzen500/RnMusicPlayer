<?php
if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $adminAccount->login($username, $password);

	if($result == true) {
		$_SESSION['adminLoggedIn'] = $username;

		header("Location: index.php");
	}

}
?>