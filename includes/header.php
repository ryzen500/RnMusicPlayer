<?php
include("includes/config.php");
include("includes/classes/User.php"); 
include("includes/classes/Artist.php"); 
include("includes/classes/Album.php");
include("includes/classes/Song.php");
include("includes/classes/Playlist.php");


// For call it off  error
error_reporting(0);
//session_destroy(); LOGOUT
// Session 
if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = new User($con,$_SESSION['userLoggedIn']);

	$username= $userLoggedIn->getUsername();
	echo "<script>userLoggedIn='$username';</script>";
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to Tsanytify!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navBarContainer.php"); ?>

			<div id="mainViewContainer">

				<div id="mainContent">