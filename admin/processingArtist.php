<?php 
include "config.php";

if(isset($_POST['submit'])){
	$name =$_POST['name'];
	$datetime = date('Y-m-d');
	// Creating Query 
	$sql = "INSERT INTO  artists (name, date) VALUES ('$name','$datetime')";

	$query = mysqli_query($con, $sql);


	// Check the Query 
	if ($query) {
		# code...
		echo "<script>alert('Berhasil Tambah Artist')</script>";
		echo "<script>window.history.back();</script>";
	}else {
		echo "<script>alert('gagal Tambah Artist')</script>";
		
		
	}

    }else{
		die("Akses Terlarang");
	}
?>