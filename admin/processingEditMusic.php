<?php 
include "config.php";

if(isset($_POST['submit'])){
    $id= $_GET['id'];
	$title =$_POST['title'];
	$artist =$_POST['artist'];
	$album =$_POST['album'];
	$genre =$_POST['genre'];
	$duration =$_POST['duration'];
	$albumOrder= 0;
	$plays = 0;

	$ekstensi_diperbolehkan	= array('mp3');
	$nama = $_FILES['path']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['path']['size'];
	$file_tmp = $_FILES['path']['tmp_name'];	
	$datetime= date('Y-m-d');

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 10044070){
                $file_destination='../assets/music/'.$nama;			
			move_uploaded_file($file_tmp,$file_destination);
            $sql = "UPDATE `songs` SET title='$title', artist='$artist', album ='$album', genre='$genre', duration='$duration', `path`='assets/music/$nama', albumOrder='0', plays='0', `datetime`='$datetime' WHERE id ='$id'";
			$query2 =mysqli_query($con,$sql);
				// $test =array($query2);
				// $result = print_r($test);	
			if($query2){
				echo 'FILE BERHASIL DI UPLOAD';
				echo "<script>alert('Music berhasil Di upload');</script>";
				echo "<script>window.history.back();</script>";

			}else{
				echo 'GAGAL MENGUPLOAD FILE';
				var_dump($sql);
			}
		    }else{
			echo 'UKURAN FILE TERLALU BESAR';
		    }
	       }else{
		echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	       }
    }
?>