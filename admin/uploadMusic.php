<?php 
//Can't redeclare twice header 
include ("header.php");

// include "../includes/Classes/Song.php";
// include ("includedFiles.php");

?>

	<link rel="stylesheet" type="text/css" href="css/music.css">


    <!-- <h1 class="pageHeadingBig">Upload Music </h1> -->


<!-- $sql = "INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES (NULL, \'bensound cute\', \'6\', \'3\', \'4\', \'03:14\', \'assets/music/bensound-cute.mp3\', \'\', \'\')"; -->
    <div class="login-box">
  <form action="../processing.php" method="POST"  enctype="multipart/form-data">

  <?php if ($insertProduct) {
    # code...
    echo $insertProduct;
    var_dump($insertProduct);

  } ?>

<div class="signup-container">
  <!-- <div class="left-container">
    <h1>
      <i class="fas fa-paw"></i>
      <h2>Upload Music</h2>
    </h1>
    <div class="puppy">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-542207-jpeg.png"/>
    </div>
  </div> -->
  <div class="right-container">
    <header>
      <h1>Let's Add More Music !! </h1>
      <div class="set">
        <div class="pets-name">
          <label >Name title</label>
          <input id="pets-name" name="title" placeholder="Music Title" type="text"></input>
        </div>
        <div class="pets-photo">
          <button id="pets-upload" name="path">
            <i class="fas fa-camera-retro"></i>
          </button>
          <label for="pets-upload">Upload a Music</label>
        </div>
      </div>
      <div class="set">
        <div class="pets-breed">
          <label for="pets-breed">Artist</label>
          <input id="pets-breed" name="artist" placeholder="Pet's breed" type="text"></input>
        </div>
      </div>
      
      <div class="set">
        <div class="pets-breed">
          <label for="pets-breed">Album </label>
          <input id="pets-breed" name="album" placeholder="Pet's breed" type="text"></input>
        </div>
      </div>


      
      <div class="set">
        <div class="pets-breed">
          <label for="pets-breed">genre</label>
          <input id="pets-breed" name="genre" placeholder="Pet's breed" type="text"></input>
        </div>
      </div>

      
      <div class="set">
        <div class="pets-breed">
          <label for="pets-breed">Duration</label>
          <input id="pets-breed" name="duration" placeholder="Pet's breed" type="text"></input>
        </div>
      </div>
      <div class="set">
        <div class="pets-gender">
          <label for="pet-gender-female"> Open Live Chat ? </label>
          <div class="radio-container">
            <input id="pet-gender-female" name="" type="radio" value="yes"></input>
            <label for="pet-gender-female">Yes</label>
            <input id="pet-gender-male" name="" type="radio" value="no"></input>
            <label for="pet-gender-male">No</label>
          </div>
        </div>

      </div>
      <!-- <div class="pets-weight">
        <label for="pet-weight-0-25">Weight</label>
        <div class="radio-container">
          <input id="pet-weight-0-25" name="pet-weight" type="radio" value="0-25"></input>
          <label for="pet-weight-0-25">0-25 lbs</label>
          <input id="pet-weight-25-50" name="pet-weight" type="radio" value="25-50"></input>
          <label for="pet-weight-25-50">25-50 lbs</label>
          <input id="pet-weight-50-100" name="pet-weight" type="radio" value="50-100"></input>
          <label for="pet-weight-50-100">50-100 lbs</label>
          <input id="pet-weight-100-plus" name="pet-weight" type="radio" value="100+"></input>
          <label for="pet-weight-100-plus">100+ lbs</label>
        </div>
      </div>
    </header> -->
    <footer>
      <div class="set">
        <button id="back">Back</button>
        <button id="next">Upload</button>
      </div>
    </footer>
  </div>
</div>

      </form>
</div>

