<?php 
include "config.php";

$id = $_GET['id'];

			$sql = "DELETE  FROM users WHERE id ='$id'";
			$query2 =mysqli_query($con,$sql);
			// var_dump($sql);
			if($query2){
				echo 'FILE BERHASIL DI UPLOAD';
				echo "<script>alert('User Berhasil dihapus');</script>";
				// echo "<script>window.history.back();</script>";

				// $test =array($query2);
				// $result = print_r($test);
			}else{
				echo 'GAGAL MENGUPLOAD FILE';
				// echo  printf($query2);
			}
		   
	       
    
?>