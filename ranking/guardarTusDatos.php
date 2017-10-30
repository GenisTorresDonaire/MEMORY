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
<<<<<<< HEAD
=======
               
>>>>>>> 4d9d958944900878692f9e4c611f46952a9ccc89
            </header>
            
            <article>
				<?php
                    $arrayGeneral = array();
<<<<<<< HEAD

                    // Controlar si la array ya es creada para mantenerla o remplazar
                    if(!isset($_SESSION["arrayPersonal"])){
                    	$_SESSION["arrayPersonal"] = array();
                    }
					
					$arrayPersonal = $_SESSION["arrayPersonal"];
=======
                    $arrayPersonal = $_SESSION["arrayPersonal"];
>>>>>>> 4d9d958944900878692f9e4c611f46952a9ccc89

                    // CAPTURO LA VARIABLE DEL NOMBRE Y INTENTOS
                    $NombreUsuario = $_POST['NombreUsuario'];
                    $intentos = $_POST['intentos']; 
                    $tiempo = $_POST['tiempo']; 
<<<<<<< HEAD
                    
                    // Añadiendo en general todos los datos de las partidas
                    $arrayGeneral["intentos"] = $intentos;
                    $arrayGeneral["tiempo"] = $tiempo;
                    $arrayGeneral["nombre"] = $NombreUsuario;
                                       
                    registrarDatos($arrayGeneral);
                    
                    // Añadiendo en personal todos los usuarios que entren en SESSION
                    $arrayPorUsuario = array();
                    array_push($arrayPorUsuario, $intentos, $tiempo, $NombreUsuario);
	                array_push($arrayPersonal, $arrayPorUsuario);
                    $_SESSION["arrayPersonal"] = $arrayPersonal;
                    
=======
                    
                    // Añadiendo en general todos los datos de las partidas
                    $arrayGeneral["nombre"] = $NombreUsuario;
                    $arrayGeneral["intentos"] = $intentos;
                    $arrayGeneral["tiempo"] = $tiempo;
                    registrarDatos($arrayGeneral);
                    
                    // Añadiendo en personal todos los usuarios que entren en SESSION
                    array_push($arrayPersonal, $NombreUsuario, $intentos, $tiempo);
                    $_SESSION["arrayPersonal"] = $arrayPersonal;
                    
>>>>>>> 4d9d958944900878692f9e4c611f46952a9ccc89
                    function registrarDatos($arrayGeneral){
                        foreach($arrayGeneral as $key=>$value) {
                            $file = fopen("datos.txt","a");
                            fputs($file,"$value"."\n");
                            fclose($file);
                        }
                    }
                    
                    printarTabla();
                
                    function printarTabla(){
                        echo "<div class='divranking'>";
                            echo "<table class='tablerankingGeneral'>";
                                    echo "<h1>RANKING GENERAL</h1>";
                                    echo "<tr>";
<<<<<<< HEAD
	                                    echo "<td>";
	                                        echo "<b>Nombre</b>";
	                                    echo "</td>";
	                                    echo "<td>";
	                                        echo "<b>Intentos</b>";
	                                    echo "</td>";
	                                    echo "<td>";
	                                        echo "<b>Tiempo</b>";
	                                    echo "</td>";
	                                echo "</tr>";
=======
                                            echo "<td>";
                                                echo "Nombre";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "Intentos";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "Tiempo";
                                            echo "</td>";
                                    echo "</tr>";
>>>>>>> 4d9d958944900878692f9e4c611f46952a9ccc89

                                    $file = fopen("datos.txt", "r");
                                    while(!feof($file)){ 
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "".fgets($file)."";
                                            echo "</td>";
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
<<<<<<< HEAD
						
						echo "<div class='divrankingPersonal'>";
	                        echo "<table class='tablerankingPersonal'>";
	                                echo "<h1>RANKING PERSONAL</h1>";
	                                echo "<tr>";
	                                    echo "<td>";
	                                        echo "<b>Nombre</b>";
	                                    echo "</td>";
	                                    echo "<td>";
	                                        echo "<b>Intentos</b>";
	                                    echo "</td>";
	                                    echo "<td>";
	                                        echo "<b>Tiempo</b>";
	                                    echo "</td>";
	                                echo "</tr>";

	                                $maixmo = sizeof($_SESSION["arrayPersonal"]);

	                                for ( $x = 0; $x < $maixmo; $x++) {
	                                    echo "<tr>";
	                                        echo "<td>";
	                                            echo $_SESSION["arrayPersonal"][$x][0];
	                                        echo "</td>";
	                                        echo "<td>";
	                                            echo $_SESSION["arrayPersonal"][$x][1];
	                                        echo "</td>";
	                                        echo "<td>";
	                                            echo $_SESSION["arrayPersonal"][$x][2];
	                                        echo "</td>";
	                                    echo "</tr>";
	                                }

	                        echo "</table>";    
	                       echo "</div>";
=======

                        echo "<br></br>";

                        echo "<table class='tablerankingPersonal'>";
                                echo "<h1>RANKING PERSONAL</h1>";
                                echo "<tr>";
                                    echo "<td>";
                                        echo "Nombre";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "Intentos";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "Tiempo";
                                    echo "</td>";
                                echo "</tr>";

                                $maixmo = sizeof($_SESSION["arrayPersonal"]);

                                for ( $x = 0; $x <= $maixmo; $x++) {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $_SESSION["arrayPersonal"][$x];
                                        echo "</td>";
                                        $x++;
                                        echo "<td>";
                                            echo $_SESSION["arrayPersonal"][$x];
                                        echo "</td>";
                                        $x++; 
                                        echo "<td>";
                                            echo $_SESSION["arrayPersonal"][$x];
                                        echo "</td>";   
                                    echo "</tr>";
                                }
                        echo "</table>";    
>>>>>>> 4d9d958944900878692f9e4c611f46952a9ccc89
                    }            
                ?>           
            </article>
            
            <footer>
                <h6>Copyright © 2017 Genis, Proyecto MEMORY.</h6>
            </footer>
		</div>
	</body>
</html>