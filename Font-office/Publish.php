<?php 

if(!isset($_SESSION["email"]))
 {  header("location: index.php");
}
 $db = mysqli_connect("localhost", "root", "", "funet");

$email=$_SESSION["email"];
$id=$_SESSION["id_membre"];


$result = mysqli_query($db, "SELECT * FROM membre where email='$email'");

   while ($ligne = mysqli_fetch_array($result)) {
    $img=$ligne[8];
    $nom=$ligne[3]." ".$ligne[4];
    }


?>


<form method="POST" action="action/publication.php" enctype="multipart/form-data">
<div class="create-post">
            	<div class="row">
            		<div class="col-md-7 col-sm-7">
                  <div class="form-group">
          <?php echo " <img class='profile-photo-md'  src='avatar/Profile/".$img."' >";?>
                    <textarea name="statut" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                  </div>
                </div>
            		<div class="col-md-5 col-sm-5">
                  <div class="tools">
                    <ul class="publishing-tools list-inline">
                      <li ><a href="#"><i id="images"  class="ion-images"></i></a></li>
                      <li ><a href="#"><i id="videos" class="ion-ios-videocam"></i></a></li>
                      <li><a href="#"><i class="ion-map"></i></a></li>
                    </ul>
                        <input type="file" name="image" id="image"/>
                        <input type="file" name="video" id="video"/>
                    <button class="btn btn-primary pull-right" name="upload">Publish</button>
                  </div>
                </div>
            	</div>
            </div>

            </form>

<script type="text/javascript">
$(document).ready(function(){
$("#image").hide();

$("#video").hide();
$("#images").click(function(){
$("#image").trigger('click');

});
$("#videos").click(function(){
$("#video").trigger('click');

});


});




</script>
