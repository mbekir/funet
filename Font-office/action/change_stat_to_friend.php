<?php
session_start();
$sender=$_GET['q'];
$receiver=$_SESSION["email"];
$db = mysqli_connect("localhost", "root", "", "funet");
$result = mysqli_query($db,"update invitation set stat='friend' where receiver='$receiver' and sender='$sender'");
if($result){
	echo"success";
	
}
else
{echo"error";}
?>