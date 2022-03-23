<?php
include "includes/config.php";

// $shoutbox=mysqli_query($con,"SELECT * FROM message WHERE status='Y' ORDER BY id DESC LIMIT 10");
$shoutbox=mysqli_query($con,"SELECT message.id, users.username, message.status, message.pesan , message.tanggal, message.jam FROM message INNER JOIN users ON message.nama=users.id;");

while($d=mysqli_fetch_array($shoutbox)){
  $pesan = $d['pesan'];
  $pesan = str_replace(":-)", "<img src=\"smiley/1.gif\">", $pesan);
  $pesan = str_replace(":-(", "<img src=\"smiley/2.gif\">", $pesan);
  $pesan = str_replace(";-)", "<img src=\"smiley/3.gif\">", $pesan);
  $pesan = str_replace(";-D", "<img src=\"smiley/4.gif\">", $pesan);
  $pesan = str_replace(";;-)", "<img src=\"smiley/5.gif\">", $pesan);
  $pesan = str_replace("<:D>", "<img src=\"smiley/6.gif\">", $pesan);

      // Apabila ada link website diisi, tampilkan dalam bentuk link   
 	    // if ($d['website']!=''){
      //   echo "<span class=shout><b><a href='http://$d[website]' target='_blank'>$d[nama]</a> : </b></span>";  
	    // }
	    // else{
      //   echo "<span class=shout><b>$d[nama] : </b></span>";  
      // }
        echo "<span class=shout><b>$d[username] : </b></span>";  
echo "<span class=shout>$pesan</span><br />";
echo "<span class=shoutdate>$d[tanggal]/$d[jam] WIB</span>";
echo "<hr color=#e0cb91 noshade=noshade />";
}
?>
