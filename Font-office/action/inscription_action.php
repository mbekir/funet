<?php
$bdd = new PDO('mysql:host=localhost;dbname=funet;', 'root', '');
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email2 = $_POST["email2"];
$password2 = $_POST["password2"];
$Date = $_POST["Date"];
$Sexe= $_POST["Sexe"];
$ville= $_POST["ville"];
 $image = "user.png";

$sql = "SELECT * FROM membre WHERE email LIKE '$email2'";
	            $resultat = $bdd->prepare($sql); 
	            $resultat->execute(); 
	            $count = $resultat->rowCount();

	            if ($count == 0) {
				

	            	$req = $bdd->prepare('INSERT INTO membre(email, password, nom, prenom, date_naissance, Sexe, ville, url_photo_profil,url_photo_couverture,login ,logout)
					VALUES(:email, :password, :nom, :prenom,:date_naissance, :Sexe, :ville, :url_photo_profil,:url_photo_couverture, :login, :logout)')
					or exit(print_r($this->bdd->errorInfo()));

					$req->execute(array(
						'email' => $email2,
						'password' => $password2,
						'nom' => $nom,
						'prenom' => $prenom,
						'date_naissance' => $Date,
						'Sexe' => $Sexe,
						'ville' => $ville,
						'url_photo_profil' => $image,
						'url_photo_couverture' => "",
						'login' => 1,
						'logout' => 0
					));
					if($req){
						header("location: ../home.php");
					}
					else {
						echo "erreur";
					}
					
}
else {echo "existe";}
?>