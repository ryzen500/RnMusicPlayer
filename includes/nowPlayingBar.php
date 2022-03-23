<style>
	body{
	font-family: arial, verdana, sans-serif;
}

/* jwpopup box style */
.jwpopup {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 110px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.7);
}
.jwpopup-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    max-width: 500px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

.jwpopup-head {
	font-size: 11px;
    padding: 1px 16px;
    color: white;
    background: #006faa; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#006faa, #002c44); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#006faa, #002c44); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#006faa, #002c44); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#006faa, #002c44); /* Standard syntax */
}
.jwpopup-main {
	display: block;
    border: 1px solid black;
    padding: 9px;
    margin-top: 1px;
    width: 490px;
    height: 250px;
    overflow: auto;
}
.jwpopup-foot {
	font-size: 12px;
    padding: .5px 16px;
    color: #ffffff;
    background: #006faa; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#006faa, #002c44); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#006faa, #002c44); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#006faa, #002c44); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#006faa, #002c44); /* Standard syntax */
}

/* tambahkan efek animasi */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* style untuk tombol close */
.close {
	margin-top: 7px;
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover, .close:focus {
    color: #999999;
    text-decoration: none;
    cursor: pointer;
}
.text{
color: black;
}


</style>

<?php
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while($row = mysqli_fetch_array($songQuery)) {
	array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);
?>

<script>

$(document).ready(function() {
	var newPlaylist = <?php echo $jsonArray; ?>;
	audioElement = new Audio();
	setTrack(newPlaylist[0], newPlaylist, false);
	updateVolumeProgressBar(audioElement.audio);


	$("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function(e) {
		e.preventDefault();
	});


	$(".playbackBar .progressBar").mousedown(function() {
		mouseDown = true;
	});

	$(".playbackBar .progressBar").mousemove(function(e) {
		if(mouseDown == true) {
			//Set time of song, depending on position of mouse
			timeFromOffset(e, this);
		}
	});

	$(".playbackBar .progressBar").mouseup(function(e) {
		timeFromOffset(e, this);
	});


	$(".volumeBar .progressBar").mousedown(function() {
		mouseDown = true;
	});

	$(".volumeBar .progressBar").mousemove(function(e) {
		if(mouseDown == true) {

			var percentage = e.offsetX / $(this).width();

			if(percentage >= 0 && percentage <= 1) {
				audioElement.audio.volume = percentage;
			}
		}
	});

	$(".volumeBar .progressBar").mouseup(function(e) {
		var percentage = e.offsetX / $(this).width();

		if(percentage >= 0 && percentage <= 1) {
			audioElement.audio.volume = percentage;
		}
	});

	$(document).mouseup(function() {
		mouseDown = false;
	});
});

function timeFromOffset(mouse, progressBar) {
	var percentage = mouse.offsetX / $(progressBar).width() * 100;
	var seconds = audioElement.audio.duration * (percentage / 100);
	audioElement.setTime(seconds);
}

function prevSong() {
	if(audioElement.audio.currentTime >= 3 || currentIndex == 0) {
		audioElement.setTime(0);
	}
	else {
		currentIndex = currentIndex - 1;
		setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
	}
}

function nextSong() {

	if(repeat == true) {
		audioElement.setTime(0);
		playSong();
		return;
	}

	if(currentIndex == currentPlaylist.length - 1) {
		currentIndex = 0;
	}
	else {
		currentIndex++;
	}

	var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
	setTrack(trackToPlay, currentPlaylist, true);
}

// function setRepeat(){
// 	//First Method
// 	repeat = !repeat;
// 	var imageName = repeat ? "repeat-active.png" : "repeat.png";
// 	$(".controlButton.repeat img").attr("src", "assets/images/icons/" + imageName);
// 	//Second Method
// 	// if(repeat ==true){
// 	// 	repeat = false;
// 	// }else {
// 	// 	repeat = true;
// 	// }
// }
function setRepeat() {
	repeat = !repeat;
	var imageName = repeat ? "repeat-active.png" : "repeat.png";
	$(".controlButton.repeat img").attr("src", "assets/images/icons/" + imageName);
}

function setMute() {
	audioElement.audio.muted= !audioElement.audio.muted;
	var imageName = audioElement.audio.muted ? "volume-mute.png" : "volume.png";
	$(".controlButton.volume img").attr("src", "assets/images/icons/" + imageName);
}

