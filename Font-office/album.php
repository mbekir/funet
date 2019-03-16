<?php 

session_start();

if(!isset($_SESSION["email"]))
 {  header("location: index.php");
}
 $db = mysqli_connect("localhost", "root", "", "funet");
$email=$_SESSION["email"];
$id=$_SESSION["id_membre"];

$result = mysqli_query($db, "SELECT * FROM publication where id_membre='$id' and type='image'  
   order by date_creation DESC");

  


?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from thunder-team.com/friend-finder/timeline-album.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 13:32:56 GMT -->
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>FUNET</title>
 <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
	</head>
  <body>
 
  <?php
     include("menu.php");
     ?>

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <?php
     include("head.php");
     ?>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
       
              <!-- Photo Album
              ================================================= -->
              <ul class="album-photos">
                       <?php 
                       $i=0;
while ($ligne = mysqli_fetch_array($result)) {
      if(!empty($ligne['contenu']) ){

  $i++;
    
              
              ?>
                            <li>
                  <div class="img-wrapper" data-toggle="modal" data-target=".photo-1">
                 <?php echo " <img src='avatar/Pub_photo/".$ligne['contenu']."' alt='photo' style='width: 200px; height: 150px;'  >"; 

                 ?>


                  </div>
                  <div class="modal fade photo-1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                  <?php //echo " <img src='avatar/Pub_photo/".$ligne['contenu']."' alt='photo' >";?>

                      </div>
                    </div>
                  </div>
                </li>
                <?php
              }}
                ?>
              </ul>
            </div>
            <div class="col-md-2 static">
             
          </div>
        </div>
      </div>
    </div>


    <!-- Footer
    ================================================= -->
    <footer id="footer">
      <div class="container">
      	<div class="row">
          <div class="footer-wrapper">
            
          </div>
      	</div>
      </div>
      <div class="copyright">
        <p>Thunder Team © 2016. All rights reserved</p>
      </div>
		</footer>
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    
    

    <!-- Scripts
    ================================================= -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>

  </body>

<!-- Mirrored from thunder-team.com/friend-finder/timeline-album.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 13:33:20 GMT -->
</html>
