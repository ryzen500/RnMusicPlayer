<?php 
include "config.php";

if(isset($_POST['submit'])){
	$title =$_POST['title'];
	$artist =$_POST['artist'];
	$genre =$_POST['genre'];

	$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	$nama = $_FILES['artworkPath']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['artworkPath']['size'];
	$file_tmp = $_FILES['artworkPath']['tmp_name'];	
	$datetime= date('Y-m-d');

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 10044070){
                $file_destination='../assets/images/'.$nama;			
			move_uploaded_file($file_tmp,$file_destination);
            $sql = "INSERT INTO albums (title,artist,genre,artWorkPath,`date`) VALUES ('$title','$artist','$genre','assets/images/artwork/$nama','$datetime')";
			$query2 =mysqli_query($con,$sql);
				// $test =array($query2);
				// $result = print_r($test);	
			if($query2){
				echo 'FILE BERHASIL DI UPLOAD';
				echo "<script>alert('Album berhasil Di upload');</script>";
				echo "<script>window.history.back();</script>";

			}else{
				echo 'GAGAL MENGUPLOAD FILE';
				// var_dump($sql);
			}
		    }else{
			echo 'UKURAN FILE TERLALU BESAR';
		    }
	       }else{
		echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	       }

    }
?>