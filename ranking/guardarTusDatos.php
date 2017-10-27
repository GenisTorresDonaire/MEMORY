<?php
    session_start();
?>

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
               
            </header>
            
            <article>
				<?php
                    $arrayDatos = array();
                    
                    // CAPTURO LA VARIABLE DEL NOMBRE Y INTENTOS
                    $NombreUsuario = $_POST['NombreUsuario'];
                    $intentos = $_POST['intentos']; 
                    
                    $_SESSION["user"] = $NombreUsuario;

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
                            echo "<table class='tablerankingGeneral'>";
                                    echo "<h1>RANKING GENERAL</h1>";
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

                        echo "<br>";
                            
                            echo "<table class='tablerankingPersonal'>";
                                    echo "<h1>RANKING PERSONAL</h1>";
                                    $file = fopen("datos.txt", "r");
                                    while(!feof($file)){ 
                                        echo "<tr>";
                                            echo "<td>";
                                            if (fgets($file) == 'Ashly'){

                                                echo "".fgets($file)."";
                                                echo "</td>";
                                                echo "<td>";
                                                    echo "".fgets($file)."";
                                                echo "</td>";
                                                
                                            }
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