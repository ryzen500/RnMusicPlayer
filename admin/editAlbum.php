<?php
include("../includes/config.php");
include("../includes/classes/adminAccount.php"); 
include("../includes/classes/Artist.php"); 
include("../includes/classes/Album.php");
include("../includes/classes/Song.php");
include("../includes/classes/Playlist.php");


// For call it off  error
error_reporting(0);
//session_destroy(); LOGOUT
// Session 

session_start();
if(isset($_SESSION['adminLoggedIn'])) {
	$adminLoggedIn = new adminAccount($con,$_SESSION['adminLoggedIn']);

	$username= $adminLoggedIn->getUsername();
	echo "<script>adminLoggedIn='$username';</script>";

}
else {
	header("Location: register.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin RnMusicPlayer
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="" class="simple-text logo-normal">
          RnMusicPlayer
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active   ">
            <a class="nav-link" href="profile.php" style="cursor: pointer;">
              <i class="material-icons">person</i>
              <p>Your Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="songs.php">
              <i class="material-icons">content_paste</i>
              <p>Song List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./Song Report.html">
              <i class="material-icons">library_books</i>
              <p>Song Report</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                  <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                  <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Music</h4>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                <?php  
                    $id= $_GET['id'];
                    include 'config.php'; 
                    $sql= mysqli_query($con, "SELECT al.*,gen.name as genre_name, art.name as artist_name FROM albums as al INNER JOIN genres as gen ON al.genre= gen.id INNER JOIN artists as art ON al.artist=art.id WHERE al.id='$id'");
                    $lalas= mysqli_fetch_assoc($sql);
                    // var_dump($id)
                    ?>

                  <form action="processingAlbum.php?id=<?php echo $id; ?>" method="POST"  enctype="multipart/form-data">
                    <?php
                     $show =mysqli_query($con, "SELECT * FROM artists");
                     $albums =mysqli_query($con, "SELECT * FROM albums");
                    $genres = mysqli_query($con, "SELECT * FROM genres");
                      # code...
                    
                    ?>


                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title </label>
                          <input type="text" class="form-control" name="title" value="<?php echo  $lalas['title']; ?>" >
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Masukkan Nama Artist</label>
  
                          <select class="form-select" name="artist">
                          <option value="<?php echo $lalas['artist']; ?>"> <?php echo $lalas['artist_name']; ?></option>

<?php                     while ($datas =mysqli_fetch_array($show)) {
?>
                           
                            <option value="<?php echo $datas['id']; ?>" ><?php echo $datas['name'];?></option>
                            <?php } ?>

                          </select>

                        </div>
                      </div>
                    
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Genre</label>
                          <select class="form-select" name="genre">
                          <option value="<?php echo $lalas['genre']; ?>"><?php echo $lalas['genre_name']; ?></option>

<?php                     while ($datas =mysqli_fetch_array($genres)) {
?>
                           
                            <option value="<?php echo $datas['id']; ?>" ><?php echo $datas['name'];?></option>
                            <?php } ?>

                          </select>                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                      <div class="mb-3">
  <label for="formFile" class="form-label">File Music Yang ingin Dimasukkan</label>
  <input class="form-control" type="file" name="artworkPath" id="formFile" value="<?php echo $lalas['artworkPath'];?>">
</div>
                      </div>
                    </div>
             
                    <div class="row">
                      <div class="col-md-12">
                        
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" name="submit">Simpan Music</button>
                    <div class="clearfix"></div>
                  </form>
                  <?//php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "footer.php";?>