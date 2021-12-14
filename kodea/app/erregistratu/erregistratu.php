<?php

include '../config.php';
$izena=$_POST['izena'];
$abizenak = $_POST['abizenak'];
$nan = $_POST['nan'];
$telefonoa = $_POST['telefonoa'];
$jaiotzeData = $_POST['jaiotzeData'];
$email = $_POST['email'];
$pasahitza = $_POST['pasahitza'];
$admin=0;


$sql = "INSERT INTO `usuarios`(`izena`,`abizenak`, `nan`, `jaiotzeData`, `pasahitza`, `telefonoa`, `email`,`admin`) 
VALUES ('$izena', '$abizenak','$nan','$jaiotzeData','$pasahitza','$telefonoa','$email','$admin')";

if (mysqli_query($conn, $sql)) {
    header('Location:../saioaHasi/login.html');
  } else{
    printf("Errormessage: %s\n", $conn->error);
  }
?>