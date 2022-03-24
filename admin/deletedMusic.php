<?php 
include "config.php";

$id = $_GET['id'];

			$sql = "DELETE  FROM songs WHERE id ='$id'";
			$query2 =mysqli_query($con,$sql);
			// var_dump($sql);
			if($query2){

				echo "<script>alert('Music Berhasil dihapus');</script>";
				echo "<script>window.history.back();</script>";

				// $test =array($query2);
				// $result = print_r($test);
			}else{
				echo 'GAGAL Menghapus Music';
				// echo  printf($query2);
			}
		   
	       
    
?>