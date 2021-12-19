<?php
    ob_start();
    $hostname = "localhost"; //db con docker y localhost con XAMPP
    $username = "root"; //admin con docker y root con XAMPP
    $password = ""; //test con docker y "" con XAMPP
    $db = "database"; //Database en ambas
  
    $conn = mysqli_connect($hostname,$username,$password,$db);
    if ($conn->connect_error) {
      die("Database connection failed: " . $conn->connect_error);
    }
    ob_end_flush();
?>