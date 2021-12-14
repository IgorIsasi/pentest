<?php
        include '../config.php';

        $izena = $_POST['izena'];
        $egilea = $_POST['egilea'];
        $orriKop = $_POST['orriKop'];
        $prezioa = $_POST['prezioa'];
        $stock = $_POST['stock'];
        $irudia = $_POST['irudia'];
        $query = mysqli_query($conn, 
        "INSERT INTO liburua (izena, egilea, orriKop, prezioa, kopurua, irudia) 
        VALUES ('$izena', '$egilea', $orriKop, $prezioa, $stock, '$irudia')")
        or die (mysqli_error($conn));
        header('Location: web.php');
    
?>