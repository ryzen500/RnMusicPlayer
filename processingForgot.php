<?php 
include "includes/config.php";
if (isset($_POST['submit'])) {
    # code...
    $username =$_POST['username'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    if ($password == $password2 ) {
        # code...
        $encryptPassword=md5($password);
        $query="UPDATE users SET password='$encryptPassword', status='inactive' WHERE username='$username'";
        $sql = mysqli_query($con,$query);
        if ($sql) {
            # code...
            echo "suksess";
            var_dump($query);

        }
        else{
            var_dump($query);
        }
    }else{
        echo "<script>alert('Password Tidak Sama')</script>";
    }
}
?> 