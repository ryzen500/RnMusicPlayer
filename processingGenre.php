<?php 
include "includes/config.php";

if(isset($_POST['submit'])){
	$name =$_POST['name'];

	// Creating Query 
	$sql = "INSERT INTO  genres (name) VALUES ('$name')";

	$query = mysqli_query($con, $sql);


	// Check the Query 
	if ($query) {
		# code...
		echo "<script>alert('Berhasil Tambah Genre')</script>";
	}else {
		echo "<script>alert('gagal Tambah Genre')</script>";
		
		
	}

    }else{
		die("Akses Terlarang");
	}
?>