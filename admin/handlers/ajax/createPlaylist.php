<?php 
include("../../config.php");


if(isset($_POST['name']) && isset($_POST['username'])) {
    # code...
    $name=$_POST['name'];
    $username= $_POST['username'];
    $date= date("Y-m-d");

    $query = mysqli_query($con, "INSERT INTO playlists VALUES('','$name','$username','$date')");
}

else{
    echo "Name or Username Parameters not passed into file";
}
?>