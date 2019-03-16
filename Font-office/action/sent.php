<?php
session_start();
$receiver=$_GET["q1"];
$sender=$_SESSION["email"];
$db = mysqli_connect("localhost", "root", "", "funet");
$result = mysqli_query($db,"INSERT INTO invitation(id_invitation, sender, receiver, stat) VALUES (NULL,'$sender','$receiver','sent')");

if($result){
echo"recue";
}
else{
	echo"error";
	}
?>