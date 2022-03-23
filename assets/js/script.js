var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
var timer;

$(document).click(function(click) {
	var target = $(click.target);

	if(!target.hasClass("item") && !target.hasClass("optionsButton")) {
		hideOptionsMenu();
	}
});

$(window).scroll(function() {
	hideOptionsMenu();
});

$(document).on("change", "select.playlist", function() {
	var select = $(this);
	var playlistId = select.val();
	var songId = select.prev(".songId").val();

	$.post("includes/handlers/ajax/addToPlaylist.php", { playlistId: playlistId, songId: songId})
	.done(function(error) {

		if(error != "") {
			alert(error);
			return;
		}

		hideOptionsMenu();
		select.val("");
	});
});
  
function openPage(url){

	// make Decison With If Statements To Fix Bug Search By Time 
	if(timer != null){
		clearTimeout(timer);
	}

	if(url.indexOf("?")== -1){
		url = url + "?";
	}

	var encodedUrl = encodeURI(url +"&userLoggedIn=" + userLoggedIn);
	// Test encodedUrl
	console.log(encodedUrl);
	$("#mainContent").load(encodedUrl);
	
	$("body").scrollTop(0);
	history.pushState(null,null, url);
}


// logout function 

function logout(){
	$.post("includes/handlers/ajax/logout.php", function() {
		location.reload();
	});
}


// Email Function 
function updateEmail(emailClass) {
	var emailValue = $("." + emailClass).val();

	$.post("includes/handlers/ajax/updateEmail.php", { email: emailValue, username: userLoggedIn})
	.done(function(response) {
		$("." + emailClass).nextAll(".message").text(response);
	});


}

// Password Function
function updatePassword(oldPasswordClass, newPasswordClass1, newPasswordClass2) {
	var oldPassword = $("." + oldPasswordClass).val();
	var newPassword1 = $("." + newPasswordClass1).val();
	var newPassword2 = $("." + newPasswordClass2).val();

	$.post("includes/handlers/ajax/updatePassword.php", 
		{ oldPassword: oldPassword,
			newPassword1: newPassword1,
			newPassword2: newPassword2, 
			username: userLoggedIn})

	.done(function(response) {
		$("." + oldPasswordClass).nextAll(".message").text(response);
	})

}// remove song From Playlist

function removeFromPlaylist(button, playlistId) {
	var songId = $(button).prevAll(".songId").val();

	// Ajax
	$.post("includes/handlers/ajax/removeFromPlaylist.php", {playlistId: playlistId, songId:songId})
		.done(function(error){

			// The Condition If Error 
			if (error != "") {
				// alert(error);
				return;
			}


			// Do something When AJAX returns
			openPage("playlist.php?id=" + playlistId );
		});
}


// This Function For Delete Playlist
function deletePlaylist(playlistId){
	// Declare Some Variabel  for popup Our Notification 

	 var popup = confirm("Are you Sure  Want to Delete this Playlist");

	//  We Will Make Decision For this 
	if (popup == true) {
		// console.log("Delete Success");
		$.post("includes/handlers/ajax/deletePlaylist.php", {playlistId: playlistId})
		.done(function(error){

			// The Condition If Error 
			if (error != "") {
				// alert(error);
				return;
			}


			// Do something When AJAX returns
			openPage("yourMusic.php");
		});
	}
}
// This function for Hide 

function hideOptionsMenu(){
	var menu = $(".optionsMenu");
	if (menu.css("display") != "none") {
		menu.css("display", "none");
	}
}


// This Function for Show 
function showOptionsMenu(button) {
	var songId = $(button).prevAll(".songId").val();
	var menu = $(".optionsMenu");
	var menuWidth = menu.width();
	menu.find(".songId").val(songId);

	var scrollTop = $(window).scrollTop(); //Distance from top of window to top of document
	var elementOffset = $(button).offset().top; //Distance from top of document

	var top = elementOffset - scrollTop;
	var left = $(button).position().left;

	menu.css({ "top": top + "px", "left": left - menuWidth + "px", "display": "inline" });
}


// This Function For create Playlist 

function createPlaylist(){
	console.log(userLoggedIn);
	// To make Notification
	var notif =prompt("Please Enter the Name Of Your  Playlist"); 

// var notif = Swal.fire({
// 	input: 'text',
// 	inputLabel: 'Masukkan Nama Playlist yang ingin anda buat'
//   })
  

	// if notif == true 
	if (notif != null) {
		// console.log(alert);
		$.post("includes/handlers/ajax/createPlaylist.php", {name:notif, username:userLoggedIn})
		.done(function(error){

			// The Condition If Error 
			if (error != "") {
				alert(error);
				return;
			}


			// Do something When AJAX returns
			openPage("yourMusic.php");
		});
	}
}


function formatTime(seconds) {
	var time = Math.round(seconds);
	var minutes = Math.floor(time / 60); //Rounds down
	var seconds = time - (minutes * 60);

	var extraZero = (seconds < 10) ? "0" : "";

	return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio) {
	$(".progressTime.current").text(formatTime(audio.currentTime));
	$(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

	var progress = audio.currentTime / audio.duration * 100;
	$(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio) {
	var volume = audio.volume * 100;
	$(".volumeBar .progress").css("width", volume + "%");
}

function playFirstSong() {
	setTrack(tempPlaylist[0],tempPlaylist, true);
}

function Audio() {

	this.currentlyPlaying;
	this.audio = document.createElement('audio');

	this.audio.addEventListener("ended", function () {
		nextSong();
	})

	this.audio.addEventListener("canplay", function() {
		//'this' refers to the object that the event was called on
		var duration = formatTime(this.duration);
		$(".progressTime.remaining").text(duration);
		updateVolumeProgressBar(this);
	});

	this.audio.addEventListener("timeupdate", function(){
		if(this.duration) {
			updateTimeProgressBar(this);
		}
	});

	this.audio.addEventListener("volumechange", function() {
		updateVolumeProgressBar(this);
	});

	this.setTrack = function(track) {
		this.currentlyPlaying = track;
		this.audio.src = track.path;
	}

	this.play = function() {
		this.audio.play();
	}

	this.pause = function() {
		this.audio.pause();
	}

	this.setTime = function(seconds) {
		this.audio.currentTime = seconds;
	}

}