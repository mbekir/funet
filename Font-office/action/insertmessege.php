<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "funet");
$id_exp=$_SESSION["id_membre"];
$id_dit=$_GET["id_des"];
$msg=$_POST["msg"];
$d=date("Y-m-d");

$result = mysqli_query($db,"INSERT INTO message(contenu, id_dest, id_exp, date) VALUES 
	('$msg','$id_exp','$id_dit','$d')");

if($result){
header("location:../messages.php?id_membre=$id_dit ");
}
else{
	echo"error";
	}
?>