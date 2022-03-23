<?php 

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    # test The Code Come From Ajax Or Not 
    // echo"Come From AJAX";

    // We know that succes 
    include("includes/config.php");
    include("includes/classes/User.php"); 
    include("includes/classes/Artist.php"); 
    include("includes/classes/Album.php");
    include("includes/classes/Song.php");
    include("includes/classes/Playlist.php");

    if (isset($_GET['userLoggedIn'])) {
        #   Call The Data From Object 
        $userLoggedIn = new User($con, $_GET['userLoggedIn']);
    }else{
        echo "Username variable was not passed into page. Check the openPage JS function";
    }


}else{
    include('includes/header.php');
    include('includes/footer.php');

    $url=$_SERVER['REQUEST_URI'];
    echo "<script>openPage('$url')</script>";
    exit();

}


?>