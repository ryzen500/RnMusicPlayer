<?php 
include "config.php";

if(isset($_POST['submit'])){
	$id = $_GET['id'];
    $name = $_POST['name'];
    $signUpDate = date('Y-m-d H:i:s');
	
			$sql = "UPDATE `genres` SET `name`='$name', `datetime`='$signUpDate'  WHERE `id` ='$id'";
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
?>