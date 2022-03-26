<?php 
include "config.php";

$id = $_GET['id'];

			$sql = "DELETE  FROM albums WHERE id ='$id'";
			$query2 =mysqli_query($con,$sql);
			// var_dump($sql);
			if($query2){

				echo "<script>alert('Album Berhasil dihapus');</script>";
				echo "<script>window.history.back();</script>";

				// $test =array($query2);
				// $result = print_r($test);
			}else{
				echo 'GAGAL Menghapus Artist';
				// echo  printf($query2);
			}
		   
	       
    
?>