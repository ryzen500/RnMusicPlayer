<?php 
include "includes/config.php";

if(isset($_POST['submit'])){
	$name =$_POST['name'];
	$datetime = date('Y-m-d');
	// Creating Query 
	$sql = "INSERT INTO  genres (name, datetime) VALUES ('$name','$datetime')";

	$query = mysqli_query($con, $sql);


	// Check the Query 
	if ($query) {
		# code...
		echo "<script>alert('Berhasil Tambah Genre')</script>";
		echo "<script>window.history.back();</script>";
	}else {
		echo "<script>alert('gagal Tambah Genre')</script>";
		
		
	}

    }else{
		die("Akses Terlarang");
	}
?>