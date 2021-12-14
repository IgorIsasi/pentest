<?php
    session_start();
    include '../config.php';
    $email = $_SESSION['email'];
    $izena = $_POST['izena'];
    $egilea = $_POST['egilea'];

    $query = mysqli_query($conn, "INSERT INTO erreserba (erabEmail, liburuIzena, liburuEgilea) VALUES ('$email', '$izena', '$egilea')")
        or die (mysqli_error($conn));

    $query = mysqli_query($conn, "UPDATE liburua SET kopurua = kopurua-1 WHERE izena = '$izena' AND egilea = '$egilea'")
        or die (mysqli_error($conn));

    header('Location: web.php');
?>