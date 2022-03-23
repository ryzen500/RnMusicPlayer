<?php
include("includes/includedFiles.php");

if (isset($_GET['term'])) {
    # get the term
    $term =urldecode($_GET['term']);
    // echo $term; 
}else {
    $term="";
}
?>

 <div class="searchContainer">
     <h4>
          Search for An artist, album or song 
     </h4>
     <!-- <input type="text" class="searchInput" value="" placeholder="Start typing..." onfocus="this.value = this.value "> -->
      
     <input type="text"  class="searchInput" value="<?php echo $term; ?>" placeholder="What your Search ??" onfocus="this.value = this.value"> 
 </div>


 <!-- Script Search -->

 <script>

// $(".searchInput").focus();
// document.getElementById("search").focus();
$(function() {
    // All the process represented  by time variabel
	var timer;

	$(".searchInput").keyup(function() {
		clearTimeout(timer);

		timer = setTimeout(function() {
			var val = $(".searchInput").val();
			openPage("search.php?term=" + val);
		},1000);

	})
})

$(document).ready(function(){
        $(".searchInput").focus();
        var search = $(".searchInput").val();
        $(".searchInput").val('');
        $(".searchInput").val(search);
    })

</script>

<!-- Let's  Make Simle  Function to fix bug search if empty -->
<?php if($term == "") exit(); ?>



<div class="tracklistContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="tracklist">
		
		<?php
        $songQuery =mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%' LiMIT 10");

        if(mysqli_num_rows($songQuery)== 0){
            echo "<span class='noResults'>No Songs found Matching " .$term. "</span>";
        }

		$songIdArray = array();
        		$i = 1;
		// Looping  Data Search 
                while($row =mysqli_fetch_array($songQuery)) {

            // to show just 15 songs
            if ($i > 15) {
                # code...
                break;
            }

            array_push($songIdArray, $row['id']);

			$albumSong = new Song($con, $row['id']);
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

<div class="artistContainer borderBottom">
    <h2>ARTISTS</h2>


    <?php
    $artistQuery=mysqli_query($con, "SELECT id FROM artists WHERE NAME LIKE'$term%' LIMIT 10");

    if(mysqli_num_rows($artistQuery)== 0){
        echo "<span class='noResults'>No Artist found Matching" .$term. "</span>";
    }

    // Looping Data Search artist
    while ($row =mysqli_fetch_array($artistQuery)) {
        # code
        $artistFound = new Artist($con, $row['id']);

        echo "<div  class='searchResultRow'>
                <div class='artistName'>

                <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=".$artistFound->getId()."\")'>".$artistFound->getName()."</span>

                </div>     
                </div>";
    }

    ?>
</div>


<div class="gridViewContainer">
 <h2>ALBUMS</h2>
 <?php
 $albumQuery=mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10");

 if (mysqli_num_rows($albumQuery)   ==  0) {
     #  Code What Happen If this true 
     echo "<span class='noResults'>No Albums found Matching with " .$term . "</span>";
 }

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