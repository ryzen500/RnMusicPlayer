<?php 
include "config.php";

if(isset($_POST['submit'])){
	$id = $_GET['id'];
	// $status =$_POST['status'];
	$username =$_POST['username'];
	$email =$_POST['email'];
	$firstName =$_POST['firstName'];
	$lastName =$_POST['lastName'];
    $password =md5($_POST['password']);
	$profilePic = 'assets/images/profile-pics/head_emerald.png';
	$signUpDate = date('Y-m-d H:i:s');
    $descripsi = $_POST['descripsi'];
	
			$sql = "UPDATE `admin` SET username='$username', firstName='$firstName', lastName = '$lastName', `password`='$password', signUpDate='$signUpDate',profilePic='$profilePic', descripsi= '$descripsi' WHERE id ='$id'";
			$query2 =mysqli_query($con,$sql);
			// var_dump($sql);
			if($query2){
				echo 'FILE BERHASIL DI UPLOAD';
				echo "<script>alert('Admin Berhasil Dirubah');</script>";
				echo "<script>window.history.back();</script>";

				// $test =array($query2);
				// $result = print_r($test);
			}else{
                var_dump($sql);
				echo 'GAGAL MENGUPLOAD FILE';
				// echo  printf($query2);
			}
		   
	       
    }
?>