function setShuffle() {
	shuffle = !shuffle;
	var imageName = shuffle ? "shuffle-active.png" : "shuffle.png";
	$(".controlButton.shuffle img").attr("src", "assets/images/icons/" + imageName);


	if(shuffle == true) {
		//Randomize Playlist
		shuffleArray(shufflePlaylist);
		currentIndex =shufflePlaylist.indexof(audioElement.currentPlaying.id);
	}
	else {
		//Shuffle Has been deactived
		//go back to regular 
		currentIndex =currentlyPlaylist.indexof(audioElement.currentPlaying.id);

	}
}

function shuffleArray(a) {
    var j, x, i;
    for (i = a.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = a[i - 1];
        a[i - 1] = a[j];
        a[j] = x;
    }
}

function setTrack(trackId, newPlaylist, play) {

	if(newPlaylist != currentPlaylist) {
		currentPlaylist = newPlaylist;
		shufflePlaylist = currentPlaylist.slice();
		shuffleArray(shufflePlaylist);
	}

	if(shuffle == true) {
		currentIndex = shufflePlaylist.indexOf(trackId);
	}
	else {
		currentIndex = currentPlaylist.indexOf(trackId);
	}
	pauseSong();


	$.post("includes/handlers/ajax/getSongJson.php", { songId: trackId }, function(data) {

		var track = JSON.parse(data);
		$(".trackName span").text(track.title);

		$.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist }, function(data) {
			var artist = JSON.parse(data);
			$(".trackInfo .artistName span").text(artist.name);
			$(".trackInfo .artistName span").attr("onclick", "openPage('artist.php?id=" + artist.id + "')");
		});

		$.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album }, function(data) {
			var album = JSON.parse(data);
			$(".content .albumLink img").attr("src", album.artworkPath);
			$(".content .albumLink img").attr("onclick", "openPage('album.php?id=" + album.id + "')");
			$(".trackInfo .trackName span").attr("onclick", "openPage('album.php?id=" + album.id + "')");
		});


		audioElement.setTrack(track);
		// playSong();

		if(play == true) {
			playSong();
	}
	});

}

function playSong() {

	if(audioElement.audio.currentTime == 0) {
		$.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
	}

	$(".controlButton.play").hide();
	$(".controlButton.pause").show();
	audioElement.play();
}

function pauseSong() {
	$(".controlButton.play").show();
	$(".controlButton.pause").hide();
	audioElement.pause();
}

</script>


<div id="nowPlayingBarContainer">

	<div id="nowPlayingBar">

		<div id="nowPlayingLeft">
			<div class="content">
				<span class="albumLink">
					<img role="link" tabindex="0" src="" class="albumArtwork">
				</span>

				<div class="trackInfo">

					<span class="trackName">
						<span role="link" tabindex="0"></span>
					</span>

					<span class="artistName">
						<span role="link" tabindex="0"></span>
					</span>

				</div>



			</div>
		</div>

		<div id="nowPlayingCenter">

			<div class="content playerControls">

				<div class="buttons">
					
					<button class="controlButton shuffle" title="Shuffle button" onclick="setShuffle()">
					<img src="assets/images/icons/shuffle.png" alt="Shuffle">
					</button>	


					<button class="controlButton previous" title="Previous button" onclick="prevSong()">
						<img src="assets/images/icons/previous.png" alt="Previous">
					</button>

					<button class="controlButton play" title="Play button" onclick="playSong()">
						<img src="assets/images/icons/play.png" alt="Play">
					</button>

					<button class="controlButton pause" title="Pause button" style="display: none;" onclick="pauseSong()">
						<img src="assets/images/icons/pause.png" alt="Pause">
					</button>

					<button class="controlButton next" title="Next button" onclick="nextSong()">
						<img src="assets/images/icons/next.png" alt="Next">
					</button>

					<button class="controlButton repeat" title="Repeat button" onclick="setRepeat()">
					<img src="assets/images/icons/repeat.png" alt="Repeat">
					</button>

				</div>


				<div class="playbackBar">

					<span class="progressTime current">0.00</span>

					<div class="progressBar">
						<div class="progressBarBg">
							<div class="progress"></div>
						</div>
					</div>

					<span class="progressTime remaining">0.00</span>


				</div>


			</div>


		</div>

		<div id="nowPlayingRight">
			<div class="volumeBar">

				<button class="controlButton volume" title="Volume button" onclick="setMute()">
					<img src="assets/images/icons/volume.png" alt="Volume">
				</button>

				<div class="progressBar">
					<div class="progressBarBg">
						<div class="progress"></div>
					</div>
				</div>

			</div>
		</div>

		<div id="nowPlayingRight">
			<!-- <span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo $userLoggedIn->getUsername(); ?></span> -->
			<i class="fas fa-comments" id="jwpopupLink"></i>
		</div>
		</div>
		<?php

        include "config.php";
