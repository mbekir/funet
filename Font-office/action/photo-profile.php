<?php

  $db = mysqli_connect("localhost", "root", "", "funet");
session_start();
$id=$_SESSION["id"];
  $msg = "";

 // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text

    // image file directory
    $target = "../avatar/Profile/".basename($image);

    $ins = $db->query("UPDATE `membre` SET `url_photo_profil` = '$image' WHERE `id_membre` = $id;");
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	header("location: ../profile.php");
    }else{
      $msg = "Failed to upload image";
    }

    }

?>