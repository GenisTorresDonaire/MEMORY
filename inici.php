<?php
  session_start();
<<<<<<< HEAD:inici.php
  //unset($_SESSION["partida"]);
=======
  unset($_SESSION["partida"]);
>>>>>>> 4d9d958944900878692f9e4c611f46952a9ccc89:inici.php
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/style.css" type="text/css"/>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/php" src="php/generartabla.php"></script>
		<title>Memory!!!</title>
	</head>
	
	<body>
        <div class="contenedor">
            <header>
                
            </header>
            <article>
               <div class="divInicio">
                   <br>
                   <h3>Mecánica del juego</h3>
                   <br>
                   <ul style="list-style-type:none">
                       <li>- Todas las cartas empiezan boca abajo.</li>
                       <li>- Si no son parejas, volveran a su estado inicial.</li>
                       <li>- Cada intento de levantar las parejas sumara un intento.</li>
                       <li>- No se puede elegir la misma carta dos veces.</li>
                       <li>- Una vez encontrada una de las parejas se quedaran boca arriba, sin poder tocarlas.</li>
                   </ul>
                   <br>
                    <div class="tableInternoRegistro">
                        <form action="php/generartabla.php" method="post">
                            <select name="seleccionTablero">
                              <option value="2">2x2</option>
                              <option value="4">4x4</option>
                              <option value="6">6x6</option>
                              <option value="8">8x8</option>
                            </select>
                            <br>
                            <input type="submit" class="iniciar">
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