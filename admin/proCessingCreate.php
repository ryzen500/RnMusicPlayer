<?php 
include "config.php";

if(isset($_POST['submit'])){
	$status =$_POST['status'];
	$username =$_POST['username'];
	$email =$_POST['email'];
	$firstName =$_POST['firstName'];
	$lastName =$_POST['lastName'];
    $password =md5($_POST['password']);
	$profilePic = 'assets/images/profile-pics/head_emerald.png';
	$signUpDate = date('Y-m-d');
	
			$sql = "INSERT INTO users (username, firstName,lastName,email,`password`,signUpDate,profilePic,`status`) VALUES ('$username','$firstName','$lastName','$email','$password','$signUpDate','$profilePic','$status')";
			$query2 =mysqli_query($con,$sql);
			// var_dump($sql);
			if($query2){
				echo 'FILE BERHASIL DI UPLOAD';
				echo "<script>alert('User Berhasil Dibuat');</script>";
				echo "<script>window.history.back();</script>";

				// $test =array($query2);
				// $result = print_r($test);
			}else{
				// echo 'GAGAL MENGUPLOAD FILE';
				echo  var_dump($query2);
			}
		   
	       
    }
?>