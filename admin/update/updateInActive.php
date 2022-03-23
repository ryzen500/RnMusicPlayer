<?php

include "../config.php";


$id = $_GET['id'];
$sql = "UPDATE users SET status='inActive' WHERE id = '$id'";
$edit = mysqli_query($con,$sql);


if ($edit) {

	echo"<script>alert('Selamat Berhasil');document.location.href='../index.php'</script>";	

}else {
	# code...
	echo "Gagal Approve";
}


 ?>
<script>


</script>

?>