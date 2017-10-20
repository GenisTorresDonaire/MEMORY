<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <script type="text/javascript" src="../js/script.js"></script>
        <script type="text/php" href="../php/generartabla.php"></script>
		<title>Memory!!!</title>
	</head>
	
	<body>
        <div class="contenedor">
            
            <header>
               <h1>Memory</h1>
            </header>
            
            <article>
				<?php
                    $arrayDatos = array();
                    
                    // CAPTURO LA VARIABLE DEL NOMBRE Y INTENTOS
                    $NombreUsuario = $_POST['NombreUsuario'];
                    $intentos = 13; /////////////////////////////////// ESTA FIJO POR AHORA
                    
                    // GENERO UNA VARIABLE CON TODOS LOS DATOS PARA INTRODUCIR
                    $arrayDatos[$NombreUsuario] = $intentos;
                    asort($arrayDatos);
                    registrarDatos($arrayDatos);
                    
                    function registrarDatos($arrayDatos){
                        foreach($arrayDatos as $NombreUsuario => $intentos) {
                            $file = fopen("datos.txt","a");
                            fputs($file,"$NombreUsuario"."\n");
                            fputs($file,"$intentos"."\n");
                            fclose($file);
                        }
                    }
                
                    printarTabla();
                
                    function printarTabla(){
                        
                        echo "<div class='divranking'>";
                            echo "<table class='tableranking'>";
                                    echo "<h1>RANKING MEMORY</h1>";
                                    $file = fopen("datos.txt", "r");
                                    while(!feof($file)){ 
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "".fgets($file)."";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "".fgets($file)."";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    fclose($file);
                            echo "</table>";
                        echo "</div>";
                        
                        }
                    
                ?>
           
            </article>
            
            <footer>
                <h6>Copyright © 2017 Genis, Proyecto MEMORY.</h6>
            </footer>

		</div>
	</body>
</html>