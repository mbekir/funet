<?php

  $db = new PDO('mysql:host=localhost;dbname=funet;', 'root', '');;
session_start();
$id=$_SESSION["id_membre"];
$id_pub=$_GET['id_pub'];

$sql = "SELECT * FROM likedislike WHERE id_publication='$id_pub' and id_membre=$id";
	            $resultat = $db->prepare($sql); 
	            $resultat->execute(); 
	            $count = $resultat->rowCount();

	            if ($count == 0) {

 $ins = $db->query("INSERT INTO `likedislike`(`etat`,  `id_publication`, `id_membre`) VALUES
  (1,'$id_pub','$id')");

    
if($ins)
						header("location:../home.php");


				}
				else {

					$req = $db->query("DELETE FROM `likedislike` WHERE    id_publication='$id_pub' and id_membre=$id");
					if($req)
						header("location:../home.php");

				}


?>