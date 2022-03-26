<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<h1 class="text-center">Artist Data</h1>
<table class="table table-bordered">
<thead>
 <tr>
 <th scope='col'>No</th>
 <th scope='col'> Profile Picture </th>
 <th scope='col'> Username </th>
 <th scope='col'> First Name </th>
 <th scope='col'> Last Name </th>
 <th scope='col'> Email </th>
 <th scope='col'> Sign Up Date </th>
 </tr>
 </thead>
<?php
include "config.php";
// $sql = "select * from songs (tgl between '$_POST[dari]' and '$_POST[sampai]')";
// $sql = "select * from songs (time between '$_POST[dari]' and '$_POST[sampai]')";
$sql ="select * from users WHERE signUpDate BETWEEN '$_POST[dari]' and '$_POST[sampai]'";

$query=mysqli_query($con,$sql);
$cek = mysqli_num_rows($query);
if (empty($cek)){
echo '<script>alert(\'Data Tidak Ada\')
 window.close()</script>';
}else {
    # code...
    echo "<script>window.print();</script>";
}

$no=1;
while($r=mysqli_fetch_array($query)){ 

?>

 <tbody>
 <tr>
   <td><?php echo $no++;?></td>
   <td> <img src="<?php echo $r['profilePic'];?>"></td>
   <td><?php echo $r['username'];?></td>
   <td><?php echo $r['firstName'];?></td>
   <td><?php echo $r['lastName'];?></td>
   <td><?php echo $r['email'];?></td>
   <td><?php echo $r['signUpDate'];?></td>
   </tr>
</tbody>


<?php }?>
</table>

