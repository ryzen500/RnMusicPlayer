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
<?php
echo "<script>
function popup(form) {
 window.open('', 'cetak', 'menubar=yes,scrollbars=yes,resizable=yes,width=800,height=400,top=50,left=200');
 form.target = 'cetak';
}
</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Admin  RnMusicPlayer
   </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- CSS Files -->
  <link href="./assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          RnMusicPlayer 
               </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="./index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
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
          <li class="nav-item active">
            <a class="nav-link" href="./typography.php">
              <i class="material-icons">library_books</i>
              <p> Song Report</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./albumsReport.php">
              <i class="material-icons">library_books</i>
              <p>Album Report</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./report-artist.php">
              <i class="material-icons">library_books</i>
              <p> Artist Report</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./report-user.php">
              <i class="material-icons">library_books</i>
              <p>User Report</p>
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
            <a class="navbar-brand" href="javascript:void(0)">Song Report</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form" >
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <!-- <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <!-- <i class="material-icons">notifications</i> -->
                  <i class="material-icons">person</i>

                  <!-- <span class="notification">5</span> -->
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right ">
                  <a class="dropdown-item" href="profile.php"><?php echo $username;?></a>
                  <a class="dropdown-item" href="logout.php">LOGOUT</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        
      <div class="container-fluid">
        
        <div class="card">
          
            <div class="card-header card-header-primary">
              <h4 class="card-title">Songs Report</h4>
              <p class="card-category">Songs Data report </p>
            </div>
            <div class="card-body">
              <div id="Song Report">
                <div class="card-title">
                  <h2>Report</h2>
                </div>
                <div class="row">
              <form onsubmit="popup(this);" target="_blank" method="post" action="tampil.php">

              <input type="date" name="dari" class="form-control float-right" id="reservation">
        <input type="date" name="sampai" class="form-control float-right" id="reservation">
        <button type="submit" name="cetak" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</button>

      
              <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
     <th> No </th>
     <th> Title </th>
     <th> Artist </th>
     <th> Album </th>
     <th> Genre </th>
   </thead>
                  <?php include "config.php";
                    $query =mysqli_query($con, "SELECT s.title,g.name as genre,a.name,al.title as album FROM `songs` as s INNER JOIN artists AS a ON s.artist =a.id INNER JOIN albums as al ON s.album = al.id INNER JOIN genres as g ON s.genre =g.id;");
                    $nomor = 1;
                    while($datas = mysqli_fetch_array($query)){
// var_dump($datas);
                    
                  ?>
  
   <tbody>
     <tr>
       <td> <?php  echo $nomor++; ?> </td>
       <td> <?php echo $datas["title"]; ?> </td>
       <td> <?php  echo $datas['name']; ?> </td>
       <td> <?php  echo $datas['album'];?> </td>
       <td class="text-primary"> <?php echo $datas['genre'];?> </td>

       <!-- <td class="text-primary"> $36,738 </td> -->

    </tr>
   </tbody>
   <?php } ?>
 </table>
                  </div>
         
              </form>    
             
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     <?php include "footer.php";