$qshoutbox=mysqli_num_rows(mysqli_query($con,"select * from message"));
if ($qshoutbox > 0  || $qshoutbox == 0){
  echo "";      
?>
<br>
<div id="jwpopupBox" class="jwpopup">
  <!-- jwpopup content -->
  <div class='jwpopup-content'>
      
      <div class='jwpopup-head'>
          <span class="close">×</span>
          <h2 style='text-align: center;'>Welcome To Live Chat</h2>
      </div>
      <div class='jwpopup-main'>
      </div>
      <form name="formshout" id="form-input" novalidate="novalidate">	
      <div class='jwpopup-foot'>

      <label>Name </label>
         <select class="text" name="nama">
         <option class="text" value="<?php echo $userLoggedIn->getId();?>"><?php echo $userLoggedIn->getUsername(); ?></option>
         </select>

          <a onClick="addSmiley(':-)')"><img src='smiley/1.gif'></a> 
          <a onClick="addSmiley(':-(')"><img src='smiley/2.gif'></a>
          <a onClick="addSmiley(';-)')"><img src='smiley/3.gif'></a>
          <a onClick="addSmiley(';-D')"><img src='smiley/4.gif'></a>
          <a onClick="addSmiley(';;-)')"><img src='smiley/5.gif'></a>
          <a onClick="addSmiley('<:D>')"><img src='smiley/6.gif'></a>
<label>Comment</label>
  <textarea name="pesan" class="text valid" type="text" placeholder="Masukkan Pesan" onClick="addSmiley('')"></textarea>
</div>
<input class="shout" type=submit name=submit value=Kirim><input class=shout type=reset name=reset value=Reset>
</form>

</div>
</div>
<?php	}?>
	
		<!-- <p>Emot</p> -->
		

	</nav>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
<script>
	// untuk mendapatkan jwpopup
var jwpopup = document.getElementById('jwpopupBox');

// untuk mendapatkan link untuk membuka jwpopup
var mpLink = document.getElementById("jwpopupLink");

// untuk mendapatkan aksi elemen close
var close = document.getElementsByClassName("close")[0];

// membuka jwpopup ketika link di klik
mpLink.onclick = function() {
    jwpopup.style.display = "block";
}

// membuka jwpopup ketika elemen di klik
close.onclick = function() {
    jwpopup.style.display = "none";
}

// membuka jwpopup ketika user melakukan klik diluar area popup
window.onclick = function(event) {
    if (event.target == jwpopup) {
        jwpopup.style.display = "none";
    }
}

  function addSmiley(textToAdd){
  document.formshout.pesan.value += textToAdd;
  document.formshout.pesan.focus();
}


        $(document).ready(function () {
            update();
        });
        $(".shout").click(function () {
            //validasi form
            $('#form-input').validate({
                rules: {
                    nama: {
                        required: true
                    },
                    pesan: {
                        required: true
                    }
                },
                //jika validasi sukses maka lakukan
                submitHandler: function (form) {
                    $.ajax({
                        type: 'POST',
                        url: "simpanshoutbox.php",
						
                        data: $('#form-input').serialize(),
                        success: function () {
                            //setelah simpan data, update data terbaru
                            update()
                        }
                    });
                    //kosongkan form nama dan jurusan
                    // document.getElementsByClassName("text").value = "";
                    // document.getElementById("text").value = "";
                    return false;
                }
            });
        });

        //fungsi tampil data
        function update() {
            $.ajax({
                url: 'shoutbox.php',
                type: 'get',
                success: function(data) {
                    $('.jwpopup-main').html(data);
                }
            });
        }

</script>


	</div>

</div>