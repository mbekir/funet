<?php
$bdd = new PDO('mysql:host=localhost;dbname=funet;', 'root', '');

$email = $_POST["email"];
$password = $_POST["password"];

				$sql = "SELECT * FROM membre WHERE email LIKE '$email' AND password LIKE '$password'";
	            $resultat = $bdd->prepare($sql); 
	            $resultat->execute(); 
	            $count = $resultat->rowCount();

	            if ($count == 1) {
	            	
					$data = $resultat->fetch(PDO::FETCH_ASSOC);
					
					$id=$data["id_membre"];
					$login=$data["login"];
					
					$login++;
					$sql = "update `membre` set `login`='$login' where `id_membre`='$id'";
					$resultat = $bdd->prepare($sql); 
	                $resultat->execute(); 
					session_start();
 			    	$_SESSION["email"]=$email;
 			    	$_SESSION["id_membre"]=$id;

					header("location:../home.php");
					

					}
					else {
					echo "ko";
					
 
//	header("location: home.php");}
		//echo "";
						//window.location.replace('../index.php');
	


}


?>