               <div id="chat-block">

            <?php 

$sql = "SELECT DISTINCT(m.email),m.id_membre,m.url_photo_profil,m.nom,m.prenom FROM invitation i , membre m WHERE (sender LIKE '$email' OR receiver LIKE '$email') AND stat LIKE 'friend' and (m.email=i.sender or m.email=i.receiver) and (m.login-m.logout)>0 and m.email <> '$email' ";

             // $resultat = $db->prepare($sql); 
              //$resultat->execute(); 
              //$count = $resultat->rowCount();
              $result = $db->query($sql); 
              

            $count =$result->num_rows ;
              
 ?>
              <div class="title">Chat online <?php echo  $count ;?> </div>

              <ul class="online-users list-inline">
                
                  <?php 
                  while($row= $result->fetch_assoc())
              {
                  ?>
       <li><a href="messages.php?id_membre=<?php echo $row['id_membre']; ?>" title="<?php echo $row['nom']." ".$row['prenom']; ?>">
  <?php echo " <img class='img-responsive profile-photo' alt='user' src='avatar/Profile/".$row["url_photo_profil"]."' >";?>

                  <span class="online-dot"></span></a>
                  <?php } ?>
                </li>
                
              </ul>
            </div>