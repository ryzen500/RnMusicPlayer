<?php 
include("includes/includedFiles.php");

if(isset($_GET['id'])){
    $artistId= $_GET['id'];
}else {
    # code...
    header("Location: index.php");
}

$artist= new Artist($con, $artistId);
?>

<div class="sectionInfo borderBottom">
    <div class="centerSection">
        <div class="artistInfo">
        <h1 class="artistName"><?php echo $artist->getName(); ?></h1>

        <div class="headerButtons">
        <button class="button yellow" onclick="playFirstSong()">PLAY</button>
        </div>
        </div>
    </div>

</div>



<div class="tracklistContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="tracklist">
		
		<?php
		$songIdArray = $artist->getSongIds();

		$i = 1;
		foreach($songIdArray as $songId) {

            // to show just 5 songs
            if ($i > 5) {
                # code...
                break;
            }
			$albumSong = new Song($con, $songId);
			$albumArtist = $albumSong->getArtist();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" .$albumSong->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'>" . $albumSong->getTitle() . "</span>
						<span class='artistName'>" . $albumArtist->getName() . "</span>
					</div>

					<div class='trackOptions'>
					<input type='hidden' class='songId' value='". $albumSong->getId() ."'>
					<img class='optionsButton'  src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
				</div>

					<div class='trackDuration'>
					<span class='duration' >".$albumSong->getDuration()."</span>
					</div


				</li>";

			$i = $i + 1;



		}

		?>



<!-- Playing song by clicking  -->

<script>
	// Call it  array song
	var tempSongIds ='<?php echo json_encode($songIdArray); ?>';
		tempPlaylist = JSON.parse(tempSongIds);
	</script>

	</ul>
	
</div>

<div class="gridViewContainer">
 <h2>ALBUMS</h2>
 <?php
 $albumQuery=mysqli_query($con, "SELECT * FROM albums WHERE artist='$artistId'");

 while($row = mysqli_fetch_array($albumQuery)){





	 echo "<div class='gridViewItem'>
	 <span role='link' tabindex='0' onclick='openPage(\"album.php?id=".$row['id']."\")'>
	 <img src='". $row['artworkPath']."'>

	 <div class='gridViewInfo'>"
			.$row['title'].
	 "</div>
	 </a>
	 </div>
	 ";



 }
 ?>

</div>


 <!-- Navbar navigation  -->
 <nav class="optionsMenu">
<input type="hidden" class="songId">
<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername());?>
</nav>