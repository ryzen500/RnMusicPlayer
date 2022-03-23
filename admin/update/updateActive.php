<?php

include "../config.php";


$id = $_GET['id'];
$sql = "UPDATE users SET status='Active' WHERE id = '$id'";
// $query = mysqli_query($koneksi, $sql);
$edit = mysqli_query($con,$sql);
//proses hapus gambar
// $file = "../karyawan/modul/karyawan/images/".$hapus_f['bukti'];
// unlink($file);

// $sql_h = "DELETE FROM tb_keterangan WHERE id = '$id'";
// $hapus = mysqli_query($koneksi, $sql_h);

// if ($hapus) {
// 	header("location: ../data_keterangan.php");
// }else{
// 	echo "gagal dihapus";
// }

if ($edit) {
	# code...
	// header("location: ../data_keterangan.php");
	echo"<script>alert('Succesfully for Approve Data keterangan');document.location.href='../index.php'</script>";	
//   echo  var_dump($edit);

}else {
	# code...
	echo "Gagal Approve";
}


 ?>
<script>

	// alert("TODO APPROVAL FITUR COMING SOON !!!");
	// window.history.back();
</script>

?>