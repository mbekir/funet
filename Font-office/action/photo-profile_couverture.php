<?php

  $db = mysqli_connect("localhost", "root", "", "funet");
session_start();
$id=$_SESSION["id"];
  $msg = "";

 // If upload button is clicked ...
  if (isset($_POST['upload1'])) {
    // Get image name
    $image = $_FILES['images']['name'];
    // Get text

    // image file directory
    $target = "../avatar/Couverture/".basename($image);

    $ins = $db->query("UPDATE `membre` SET `url_photo_couverture` = '$image' WHERE `id_membre` = $id;");
if (move_uploaded_file($_FILES['images']['tmp_name'], $target)) {
	header("location: ../profile.php");
    }else{
      $msg = "Failed to upload image";
    }

    }

?>