<?php 

session_start();

if(!isset($_SESSION["email"]))
 {  header("location: index.php");
}
 $db = mysqli_connect("localhost", "root", "", "funet");
$email=$_SESSION["email"];
$rech=$_POST["rechecher"];
$result = mysqli_query($db, "SELECT * FROM membre where nom LIKE '%$rech%'  ");

    
$res = mysqli_query($db, "SELECT * FROM membre where email='$email'");

   while ($ligne = mysqli_fetch_array($res)) {
    $img=$ligne[8];
    $nom=$ligne[3]." ".$ligne[4];
    }

?>

<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from thunder-team.com/friend-finder/newsfeed-people-nearby.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 13:28:55 GMT -->
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>FUNET</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
	</head>
  <body>
 <!-- Header
    ================================================= -->
    <?php
     include("menu.php");
     ?>
    <!--Header End-->

    <div id="page-contents">
    	<div class="container">
    		<div class="row">

    			<!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			<div class="col-md-3 static">
            <div class="profile-card">
              <?php echo " <img class='profile-photo'  src='avatar/Profile/".$img."' >";?>

              <h5><a href="timeline.html" class="text-white"><?php echo $nom;  ?></a></h5>
            	<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.html">My Newsfeed</a></div></li>
              <li><i class="icon ion-ios-people"></i><div><a href="newsfeed-people-nearby.html">People Nearby</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="newsfeed-friends.html">Friends</a></div></li>
              <li><i class="icon ion-chatboxes"></i><div><a href="newsfeed-messages.html">Messages</a></div></li>
              <li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Images</a></div></li>
              <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Videos</a></div></li>
            </ul><!--news-feed links ends-->
        <!--chat block ends-->
          </div>
    			<div class="col-md-7">


            <!-- Nearby People List
            ================================================= -->
            <div class="people-nearby">
             <?php
                   while ($ligne = mysqli_fetch_array($result)) {
					   $result2=mysqli_query($db, "SELECT * FROM invitation where sender='$email' and receiver='$ligne[1]'");
						$ligne2= mysqli_fetch_array($result2);
						if($ligne2){
						$var="$ligne2[3]";
							}else{
								$var="add freind";
								}
                    ?>
              <div class="nearby-user">
                <div class="row">
                  <div class="col-md-2 col-sm-2">
                     <?php echo " <img alt='profile-cover' class='profile-photo-lg'  src='avatar/Profile/".$ligne['url_photo_profil']."' >";?>
                  </div>
                  <div class="col-md-7 col-sm-7">
                    <h5><a href="profile-amis.php?id=<?php echo $ligne[0]; ?>" class="profile-link"><?php echo $ligne[3]." ".$ligne[4]; ?></a></h5>
                    <p>Software Engineer</p>
                    <p class="text-muted">500m away</p>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <?php echo "<button class='mybtn' value=".$ligne[1]."><span>".$var."</span></button>"?>
                  </div>
                </div>
              </div>
              <?php 
              }
              ?>
            
            </div>
          </div>

          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
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
            <div class="col-md-3 col-sm-3">
              <a href="#"><img src="images/logo-black.png" alt="" class="footer-logo" /></a>
              <ul class="list-inline social-icons">
              	<li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>For individuals</h5>
              <ul class="footer-links">
                <li><a href="#">Signup</a></li>
                <li><a href="#">login</a></li>
                <li><a href="#">Explore</a></li>
                <li><a href="#">Finder app</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Language settings</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>For businesses</h5>
              <ul class="footer-links">
                <li><a href="#">Business signup</a></li>
                <li><a href="#">Business login</a></li>
                <li><a href="#">Benefits</a></li>
                <li><a href="#">Resources</a></li>
                <li><a href="#">Advertise</a></li>
                <li><a href="#">Setup</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>About</h5>
              <ul class="footer-links">
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-3">
              <h5>Contact Us</h5>
              <ul class="contact">
                <li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
                <li><i class="icon ion-ios-email-outline"></i>info@thunder-team.com</li>
                <li><i class="icon ion-ios-location-outline"></i>228 Park Ave S NY, USA</li>
              </ul>
            </div>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&amp;callback=initMap"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>
	<script>
	$(document).ready(function() {
        $('.mybtn').click(function() {
			
				var email= this.value;
				var a = $("span", this).text();
				if(a == "add freind"){
											
						
									var xhttp = new XMLHttpRequest();
									xhttp.onreadystatechange = function() {
									if (this.readyState == 4 && this.status == 200) {
											var res=this.responseText;
											
											}
											
											};
											$("span",this).text("sent");
											xhttp.open("GET", "action/sent.php?q1="+email, true);
											xhttp.send();
											
					
				}
				
        });
    });
	
</script>
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/newsfeed-people-nearby.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 13:28:56 GMT -->
</html>
