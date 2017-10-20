var IdCartas = [];
var CartasComparar = [];
var parejasEncontradas = 0;
var totalParejas = 3; 

function bloquearCartas(id){
    document.getElementById("carta"+id+"").removeAttribute("onclick");
}

function contadorTurnos(){
    var contador= document.getElementById("contador").innerHTML;
    contador++;
    document.getElementById("contador").innerHTML = contador;
}

function ponerDeFrente(id){
    var elementodiv = document.getElementById("carta"+id+"");
    elementodiv.className = "cartaActivada";
}

function ponerDelReves(id){ 
    var elementodiv = document.getElementById("carta"+id+"");
    elementodiv.className = "carta";
}

function irAlRanking(){
   window.open("../ranking/introducirDatosUsuario.html", "_self", "", true)
}

function empezar(id){
    
    // Capturar el tipo de clase de la carta seleccionada. Es decir si ha sido girada o no.
    var claseCartaSeleccionada = document.getElementById("carta"+id).className;
    
    // Este pequeño if se encarga de filtrar que no se hayan seleccionado mas de dos, y que no se haya seleccionado una ya girada.
    if(claseCartaSeleccionada == "carta" && CartasComparar.length < 2){
        
        // Comprobar que no haya guardad ninguna carta.
        if(CartasComparar.length == 0){
			var Im1 = document.getElementById("carta"+id+"").childNodes[1].childNodes[0].getAttribute('src');
            CartasComparar.push(Im1);
			IdCartas.push(id);
            ponerDeFrente(id);
        } 
        // Comprobar que solo tengo una carta en el array. 
        else if(CartasComparar.length == 1){
			var Img2 = document.getElementById("carta"+id+"").childNodes[1].childNodes[0].getAttribute('src');
            CartasComparar.push(Img2);
			IdCartas.push(id);
            ponerDeFrente(id);
            contadorTurnos();
            
            // Si la pareja es igual...
			if(CartasComparar[0] == CartasComparar[1]){
                parejasEncontradas++;
                
                // Ahora toca bloquear la pareja encontrada.
                var carta1 = IdCartas[0];
                var carta2 = IdCartas[1];  
                bloquearCartas(carta1);
                bloquearCartas(carta2);
                
				// Como ya se ha comparado toca reiniciar las arrays.
				CartasComparar = [];
            	IdCartas = [];
				
                // Hora de comparar si se han encontrado todas.
				if(parejasEncontradas == totalParejas){
					setTimeout(function(){irAlRanking();}, 2000);
				}
			}
            
            // Si no son iguales la pareja...
            else{
                /* Creo esta funcion para que no limpie la array, hasta que se han girado
                ambas cartas ya que sino, deja girar antes de tiempo, las otras cartas.
                */
                function reiniciarArrays(){
                    CartasComparar = [];
                    IdCartas = [];
                }
                
                // Capturacion de las ids seleccionadas, y llamada a la funcion para volverlas del reves.
                var carta1 = IdCartas[0];
                var carta2 = IdCartas[1];   
                setTimeout(function(){ponerDelReves(carta1);},2000);
                setTimeout(function(){ponerDelReves(carta2);},2000);
                
                // Llamamo a la funcion de limpiar arrays un segundo despues de girar las cartas.
                setTimeout(reiniciarArrays,3000);
                
            }
        }
    }
}