<?php 
include "includes/config.php";

if(isset($_POST['submit'])){
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
// 	if (move_uploaded_file($file_tmp, 'assets/music/'.$nama)) {
// 		# code...
// 		$sql ="INSERT INTO songs (title,artist,album,genre,duration,`path`,albumOrder,plays) VALUES ('$title','$artist','$album','$genre','$duration','assets/music/$nama',$albumOrder,$plays)";
// 			$query =mysqli_query($con,$sql);
		
// 		if($query) {
// 			echo "<script>alert('Music berhasil Di upload');</script>";
// 			echo "<script>window.history.back();</script>";
// 		}else{
// 			var_dump($sql);
// 			var_dump($query);
// // var_dump($title,$album,$artist,$genre,$duration,$nama,$albumOrder,$plays);
// 		}
	
// 	}else {
// 		$result =array($query);
// 		echo print_r($result);
// 	}

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 10044070){			
			move_uploaded_file($file_tmp,'assets/music/'.$nama);
			$query2 =mysqli_query($con,"INSERT INTO songs (id,title,artist,album,genre,duration,`path`,albumOrder,plays,`datetime`) VALUES ('','$title','$artist','$album','$genre','$duration','assets/music/$nama','0','0', '$datetime')");
				// $test =array($query2);
				// $result = print_r($test);	
			if($query2){
				echo 'FILE BERHASIL DI UPLOAD';
				echo "<script>alert('Music berhasil Di upload');</script>";
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