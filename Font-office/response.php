<?php 


session_start();

if(!isset($_SESSION["email"]))
 {  header("location: index.php");
}
$db = mysqli_connect("localhost", "root", "", "funet");
$email=$_SESSION["email"];
$id=$_SESSION["id_membre"];


$id_m=$_GET["id_membre"];




$result = mysqli_query($db, "select * from message where (id_dest='$id' and   id_exp='$id_m') or (id_dest='$id_m' and   id_exp='$id') order by date ASC");
while ($row = mysqli_fetch_array($result)) {

  if($row["id_dest"]==$id){
?>
                      		<li class="left">
<?php 
$result1 = mysqli_query($db, "select * from membre where id_membre='$id'");
while ($row1 = mysqli_fetch_array($result1)) {
?>
<?php echo " <img class='profile-photo-sm pull-left' alt='user' src='avatar/Profile/".$row1["url_photo_profil"]."' >";?>
                      			<div class="chat-item">
                              <div class="chat-item-header">
                              	<h5><?php echo $row1["nom"]." ".$row1["prenom"]; ?></h5>
                                <?php } ?>
                              	<small class="text-muted"><?php echo $row["date"]; ?></small>
                              </div>
                          <p><?php echo $row["contenu"]; ?></p>
                            </div>
                      		</li>
                          <?php
                        }else
                        {
                          ?>
                          <li class="right">
                        <?php 
                        $id_d=$row["id_dest"];
$result2 = mysqli_query($db, "select * from membre where id_membre='$id_d'");
while ($row2 = mysqli_fetch_array($result2)) {
?>
        <?php echo " <img class='profile-photo-sm pull-right' alt='user' src='avatar/Profile/".$row2["url_photo_profil"]."' >";?>

                      			<div class="chat-item">
                              <div class="chat-item-header">
                              	<h5><?php echo $row2["nom"]." ".$row2["prenom"]; ?></h5>
                                <?php } ?>
                              	<small class="text-muted"><?php echo $row["date"]; ?></small>
                              </div>
                              <p><?php echo $row["contenu"]; ?></p>
                            </div>
                      		</li>
                          
                        
                        <?php }} ?>
                         