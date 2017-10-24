<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <script type="text/javascript" src="../js/script.js"></script>
        <script type="text/php" href="php/generartabla.php"></script>
		<title>Memory!!!</title>

	</head>
	
	<body onload="carga()">
        <div class="contenedor">
           	<article>
                <audio id="acierto" src="../imagenes/acierto.mp3"></audio>
                <audio id="fallo" src="../imagenes/fallo.mp3"></audio>
				
				<?php
					
					$id = 0;

					$tablero = $_POST["seleccionTablero"];
					if ($tablero == "2"){
						$Filas = 2;
						$Columnas = 2;
					}else if ($tablero == "4"){
						$Filas = 4;
						$Columnas = 4;
					}else if ($tablero == "6"){
						$Filas = 6;
						$Columnas = 6;
					}else if ($tablero == "8"){
						$Filas = 8;
						$Columnas = 8;
					}									
   
					//CREACION DE ARRAY CON NUMEROS REPETIDOS, SOLO 2
					$lista = new ArrayObject();	// El array ha sido modificado a ArrayObject para poder utilizar el getArrayCopy
					$totalnum = ($Filas * $Columnas / 2);
					
					// GENERADOR DE NUMEROS PARES ALEATORIOS			
					for ($x = 0; $x < $totalnum; $x++){
						$lista->append($x);
						$lista->append($x);
					}

					// MEZCLA DE NUMEROS ALEATORIOS 
				    $lista->asort();
				    
				    // Comprovacion de si ya se ha guardado la primera vez, asi solo generara la copia inicial y no volvera a hacerla.
				    if (isset($_SESSION['copia'])){}
					else{
						$copy = $lista->getArrayCopy();
						$_SESSION['copia'] = $copy;
				    }

					$totalCartas = sizeof($lista);

					 // CONTADOR
                    echo "<div class='contenedorMenu'>";
                        echo "<div class='divIntentos'>";
                            echo "Intentos: <label id='contador'>0</label>";
                        echo "</div>";
                        echo "<div class='divTiempo'>";
                            echo "Tiempo: <span id='minutos'>00</span>:<span id='segundos'>00</span>";
                        echo "</div>";
                        echo "<div class='divBotonRanking'>";
                            echo "<img id='ranking' src='../imagenes/botonRanking.png'/>";
                        echo "</div>";
                        echo "<div class='divBotonAyuda'>";
                            echo "<img id='ayuda' src='../imagenes/botonAyuda.png' onclick='ayuda(".$totalCartas.")'/>";
                        echo "</div>";
                        echo "<div class='divBotonPausar'>";
                            echo "<img id='pause' src='../imagenes/botonPausar.png' onclick='pausar()'/>";
                        echo "</div>";
                    echo "</div>";
										         
                    // FORM OCULTO PARA ENVIAR EL CONTADOR DE INTENTOS
					echo "<form action='../ranking/introducirDatosUsuario.php' id='formularioOculto' method='post'>";
						echo "<input type='hidden' id='intentosOcultos' name='postIntentos' value='0' />";
					echo "</form>";

					echo "<div class='divPausar'>";
					echo "</div>";

					echo "<div class='table'>";
                
					// CREACION DE TABLA
					echo "<table class='tablarandom' >";
					for ($i = 0; $i < $Filas; $i++){
						echo "<tr>";
						for ($u = 0;$u < $Columnas; $u++){
							echo "<td>";
							echo "<div id='carta".$id."' class='carta' onclick='empezar(".$id.",".$totalnum.")'>";
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