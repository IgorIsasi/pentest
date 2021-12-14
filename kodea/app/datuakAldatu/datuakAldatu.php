<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../formStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Datuak aldatu</title>
</head>
<body>
	
    <form name="formulario" class="formulario" id="formulario" method="post" action="datuBerriakBidali.php">
    <?php
		
        include '../config.php';
        
        $email=$_SESSION['email'];
        $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email'");
        while ($row = mysqli_fetch_array($query)) {
                $NAN=$row['NAN'];
                $izena=$row['izena'];
                $abizenak=$row['abizenak'];
                $telefonoa=$row['telefonoa'];
                $jaiotzeData=$row['jaiotzeData'];
                $pasahitza=$row['pasahitza'];
				$admin=$row['admin'];
        ?>
            <div class="formulario__grupo" id="grupo__izena">
				<label for="izena" class="formulario__label">Izena</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="izena" id="izena" value=<?php echo $izena?>>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Izenak gutxienez 4 karakter izan behar ditu eta gehienez 15</p>
			</div>

			<!-- Grupo: Abizen -->
			<div class="formulario__grupo" id="grupo__abizenak">
				<label for="abizenak" class="formulario__label">Abizenak</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="abizenak" id="abizenak" value=<?php echo $abizenak?>>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Abizenek gutxienez 5 karakter izan behar ditu eta gehienez 40</p>
			</div>

			<!-- Grupo: jaiotzeData -->
			<div class="formulario__grupo" id="grupo__jaiotzeData">
				<label for="jaiotzeData" class="formulario__label">Jaiotze data</label>
				<div class="formulario__grupo-input">
					<input type="date" class="formulario__input" name="jaiotzeData" id="jaiotzeData" value=<?php echo $jaiotzeData?>>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Izen eta abizenak gutxienez 5 karakter izan behar ditu eta gehienez 40</p>
			</div>
			
			<!-- Grupo: NAN -->
			<div class="formulario__grupo" id="grupo__nan">
				<label for="nan" class="formulario__label">NAN zenbakia</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nan" id="nan" value=<?php echo $NAN?>>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">NAN zenbakiak 8 digitu eta letra larri bat izan behar ditu </p>
			</div>

			<!-- Grupo: Pasahitza -->
			<div class="formulario__grupo" id="grupo__pasahitza">
				<label for="pasahitza" class="formulario__label">Pasahitza</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="pasahitza" id="pasahitza" value=<?php echo $pasahitza?>>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Pasahitzak gutxienez 8 digitu izan behar ditu eta gehienez 20</p>
			</div>

			<!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__email">
				<label for="email" class="formulario__label">Email</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="email" id="email" value=<?php echo $email?> disabled>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Hori ez da email baten formatua</p>
			</div>

			<!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefonoa">
				<label for="telefonoa" class="formulario__label">Telefonoa</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="telefonoa" id="telefonoa" value=<?php echo $telefonoa?>>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Telefono zenbakiak 9 digitu izan behar ditu soilik.</p>
			</div>
			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Ederto!</b> Zure datuak aldatu dira!</p>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn"> <i class="fas fa-paper-plane"> </i>   Bidali</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito"> </i> Zure erregistroa bidali da!</p>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<a href="../web/web.php" class="formulario__btn" > <i class="fas fa-caret-left fa-lg"></i> Atzera</a>
			</div>
        <?php } ?>
    </form>
    

    
</body>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> 
<script src="datuakAldatu.js"></script>
</html>