<?php

  $db = mysqli_connect("localhost", "root", "", "funet");
session_start();
$id=$_SESSION["id"];

$firstname=$_POST['firstname'];
$prenom=$_POST['lastname'];
$Email=$_POST['Email'];
$sexe=$_POST['optradio'];
$date=$_POST['date'];





$ins = $db->query("

UPDATE `membre` SET `nom` = '$firstname', `prenom` = '$prenom', `email` = '$Email' ,`Sexe` = '$sexe',`date_naissance` = '$date' WHERE `id_membre` = $id;");
if($ins)
header("location:../edit-profile.php");
else
	echo "faux";

?>