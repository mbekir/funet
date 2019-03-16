<?php
	$bdd = new PDO('mysql:host=localhost;dbname=funet;', 'root', '');

	session_start();
$id=$_SESSION["id_membre"];
$sql = "SELECT * FROM membre WHERE id_membre LIKE '$id'";
	            $resultat = $bdd->prepare($sql); 
	            $resultat->execute();
									$data = $resultat->fetch(PDO::FETCH_ASSOC);
					$logout=$data["logout"];
					$logout++;




$sql = "update `membre` set `logout`='$logout' where `id_membre`='$id'";
			$resultat = $bdd->prepare($sql); 
	            $resultat->execute();
	session_destroy();
	header("location:index.php");
	
?>