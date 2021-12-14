<?php
session_abort();
?>
<html>
    <head>
        <link rel="stylesheet" href="indexStyle.css">
        <!--Para evitar tener que recargar la caché  -->
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <!--Para evitar tener que recargar la caché  -->
    </head>
    <body>
    <div class="contenedor">
        <div class="hijo">
        <form name="formulario" class="formulario" id="formulario" method="post" action="loginDB.php">			
            
				<div class="formulario__grupo formulario__grupo-btn-enviar">
				<a href="saioaHasi/login.html" class="formulario__btn" >  Sartu </a>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<a href="erregistratu/erregistroa.html" class="formulario__btn" >  Erregistratu </a>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<a href="web/web.php" class="formulario__btn" > Katalogoa</a>
			</div>
        </div>
        </div>
			
		</form>
    </body>
</html>