<?php 
include "config.php";

if(isset($_POST['submit'])){
	$id = $_GET['id'];
	$status =$_POST['status'];
	$username =$_POST['username'];
	$email =$_POST['email'];
	$firstName =$_POST['firstName'];
	$lastName =$_POST['lastName'];
    $password =md5($_POST['password']);
	$profilePic = 'assets/images/profile-pics/head_emerald.png';
	$signUpDate = date('Y-m-d');
			if (isset($_POST['ubahpassword'])) {
				# code...
				$sql = "UPDATE `users` SET username='$username', firstName='$firstName', lastName = '$lastName',  email='$email', `password`='$password', status='$status' WHERE id ='$id'";
				$query2 =mysqli_query($con,$sql);
				// var_dump($sql);
				if($query2){
					echo 'FILE BERHASIL DI UPLOAD';
					echo "<script>alert('User Berhasil Dirubah');</script>";
					echo "<script>window.history.back();</script>";
	
					// $test =array($query2);
					// $result = print_r($test);
				}else{
					echo 'GAGAL MENGUPLOAD FILE';
					// echo  printf($query2);
				}
	
			}else {
				# code...

				$sql = "UPDATE `users` SET username='$username', firstName='$firstName', lastName = '$lastName',  email='$email',  status='$status' WHERE id ='$id'";
				$query2 =mysqli_query($con,$sql);
				// var_dump($sql);
				if($query2){
					echo 'FILE BERHASIL DI UPLOAD';
					echo "<script>alert('User Berhasil Dirubah');</script>";
					echo "<script>window.history.back();</script>";
	
					// $test =array($query2);
					// $result = print_r($test);
				}else{
					echo 'GAGAL MENGUPLOAD FILE';
					// echo  printf($query2);
				}
			}
					   
	       
    }
?>