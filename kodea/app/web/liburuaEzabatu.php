<?php
    include '../config.php';
    $izena = $_POST['izena'];
    $egilea = $_POST['egilea'];
    
    $query=mysqli_query($conn, "DELETE erreserba FROM erreserba INNER JOIN liburua WHERE erreserba.liburuIzena=liburua.izena AND erreserba.liburuIzena='$izena' AND erreserba.liburuEgilea='$egilea'")
    or die (mysqli_error($conn));

    $query=mysqli_query($conn, "DELETE FROM liburua WHERE izena='$izena' AND egilea='$egilea' ")
    or die (mysqli_error($conn));
    
    
    
    header('Location: web.php');
?>