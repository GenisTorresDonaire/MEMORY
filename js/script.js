var IdCartas = [];
var CartasComparar = [];
var parejasEncontradas = 0;
var totalParejas; 
var contador;
var cronometro;

function quitarStyle(id){
    document.getElementById("carta"+id+"").removeAttribute("style");
}

function ejecutarSubmit(){
    var form = document.getElementById("formularioOculto");
    form.submit();
}

function saberTotalParejas(parejas){
    totalParejas = parejas;
}

function bloquearCartas(id){
    document.getElementById("carta"+id+"").removeAttribute("onclick");
}

function contadorTurnos(){
    var contador= document.getElementById("contador").innerHTML;
    contador++;
    document.getElementById("contador").innerHTML = contador;
    document.getElementById("intentosOcultos").setAttribute("value",contador);
}

function ponerDeFrente(id){
    var elementodiv = document.getElementById("carta"+id+"");
    elementodiv.className = "cartaActivada";
}

function ponerDelReves(id){ 
    var elementodiv = document.getElementById("carta"+id+"");
    elementodiv.className = "carta";
    //quitarStyle(id);
}

function sonidoAcierto(){
    var acierto = document.getElementById("acierto");
    acierto.play();
}

function sonidoFallo(){
    var fallo = document.getElementById("fallo");
    fallo.play();
}

function pausa(){

}

function ayuda(totalCartas){
    // FOR PARA RECORRER TODAS LAS CARTAS EN BUSCA DE LAS DEL REVES PARA MOSTRAR
    for (var idC = 0; idC < totalCartas; idC++){
        var classeCarta = document.getElementById("carta"+idC).className;
        
        // SI AUN NO ESTABA GIRADA ...
        if ( classeCarta == "carta"){
            ponerDeFrente(idC);
        }
    }

    // FUNCION DE DAR LA VUELTA CON RETRASO, PARA DAR TIEMPO A VERLAS.
    setTimeout(function(){
        for (var idC = 0; idC < totalCartas; idC++){
            var cartasQueMostrar = document.getElementById("carta"+idC).getAttribute("onclick");
            if ( cartasQueMostrar != null ){
                ponerDelReves(idC);
            }
        }
    },2000)

    // AUGMENTAR CONTADOR +5
    contadorTurnos();
    contadorTurnos();
    contadorTurnos();
    contadorTurnos();
    contadorTurnos();

    // REINCIO LAS ARRAYS DONDE GUARDO LAS SELECCIONADAS PARA QUE NO ALMACENE NADA UNA VEZ HAYA MOSTRADO TODAS
    CartasComparar = [];
    IdCartas = [];
}

function empezar(id,parejas){
    saberTotalParejas(parejas);
    
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
                var carta1 = IdCartas[0];
                var carta2 = IdCartas[1];
                
                // CONFIGURACION DEL MARCO VERDE AL SER PAREJAS
                document.getElementById("carta"+carta1+"").childNodes[1].childNodes[0].setAttribute("style","border: 2px solid green;");
                document.getElementById("carta"+carta2+"").childNodes[1].childNodes[0].setAttribute("style","border: 2px solid green;");
                sonidoAcierto();
                
                // Quitando Marcos una vez mostradas.
                setTimeout(function(){
                    document.getElementById("carta"+carta1+"").childNodes[1].childNodes[0].removeAttribute("style");
                }, 2000);
                
                setTimeout(function(){
                    document.getElementById("carta"+carta2+"").childNodes[1].childNodes[0].removeAttribute("style");
                }, 2000);              
                

                // Ahora toca bloquear la pareja encontrada.
                bloquearCartas(carta1);
                bloquearCartas(carta2);
                
                
				// Como ya se ha comparado toca reiniciar las arrays.
				CartasComparar = [];
            	IdCartas = [];
                
                // Hora de comparar si se han encontrado todas.
				if(parejasEncontradas == totalParejas){
                    setTimeout(function(){ejecutarSubmit();}, 2000);
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
                
                // Configuracion del marco
                document.getElementById("carta"+carta1+"").childNodes[1].childNodes[0].setAttribute("style","border: 2px solid red;");
                document.getElementById("carta"+carta2+"").childNodes[1].childNodes[0].setAttribute("style","border: 2px solid red;");
                
                // Aplicando el sonido
                sonidoFallo();

                // Quitando El Marco
                setTimeout(function(){
                    ponerDelReves(carta1);
                    document.getElementById("carta"+carta1+"").childNodes[1].childNodes[0].removeAttribute("style")
                },2000);

                setTimeout(function(){
                    ponerDelReves(carta2);
                    document.getElementById("carta"+carta2+"").childNodes[1].childNodes[0].removeAttribute("style");
                },2000);
                                

                // Llamamo a la funcion de limpiar arrays un segundo despues de girar las cartas.
                setTimeout(reiniciarArrays,3000);
                
            }
        }
    }
}