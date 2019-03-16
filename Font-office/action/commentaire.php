<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=funet;', 'root', '');

$id_publication=$_POST["id_publication"];
$id=$_SESSION["id_membre"];
$cmntr=$_POST["cmntr"];
//echo $id_publication." and".$id."and ".$cmntr;
$date=date("Y-m-d");


    $ins = $bdd->query("INSERT INTO `commentaire`(`contenu`, `id_membre`, `id_publication`, `date_creation`) VALUES ('$cmntr','$id','$id_publication','$date')");

    
if($ins)
						header("location:../home.php");


?>