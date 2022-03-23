<?php

include("../../config.php");

if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
    # code...
    $playlistId = $_POST['playlistId'];

    $songId= $_POST['songId'];


    // query
    $query= mysqli_query($con, "DELETE FROM playlistSongs WHERE playlistId='$playlistId' AND songId='$songId'");
}else{

    echo"PlaylistId Or SongId was not passed into removeFromPlaylist.php";
}


?>