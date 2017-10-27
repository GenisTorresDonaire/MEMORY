<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <script type="text/javascript" src="../js/script.js"></script>
        <script type="text/php" src="../php/generartabla.php"></script>
		<title>Memory!!!</title>
	</head>
	
	<body>
        <div class="contenedor">
            <header>
                
            </header>

            <article>  
               <div class="tableRegistro">
                  <div class="tableInternoRegistro">
                    <h1 style="margin-top: 20px">FELICIDADES HAS GANADO!!</h1>
                    <br>
                    <form action="../ranking/guardarTusDatos.php" method="post">
                        <p>Bienvenido al menu de registro de tus datos. Aqui podras registrar tus datos y ver el ranking.</p>
                        <br></br>
                        <p>Nombre: <input style="text-align: center; border: 1px solid black;" type="text" name="NombreUsuario"/></p>
                        <br></br>
                        <p>Intentos: <input style="text-align: center; border: 1px solid black;" name="intentos" value='<?php echo $_POST["postIntentos"] ?>'  readonly/></p>
                        <br></br>
                        <p>Tiempos: <input style="text-align: center; border: 1px solid black;" name="tiempo" value='<?php echo $_POST["postTiempo"] ?>'  readonly/></p>
                        <br></br>
                        <p><button type="submit" class="enviarDatosUsuario">Enviar</button></p>
                    </form>   
                  </div>
               </div>
               
            </article>
            
            <footer>
                <h6>Copyright © 2017 Genis, Proyecto MEMORY.</h6>
            </footer>

		</div>
	</body>
</html>