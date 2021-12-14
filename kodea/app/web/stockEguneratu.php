<?php
    include '../config.php';
    $izena = $_POST['izena'];
    $egilea = $_POST['egilea'];
    $kopurua = $_POST['stock'];

    $query = mysqli_query($conn, "UPDATE liburua SET kopurua=$kopurua WHERE izena = '$izena' AND egilea = '$egilea'")
    or die (mysqli_error($conn));

    header('Location: web.php');
?>