<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <script type="text/javascript" src="../js/script.js"></script>
        <script type="text/php" href="php/generartabla.php"></script>
		<title>Memory!!!</title>
	</head>
	
	<body>
        <div class="contenedor">
            
            <header>
               <h1>Memory</h1>
            </header>
            
            <article>
				<?php
					$Filas = 2;
					$Columnas = 3;
   
					//CREACION DE ARRAY CON NUMEROS REPETIDOS, SOLO 2
					$lista = array();
					$totalnum = ($Filas * $Columnas / 2);
					// GENERADOR DE NUMEROS PARES ALEATORIOS			
					for ($x = 0; $x < $totalnum; $x++){
						array_push($lista, $x);
						array_push($lista, $x);
					}
					echo "<p>Intentos: </p><a id='contador'>0</a>";
				    // MEZCLA DE NUMEROS ALEATORIOS 
				    shuffle ($lista);
					$id = 0; 
					echo "<div class='table'>";
                
					// CREACION DE TABLA
					echo "<table class='tablarandom' >";
					for ($i = 0; $i < $Filas; $i++){
						echo "<tr>";
						for ($u = 0;$u < $Columnas; $u++){
							echo "<td>";
							echo "<div id='carta".$id."' class='carta' onclick='empezar(".$id.")'>";
								echo "<div class='lado frente'><img src='../imagenes/delReves.png'/></div>";
								echo "<div class='lado atras'><img src='../imagenes/png".$lista[$id++].".png'/></div>";								
							echo "</div>";
							echo "</td>";								
						}
						echo "</tr>";
					}
					echo "</table>";
					echo "</div>";
				?>
           
            </article>
            
            <footer>
                <h6>Copyright © 2017 Genis, Proyecto MEMORY.</h6>
            </footer>

		</div>
	</body>
</html>