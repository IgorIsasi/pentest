<?php
session_start();
include '../config.php';
$izena=$_POST['izena'];
$abizenak = $_POST['abizenak'];
$nan = $_POST['nan'];
$telefonoa = $_POST['telefonoa'];
$jaiotzeData = $_POST['jaiotzeData'];
$email = $_SESSION['email'];
$pasahitza = $_POST['pasahitza'];


$sql = "UPDATE usuarios SET izena='$izena', abizenak='$abizenak', nan='$nan', jaiotzeData='$jaiotzeData', pasahitza='$pasahitza', telefonoa='$telefonoa', email='$email' 
WHERE email='$email'";

if (mysqli_query($conn, $sql)) {
    header('Location: datuakAldatu.php');
  } else{
    Echo "Errormessage: %s\n", $conn->error;
    echo $email;
  }
?>