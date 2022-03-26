<?php
include "includes/config.php";
include "library.php";

$nama=trim($_POST['nama']);
$pesan=trim($_POST['pesan']);
// var_dump($nama);
if (empty($nama)){
  echo "Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($pesan)){
  echo "Anda belum mengisikan PESAN<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (strlen($_POST['pesan']) > 100) {
  echo "PESAN Anda kepanjangan, dikurangin atau dibagi jadi beberapa bagian.<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
else{
// function anti_injection($data){
//   $filter = mysqli_real_escape_string($data,stripslashes(strip_tags(htmlspecialchars($data,json_encode(ENT_QUOTES)))));
//   return $filter;
// }

// $nama = anti_injection($conn,$_POST['nama']);
// $website = anti_injection($conn,$_POST['website']);
// $pesan = anti_injection($conn,$_POST['pesan']);



$nama = $_POST['nama'];
// $website =$_POST['website'];
$pesan = $_POST['pesan'];
$status ='y';

$kueri = mysqli_query($con,"INSERT INTO message(nama, pesan, tanggal, jam,status)
          VALUES('$nama', '$pesan', '$tgl_sekarang','$jam_sekarang', '$status')");
// var_dump($kueri);
}

?>
