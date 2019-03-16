<?php
include("cnx.php");
session_start();
$id=$_SESSION["id"];
$pass=$_POST["password"];
$pass1=$_POST["password1"];
$pass2=$_POST["password2"];
if($pass1 == $pass2){
$ins = $db->query("UPDATE `membre` SET `password` = '$pass1' WHERE `id_membre` = $id;");
if($ins)
header("location:../edit-profile.php");
else
	echo "faux";
}

?>