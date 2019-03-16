<?php

  $db = mysqli_connect("localhost", "root", "", "funet");
session_start();
$date=date("Y-m-d");
$id=$_SESSION["id_membre"];
$titre=$_POST['statut'];
$msg = "";
$video="";
$image="";

    	 $video = $_FILES['video']['name'];
    	 $image = $_FILES['image']['name'];
    	 

 // If upload button is clicked ...
  if (isset($_POST['upload'])) {


    // Get image name
    if(isset($image) && empty($video) ){


    // Get text

    // image file directory
    $target = "../avatar/Pub_photo/".basename($image);

    $ins = $db->query("insert into publication (date_creation,id_membre,contenu,type,titre) values ('$date','$id','$image','image','$titre');");
   
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	header("location: ../home.php");
    }else{
      $msg = "Failed to upload image";
      header("location: ../home.php");
      //header("location: ../home.php");
    }
   
    }

    

    else if (isset($video) &&  empty($image))
    {

   

    // image file directory
    $target = "../avatar/Pub_video/".basename($video);

   
    $ins = $db->query("insert into publication (date_creation,id_membre,contenu,type,titre) values ('$date','$id','$video','video','$titre');");
if (move_uploaded_file($_FILES['video']['tmp_name'], $target)) {
	header("location: ../home.php");
    }else{
      $msg = "Failed to upload image";
    }

    }

    
   

    }

?>