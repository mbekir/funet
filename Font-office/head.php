 <?php 


if(!isset($_SESSION["email"]))
 {  header("location: index.php");
}
 $db = mysqli_connect("localhost", "root", "", "funet");
$email=$_SESSION["email"];
$result1 = mysqli_query($db, "SELECT * FROM membre where email='$email'");

   while ($ligne1 = mysqli_fetch_array($result1)) {
    $img1=$ligne1[8];
    $nom1=$ligne1[3]." ".$ligne1[4];
    }


?>

 <div class="timeline-cover"   style="border-image: url('images/covers/3.jpg') ">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
            <?php echo " <img class='img-responsive profile-photo'  src='avatar/Profile/".$img1."' >";?>

                 
                     
                  <h3><?php echo $nom1; ?></h3>
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="profile.php" class="active">Profile</a></li>
                  <li><a href="edit-profile.php">About</a></li>
                  <li><a href="album.php">Album</a></li>
                  <li><a href="timeline-friends.php">Friends</a></li>
                </ul>
                
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
            <?php echo " <img class='img-responsive profile-photo'  src='avatar/Profile/".$img1."' >";?>

              <h4><?php echo $nom1; ?></h4>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="profile.php" class="active">Timeline</a></li>
                <li><a href="edit-profile.php">About</a></li>
                <li><a href="timeline-album.php">Album</a></li>
                <li><a href="timeline-friends.php">Friends</a></li>
              </ul>
              <button class="btn-primary">Add Friend</button>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>