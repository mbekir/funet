<?php
$receiver=$_SESSION["email"];

$db = mysqli_connect("localhost", "root","", "funet");
$res = mysqli_query($db,"SELECT * FROM invitation where stat='sent' and receiver='$receiver'");
$row=mysqli_num_rows($res);

$imgicon="img.jpg";
if($row>0){
	$imgicon="img2.jpg";
}
?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from thunder-team.com/friend-finder/newsfeed-friends.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 13:28:56 GMT -->
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
		<header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php"><img src="images/log.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown">
                <a href="home.php"  aria-haspopup="true" aria-expanded="false">Acceuil </a>
                  
              </li>
             
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu login">
                  <li><a href="profile.php">Profile</a></li>
                  <li><a href="edit-profile.php">Profile About</a></li>
                  <li><a href="album.php">Profile Album</a></li>
                  <li><a href="timeline-friends.php">Profile Friends</a></li>
                  <li><a href="profile-videos.php">Profile video</a></li>
                  <li><a href="edit-profile-work-edu.php">Edit: Work</a></li>
                  <li><a href="edit-profile-interests.php">Edit: Interests</a></li>
                  <li><a href="edit-profile-settings.php">Account Settings</a></li>
                  <li><a href="edit-profile-password.php">Change Password</a></li>
                </ul>
              </li>
			  	 <!--icone d'invitation-->
					<li class="dropdown"> 
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  >
				<span><?php echo "<img id='btnimg' src='images/$imgicon' width='30' height='30'>"; ?></span></a>
						<ul class="dropdown-menu login">
						<?php
										
											if($row==0){
												echo "<li>no invitation</li>";
																}
											while($ligne= mysqli_fetch_array($res)) {
															echo "<li id='so_invitation' value=".$ligne[1]."><a>invitation from ".$ligne[1]."</a></li>";
																		}
																
																		?>
								
								
						</ul>
				
				</li>
				
              <li class="dropdown"><a href="hismessages.php"><i class="fa fa-comment-o" style="font-size:24px"></i></a></li>
              <li class="dropdown"><a href="notification.php"><i class="fa fa-bell-o" style="font-size:24px"></i></a></li>
              
				

              <li class="dropdown"><a href="deconnexion.php">Déconnexion</a></li>
			  

            </ul>
			
            <form class="navbar-form navbar-right hidden-sm" method="POST" action="recherche.php">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" name="rechecher" placeholder="Search friends, photos, videos">
              </div>
            </form>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->


  
    
  </body>
<!--    style et script de icon invitation--> 
 


<script>

$(document).ready(function(){
	var x = document.getElementById("list");
	
	
    $('#btnimg').click(function(){
		
		$('#btnimg').attr('src','images/img.jpg');
		if (x.style.display == "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }	
		
			
	});
	$('#so_invitation').click(function(){
		var x=$(this).attr('value');
		
		
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var msg = this.responseText;
					alert(msg);
				}
			};
		
			xhttp.open("GET", "action/change_stat_to_friend.php?q="+x, true);
			xhttp.send();
			$(this).remove();
	});
});
</script>
<!-- Mirrored from thunder-team.com/friend-finder/newsfeed-friends.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 13:29:04 GMT -->
</html>
