<?php 
include "config.php";

if(isset($_POST['submit'])){
	$title =$_POST['title'];
	$artist =$_POST['artist'];
	$genre =$_POST['genre'];

	$ekstensi_diperbolehkan	= array('png','jpeg','jpg');
	$nama = $_FILES['artworkPath']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['artworkPath']['size'];
	$file_tmp = $_FILES['artworkPath']['tmp_name'];	
	$datetime= date('Y-m-d');

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 10044070){			
			move_uploaded_file($file_tmp,'../assets/music/'.$nama);
			$query2 =mysqli_query($con,"INSERT INTO albums (title,artist,genre,`artworkPath`,`date`) VALUES ('$title','$artist','$genre','assets/images/$nama','$datetime')");
				// $test =array($query2);
				// $result = print_r($test);	
			if($query2){
				echo 'FILE BERHASIL DI UPLOAD';
				echo "<script>alert('Albums berhasil Di upload');</script>";
				echo "<script>window.history.back();</script>";

			}else{
				echo 'GAGAL MENGUPLOAD FILE';
				// echo  printf($query2);
			}
		    }else{
			echo 'UKURAN FILE TERLALU BESAR';
		    }
	       }else{
		echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	       }
    }
?>