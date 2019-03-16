<?php 

session_start();

if(!isset($_SESSION["email"]))
 {  header("location: index.php");
}
$db = mysqli_connect("localhost", "root", "", "funet");
$email=$_SESSION["email"];
//$_SESSION["id"]=$id;

$result = mysqli_query($db, "SELECT * FROM membre where email='$email'");

   while ($ligne = mysqli_fetch_array($result)) {
    $img=$ligne[8];
    $nom=$ligne[3]." ".$ligne[4];
    }


?>
<!DOCTYPE html>

	
<!-- Mirrored from thunder-team.com/friend-finder/newsfeed.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 13:21:17 GMT -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">

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
    <link href="css/emoji.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

    
    <!--Google Font-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
    <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '40f24fdf3453a4960fab37b94c2e525e0926e4a1';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
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

         <?php  include("discussion.php") ?>
         <!--chat block ends-->
          </div>
    			<div class="col-md-7">

            <!-- Post Create Box
            ================================================= -->
            <?php
            include("Publish.php");

            ?>
            

            <!-- Post Content
            ================================================= -->
            <div class="post-content">





<?php 
$result = mysqli_query($db, "select * from publication p ,membre m where p.id_membre=m.id_membre order by id_publication desc
");

   while ($ligne = mysqli_fetch_array($result)) {
    if($ligne['type']=='image' &&  !empty($ligne['contenu']) ){

        ?>                   
 <form method="Post" action="action/commentaire.php">
<?php echo " <img class='profile-photo-md pull-left'  src='avatar/Profile/".$ligne['url_photo_profil']."' >";?>

                <div class="post-detail">
                  <div class="user-info">
   <h5><a href="timeline.html" class="profile-link"><?php echo $ligne['nom']." ".$ligne['prenom'] ?></a> <span class="following">following</span></h5>
                    <p class="text-muted"><?php echo $ligne['titre']; ?></p>

  <input type="hidden" name="id_publication" value=<?php $id_pub=$ligne['id_publication'];
  echo $id_pub; ?>>
                  </div>
              <img  src="avatar/Pub_photo/<?php echo $ligne['contenu']; ?>"  alt="post-image" class="img-responsive post-image" style="height: 300px;" />
              <div class="post-container">
                
                  <div class="reaction">
                <?php $lik = mysqli_query($db, "select * from likedislike where 
                  id_publication = '$id_pub' and etat = 1  ");
                $dik = mysqli_query($db, "select * from likedislike where 
                  id_publication = '$id_pub' and etat = -1  ");
                  $num_rows = mysqli_num_rows($lik);
                  $num_rows1 = mysqli_num_rows($dik);


                    ?>

                    <a href="action/like.php?id_pub=<?php echo $id_pub; ?>"  id="like" class="btn text-green"><i class="icon ion-thumbsup"></i> <?php echo $num_rows; ?></a>
                    <a href="action/dislike.php?id_pub=<?php echo $id_pub; ?>" class="btn text-red"><i class="fa fa-thumbs-down"></i> <?php echo $num_rows1; ?></a>
                  
                  </div>
                  <div class="line-divider"></div>
                  
                  <div class="post-comment">
                    <?php $res = mysqli_query($db, "select * from commentaire c , membre m where c.id_membre=m.id_membre and id_publication='$id_pub' order by id desc");

   while ($l = mysqli_fetch_array($res)) { ?>
   <?php echo " <img class='profile-photo-sm'  src='avatar/Profile/".$l['url_photo_profil']."' >";?>
                    <p><a href="timeline.html" class="profile-link"><?php  echo $id_pub; ?> </a><i class="em em-laughing"></i> <?php echo $l["contenu"]; ?> </p>
                    <?php } ?>
                  </div>
                  <div class="post-comment">
                             <div class="input-group">
      <input type="text" class="form-control" placeholder="Post a comment" name ="cmntr">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-edit"></i></button>
      </div>
    </div>
</form>
                </div>
                  
                </div>
              </div>
<!--- publication satut -->

       <?php } else     if($ligne['type']=='image' &&  empty($ligne['contenu']) ){ ?>

                   <form method="Post" action="action/commentaire.php">

<?php echo " <img class='profile-photo-md pull-left'  src='avatar/Profile/".$ligne['url_photo_profil']."' >";?>
                <div class="post-detail">
                  <div class="user-info">
                  <h5><a href="timeline.html" class="profile-link"><?php echo $ligne['nom']." ".$ligne['prenom'] ?></a> <span class="following">following</span></h5>
                    <p class="text-muted"><?php echo $ligne['titre']; ?></p>

<input type="hidden" name="id_publication" value=<?php $id_pub=$ligne['id_publication'];  echo $id_pub; ?>>
                  </div>
                       <div class="post-comment">
                    <?php $res = mysqli_query($db, " select * from commentaire c , membre m where c.id_membre=m.id_membre and id_publication='$id_pub' order by id desc");



   while ($l = mysqli_fetch_array($res)) { ?>
   <?php echo " <img class='profile-photo-sm'  src='avatar/Profile/".$l['url_photo_profil']."' >";?>
                    <p><a href="timeline.html" class="profile-link"><?php  echo $id_pub; ?> </a><i class="em em-laughing"></i> <?php echo $l["contenu"]; ?> </p>
                    <?php } ?>
                  </div>
                  <div class="post-comment">
                               <div class="input-group">
      <input type="text" class="form-control" placeholder="Post a comment" name ="cmntr">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-edit"></i></button>
      </div>
    </div>
</form>
                
                  <div class="reaction">

                     <?php $lik = mysqli_query($db, "select * from likedislike where 
                  id_publication = '$id_pub' and etat = 1  ");
                $dik = mysqli_query($db, "select * from likedislike where 
                  id_publication = '$id_pub' and etat = -1  ");
                  $num_rows = mysqli_num_rows($lik);
                  $num_rows1 = mysqli_num_rows($dik);


                    ?>
                 <a href="action/like.php?id_pub=<?php echo $id_pub; ?>" class="btn text-green"><i class="icon ion-thumbsup"></i> <?php echo $num_rows; ?></a>
                    <a href="action/dislike.php?id_pub=<?php echo $id_pub; ?>" class="btn text-red"><i class="fa fa-thumbs-down"></i> <?php echo $num_rows1; ?></a>
                  </div>
                  <div class="line-divider"></div>
                 
                  
                  
                </div>
              </div>

 <!-- publication video -->
              <?php } else if ($ligne['type']=='video') {  ?>

                   <form method="Post"  action="action/commentaire.php">

<?php echo " <img class='profile-photo-md pull-left'  src='avatar/Profile/".$ligne['url_photo_profil']."' >";?>
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link"><?php echo $ligne['nom']." ".$ligne['prenom'] ?></a> <span class="following">following</span></h5>
                    <p class="text-muted"><?php echo $ligne['titre']; ?></p>
  <input type="hidden"  name="id_publication" value=<?php $id_pub=$ligne['id_publication'];  echo $id_pub; ?>>
                  </div>
                  <video  style="height: 300px;" controls="controls">
  <source src="avatar/Pub_video/<?php echo $ligne['contenu']; ?>" type="video/mp4" />
  <source src="video.webm" type="video/webm" />
  <source src="video.ogv" type="video/ogg" />
</video>
              
              <div class="post-container">
                
                  <div class="reaction">
                    <?php $lik = mysqli_query($db, "select * from likedislike where 
                  id_publication = '$id_pub' and etat = 1  ");
                $dik = mysqli_query($db, "select * from likedislike where 
                  id_publication = '$id_pub' and etat = -1  ");
                  $num_rows = mysqli_num_rows($lik);
                  $num_rows1 = mysqli_num_rows($dik);


                    ?>
                 <a href="action/like.php?id_pub=<?php echo $id_pub; ?>" class="btn text-green"><i class="icon ion-thumbsup"></i> <?php echo $num_rows; ?></a>
                    <a href="action/dislike.php?id_pub=<?php echo $id_pub; ?>" class="btn text-red"><i class="fa fa-thumbs-down"></i> <?php echo $num_rows1; ?></a>
                  </div>
                  <div class="line-divider"></div>
               
                  
                     <div class="post-comment">
                    <?php $res = mysqli_query($db, "select * from commentaire c , membre m where c.id_membre=m.id_membre and id_publication='$id_pub' order by id desc");

   while ($l = mysqli_fetch_array($res)) { ?>
   <?php echo " <img class='profile-photo-sm'  src='avatar/Profile/".$l['url_photo_profil']."' >";?>
                    <p><a href="timeline.html" class="profile-link"><?php  echo $id_pub; ?> </a><i class="em em-laughing"></i> <?php echo $l["contenu"]; ?> </p>
                    <?php } ?>
                  </div>
                  <div class="post-comment">
                    <div class="input-group">
      <input type="text" class="form-control" placeholder="Post a comment" name ="cmntr"  >
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" ><i class="glyphicon glyphicon-edit"></i></button>
      </div>
    </div>

              
</form>
                  
                </div>
              </div>



              <?php }} ?>
            </div>

       <!-- Newsfeed Common Side Bar Right
          ================================================= -->
    		</div>
    	</div>
       <!-- Newsfeed Common Side Bar Right
          ================================================= -->
          <div class="col-md-2 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey">Notification</h4>
             <?php 


$req = mysqli_query($db, "SELECT * FROM publication WHERE id_membre= ".$_SESSION["id_membre"]." order by date_creation desc");

   while ($d = mysqli_fetch_array($req)) {
    $r = mysqli_query($db, "SELECT * FROM likedislike WHERE id_publication= ".$d["id_publication"]." and id_membre!= ".$_SESSION["id_membre"]);

   while ($dm = mysqli_fetch_array($r)) {
    $requet = mysqli_query($db, "SELECT * FROM membre WHERE id_membre= ".$dm["id_membre"]);

   while ($d2 = mysqli_fetch_array($requet)) {

             ?>
              <div class="follow-user">
                <img src=<?php echo "avatar/Profile/".$d2["url_photo_profil"]; ?> alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html"><?php echo $d2["nom"].$d2["prenom"];?></a></h5>
                  <?php 
$video=$d["contenu"];
if($d["contenu"]==""&&$d["type"]=='image')


                  echo "aime votre publication ".$d["titre"];
else
  if($d["type"]=='video')

echo 'aime votre video  
 <video  style="height: 300px;" controls="controls">
  <source src="avatar/Pub_video/'.$video.'" type="video/mp4" />
 
</video>';

else 
  echo "aime votre image";?> 
 <img src=avatar/Pub_photo/<?php echo $d['contenu']; ?> alt="" class="img-responsive post-image" /> 
                </div>
              </div>
              <?php } } }?>
            </div>
          </div>
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
    
    
    
 
    
    <!-- Scripts
    ================================================= -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&amp;callback=initMap"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>


   

  </body>
  
 
<!-- Mirrored from thunder-team.com/friend-finder/newsfeed.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 13:21:46 GMT -->
</html>
