<?php //Para evitar que de problemas con el header
ob_start();

  include '../config.php';
  session_start();
  $email = $_POST['email'];
  $_SESSION['email'] = $email;

  $pasahitza = $_POST['pasahitza'];
  $emaitza = mysqli_query($conn,"SELECT * FROM usuarios WHERE email = '$email' AND pasahitza = '$pasahitza'");
  $zutabekop= mysqli_num_rows($emaitza);
  while($row=mysqli_fetch_array($emaitza)){
    $admin=$row['admin'];
    $izena=$row['izena'];
  }
  $_SESSION['admin']=$admin;
  $_SESSION['izena']=$izena;

if($zutabekop > 0){
  header('Location: ../web/web.php');
}
else{
  header('Location: login.html');
}
//Para evitar que de problemas con el header
ob_end_flush();
?>