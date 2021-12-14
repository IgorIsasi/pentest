<?php
    session_start();
    include '../config.php';
    $email = $_SESSION['email'];
    $izena = $_POST['izena'];
    $egilea = $_POST['egilea'];
    $query = mysqli_query($conn, "DELETE FROM erreserba WHERE erabEmail='$email' AND liburuIzena='$izena' AND liburuEgilea='$egilea'")
        or die (mysqli_error($conn));

    $query = mysqli_query($conn, "UPDATE liburua SET kopurua=kopurua+1 WHERE izena='$izena' AND egilea='$egilea'")
        or die (mysqli_error($conn));
    header('Location:'.$_SESSION['url']);
    die;
?>