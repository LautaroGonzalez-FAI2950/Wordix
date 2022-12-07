<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Gonzalez Lautaro FAI-2950 - Carrera: TUDW lautarofglez@gmail.com LautaroGonzalez-FAI2950
Camusso Valentin - FAI-3208 - Carrera: TUDW - valentin.camusso@est.fi.uncoma.edu.ar - github.com/ValentinCamussoFAI-3208
Emiliano Lopez - FAI-3357 - Carrera: TUDW - Mail: emiliano.lopez@est.fi.uncoma.edu.ar - Github: EmiMlz 
Rossi Julia - FAI-2378 - Carrera: TUDW - Mail: julia.rossi@est.fi.uncoma.edu.ar - Github: JuliaRossiFAI-2378 */

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Carga y retorna una colección de 20 palabras ya definidas que se utilizará en el juego
 * @return ARRAY
 */
//(Explicación 3 punto 1)
function cargarColeccionPalabras()
{
    // ARRAY $coleccionPalabras
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "ABRAN", "RATON", "PASOS", "LOSAS", "FECHA"
    ];

    return ($coleccionPalabras);
}
/**
 * Carga y retorna una colección de partidas de ejemplo, con la palabra jugada, el jugador que la jugó, en el intento en que adivinó o no y finalmente el puntaje obtenido
 * @return ARRAY
 */
//(Explicación 3 punto 2)
function cargarPartidas()
{
    // ARRAY $coleccionPartidas
    $coleccionPartidas = [];
    $coleccionPartidas [0]= ["palabraWordix" => "QUESO","jugador" => "majo","intentos" => 0,"puntaje" => 0];
    $coleccionPartidas [1]= ["palabraWordix" => "CASAS","jugador" => "rudolf","intentos" => 3,"puntaje" => 14];
    $coleccionPartidas [2]= ["palabraWordix" => "QUESO","jugador" => "pink2000","intentos" => 6,"puntaje" => 10];
    $coleccionPartidas [3]= ["palabraWordix" => "FUEGO","jugador" => "noobmaster69","intentos" => 1,"puntaje" => 13];
    $coleccionPartidas [4]= ["palabraWordix" => "TINTO","jugador" => "jebus","intentos" => 1,"puntaje" => 17];
    $coleccionPartidas [5]= ["palabraWordix" => "HUEVO","jugador" => "julia","intentos" => 4,"puntaje" => 11];
    $coleccionPartidas [6]= ["palabraWordix" => "LOSAS","jugador" => "felixmodelorjr","intentos" => 2,"puntaje" => 15];
    $coleccionPartidas [7]= ["palabraWordix" => "RATON","jugador" => "mickey","intentos" => 5,"puntaje" => 13];
    $coleccionPartidas [8]= ["palabraWordix" => "RATON","jugador" => "majo","intentos" => 5,"puntaje" => 13];
    $coleccionPartidas [9]= ["palabraWordix" => "GATOS","jugador" => "majo","intentos" => 2,"puntaje" => 15];
    $coleccionPartidas [10]= ["palabraWordix" => "NAVES","jugador" => "buzzlightyear","intentos" => 1,"puntaje" => 17];
    return ($coleccionPartidas);
}

/** Esta función recibe la colección de palabras y una palabra nueva ingresada por el jugador en el programa principal,
 * y retorna la colección de palabras con la palabra agregada.
 * @param ARRAY $coleccionPalabras
 * @param ARRAY $nuevaPalabra
 * @return ARRAY
 */
//(Explicación 3 punto 7)
function agregarPalabra ($coleccionPalabras, $nuevaPalabra) {
    /* A $coleccionPalabras se le añade la $nuevaPalabra en el índice de su longitud (ya que la longitud siempre
    es uno más grande que el último índice). */
    $coleccionPalabras[count($coleccionPalabras)] = $nuevaPalabra;
    return $coleccionPalabras;
}

/** Esta función devuelve el índice de la primera partida ganada por un jugador determinado por el usuario en el programa principal.
 * @param STRING $jugador
 * @param ARRAY $coleccionPartidas
 * @return INT
 */
//(Explicación 3 punto 8)
function indicePrimerPartidaGanada($jugador, $coleccionPartidas){
    //INT $n, $i, $indice
    $n = count($coleccionPartidas); 
    $i=0;
    $indice=-1; // Inicia en -1 para poder comparar, y cuando el jugador no esta registrado devuelve este valor
    while ($i<$n && $i!=$indice){
        if ($jugador==$coleccionPartidas[$i]["jugador"] && $coleccionPartidas[$i]["puntaje"]>0 ){
        $indice=$i;
        }elseif($jugador==$coleccionPartidas[$i]["jugador"] && $coleccionPartidas[$i]["puntaje"]==0){
            $indice = -2;
            $i++;
            // Devuelve -2 cuando el jugador jugó pero no ganó
        }else{
            $i++;
        }
    }
    return $indice;
}

/** Esta función solicita el nombre del jugador y retorna su nombre en minúsculas.
 * @return STRING
 */
//(Explicación 3 punto 10)
function solicitarJugador() {
    // STRING $nombre, BOOLEAN $comienzaLetra
    do { // Le pide el nombre al jugador hasta que lo que ingrese empieze con una letra
        echo "¿Nombre del jugador? Debe empezar con una letra: ";
        $nombre = trim(fgets(STDIN));
        $comienzaLetra = ctype_alpha($nombre[0]);
    } while (!$comienzaLetra);
    $nombre = strtolower($nombre); // Pasa el nombre a minúsculas
    return $nombre;
}

/** Esta función recibe un valor y muestra ese número de partida
 * @param ARRAY $partidas
 * @param INT $numeroPartida
 */
//COMPLETADO (Explicación 3 punto 6)
function mostrarPartida($partidas,$numeroPartida){
    /* ARRAY $arrayAux */
    $arrayAux = $partidas[$numeroPartida];
    //Muestra la partida
    echo "***************************************************\n";
    echo "Partida WORDIX ".$numeroPartida + 1 .": palabra ". $arrayAux["palabraWordix"]. "\n";
    echo "Jugador: ". $arrayAux["jugador"]. "\n";
    echo "Puntaje: ". $arrayAux["puntaje"]. " puntos \n";
    echo "Intento: ". (($arrayAux["intentos"]>0) ? "Adivinó la palabra en ". $arrayAux["intentos"]. " intentos \n" : "No adivinó la palabra \n");
    echo "***************************************************\n";
}

/** Esta función dada una colección de partidas y el nombre de un jugador retorna sus estadísticas
 * @param STRING $jugador
 * @param ARRAY $coleccionPartidas
 * @return ARRAY
 */
//(Explicación 3 punto 9)
function extraerResumenJugador($jugador,$coleccionPartidas) {
    /*ARRAY $resumenUnJugador
    INT $i, $contPartidasGanadas, $contPartidasTotales, $puntajeTotalUnJugador */
    //Inicialización de variables 
    $contPartidasGanadas = 0;
    $contPartidasTotales = 0;
    $puntajeTotalUnJugador = 0;
    $resumenUnJugador = ["jugador"=> "","cantidadPartidas"=> 0, "puntajeTotal"=>0, "victorias"=>0, "intento1"=>0, "intento2"=>0, "intento3"=>0, "intento4"=>0,"intento5"=>0,"intento6"=>0];
    for ($i = 0; $i < count($coleccionPartidas); $i++){
        if ($jugador == $coleccionPartidas[$i]["jugador"]){ // Comparo en cada iteración si el jugador es el mismo que el del índice $i de $coleccionPartidas
            $resumenUnJugador["jugador"] = $coleccionPartidas[$i]["jugador"]; //Guarda el nombre en $resumenUnJugador con clave "jugador"
            $puntajeTotalUnJugador += $coleccionPartidas[$i]["puntaje"]; // Suma el puntaje en $resumenUnJugador con clave "puntaje"
            switch ($coleccionPartidas[$i]["intentos"]) { //Este switch cambia por intento en el que ganó y cuenta la cantidad de veces que finaliza en tal intento
                case 1: $resumenUnJugador["intento1"]+= 1; $contPartidasGanadas++; break;
                case 2: $resumenUnJugador["intento2"]+= 1; $contPartidasGanadas++; break;
                case 3: $resumenUnJugador["intento3"]+= 1; $contPartidasGanadas++; break;
                case 4: $resumenUnJugador["intento4"]+= 1; $contPartidasGanadas++; break;
                case 5: $resumenUnJugador["intento5"]+= 1; $contPartidasGanadas++; break;
                case 6: $resumenUnJugador["intento6"]+= 1; $contPartidasGanadas++; break;
                }
            $contPartidasTotales++;
        }
    }
    //Se asigna en $resumenUnJugador los datos calculados
    $resumenUnJugador["cantidadPartidas"]= $contPartidasTotales;
    $resumenUnJugador["victorias"]= $contPartidasGanadas;
    $resumenUnJugador["puntajeTotal"]= $puntajeTotalUnJugador;
    return $resumenUnJugador;
}

/** Esta función compara una colección de partidas, las ordena alfabéticamente según jugador y palabra jugada
 * @param ARRAY $arrayComparativo1
 * @param ARRAY $arrayComparativo2
 * @return INT
 */
function comparacion ($arrayComparativo1, $arrayComparativo2){
    // INT $num
    $num = 1; // Lo inicializo en 1 para que si no pasa por ningún 'if' devuelva 1.
    if ($arrayComparativo1["palabraWordix"] == $arrayComparativo2["palabraWordix"]){
        $num = 0;
    } elseif (($arrayComparativo1["jugador"] < $arrayComparativo2["jugador"])) {
        $num = -1;
    }
    return $num;
}

/** Muestra toda la colección de partidas jugadas ordenadas alfabéticamente.
 * @param ARRAY $coleccionPartidas
 */
//(Explicación 3 punto 11)
function mostrarColeccionPartida($coleccionPartidas){
    uasort($coleccionPartidas, 'comparacion');
    print_r($coleccionPartidas);
}

/** Esta función muestra el menú de Wordix y comprueba si la opción seleccionada por el usuario esta dentro del rango de opciones
 * @return INT
 */
//(Explicación 3 punto 3)
function seleccionarOpcion(){
    /* INT $numeroOpcion */
    //Muestra el menú
    echo "Menu de opciones:\n";
    echo "\t1) Jugar al Wordix con una palabra elegida\n";
    echo "\t2) Jugar al Wordix con una palabra aleatoria\n";
    echo "\t3) Mostrar una partida\n";
    echo "\t4) Mostrar la primer partida ganadora\n";
    echo "\t5) Mostrar resumen de Jugador\n";
    echo "\t6) Mostrar listado de partidas ordenadas por jugador y por palabra\n";
    echo "\t7) Agregar una palabra de 5 letras a Wordix\n";
    echo "\t8) Salir\n";
    echo "Ingrese la opción que desea elegir: ";
    $numeroOpcion = solicitarNumeroEntre(1,8);
    return ($numeroOpcion);       
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

// Declaración de variables:
// STRING $nombreJugador, $palabraAgregada
// INT $numeroPalabra, $i, $opcion, $partidasJugador, $elIndice
// ARRAY $laColeccionPalabras, $laColeccionPartidas, $partida, $estadisticasJugador
// BOOLEAN $completado

//Proceso:
$laColeccionPartidas = cargarPartidas(); // 12) a)
$laColeccionPalabras = cargarColeccionPalabras(); // 12) b)

do {
    $opcion = seleccionarOpcion();
    /* Usamos un switch para una estructura de control especificada, en este caso solo tenemos 8 opciones a elegir, por lo cual
    el switch es una mejor opción antes que usar un if y consultar si el valor ingresado es 1,2,3...8*/
    //(Explicación 3, punto 12-e)
    switch ($opcion) {
        case 1:
            $completado = false;
            $nombreJugador = solicitarJugador();
            $partidasJugador = extraerResumenJugador($nombreJugador, $laColeccionPartidas)["cantidadPartidas"];
            echo "¿Con que número de palabra desea jugar?: ";
            $numeroPalabra = solicitarNumeroEntre(1,count($laColeccionPalabras)) - 1;
            $i=0;
            while ($i < count($laColeccionPartidas) && !$completado) {
                if ($partidasJugador == count($laColeccionPalabras)) { //(Agregado nuestro) Verifica si el jugador ya jugo con todas las palabras posibles asi no corre el programa infinitamente.
                    echo "Ya ha jugado con todas las palabras integradas del juego. Puede agregar más con la función 'Agregar palabra'\n";
                    $completado = true;
                } elseif ($laColeccionPartidas[$i]["jugador"] == $nombreJugador && $laColeccionPartidas[$i]["palabraWordix"] == $laColeccionPalabras[$numeroPalabra]) {
                    echo "La palabra solicitada ya fue utilizada por usted. Ingrese otro número: ";
                    $numeroPalabra = solicitarNumeroEntre(1,count($laColeccionPalabras)) - 1;
                    $i = -1;
                }
                $i++;
            }
            if (!$completado) {
                $partida = jugarWordix($laColeccionPalabras[$numeroPalabra], $nombreJugador);
                $laColeccionPartidas[count($laColeccionPartidas)] = $partida;
            }
            break;

        case 2: 
            $numeroPalabra = rand(0, count($laColeccionPalabras)-1);
            $completado = false;
            $nombreJugador = solicitarJugador();
            $partidasJugador = extraerResumenJugador($nombreJugador, $laColeccionPartidas)["cantidadPartidas"];
            $i=0;
            while ($i < count($laColeccionPartidas) && !$completado){
                if ($partidasJugador == count($laColeccionPalabras)) { //(Agregado nuestro) Verifica si el jugador ya jugo con todas las palabras posibles asi no corre el programa infinitamente.
                    echo "Ya ha jugado con todas las palabras integradas del juego. Puede agregar más con la función 'Agregar palabra'\n";
                    $completado = true;
                } elseif ($laColeccionPartidas[$i]["jugador"] == $nombreJugador && $laColeccionPartidas[$i]["palabraWordix"] == $laColeccionPalabras[$numeroPalabra]) {
                    $numeroPalabra = rand(0,count($laColeccionPalabras)-1);
                    $i = -1;
                }
                $i++;
            }

            if(!$completado){
                $partida = jugarWordix($laColeccionPalabras[$numeroPalabra], $nombreJugador);
                $laColeccionPartidas[count($laColeccionPartidas)]=$partida;
            }
            break;
            
            
        case 3: 
            echo "Ingrese un número de partida para mostrar (Entre 1 y ". count($laColeccionPartidas). "): ";
            $partidaJugada = solicitarNumeroEntre(1, count($laColeccionPartidas))-1; //Guarda un valor como índice
            mostrarPartida($laColeccionPartidas,$partidaJugada);
            sleep(3);
            break;

        case 4:
            $nombreJugador = solicitarJugador();
            $elIndice = indicePrimerPartidaGanada($nombreJugador, $laColeccionPartidas);
            while ($elIndice == -1) {
                echo "Ese jugador no existe, ingrese otro nombre.\n";
                $nombreJugador = solicitarJugador();
                $elIndice = indicePrimerPartidaGanada($nombreJugador, $laColeccionPartidas);
            }
            if($elIndice == -2){
                echo "El jugador ",$nombreJugador," no ganó ninguna partida.\n";
            } elseif ($elIndice >= 0) {
                mostrarPartida($laColeccionPartidas, $elIndice);
            }
            sleep(3);
            break;

        case 5:
            $nombreJugador = solicitarJugador();
            $estadisticasJugador = extraerResumenJugador($nombreJugador, $laColeccionPartidas);
            while ($estadisticasJugador["cantidadPartidas"] == 0) {
                echo "El jugador ingresado no existe en la colección de partidas, ingrese otro.\n";
                $nombreJugador = solicitarJugador();
                $estadisticasJugador = extraerResumenJugador($nombreJugador, $laColeccionPartidas);
            }
            echo "**************************************\n";
            echo "Jugador: ",$nombreJugador,"\n";
            echo "Partidas: ",$estadisticasJugador["cantidadPartidas"],"\n";
            echo "Puntaje Total: ",$estadisticasJugador["puntajeTotal"],"\n";
            echo "Victorias: ",$estadisticasJugador["victorias"],"\n";
            echo "Porcentaje de Victorias: ",(int)(($estadisticasJugador["victorias"]*100)/$estadisticasJugador["cantidadPartidas"]),"%\n";
            echo "Adivinadas:","\n";
            echo "\tIntento 1: ",$estadisticasJugador["intento1"],"\n";
            echo "\tIntento 2: ",$estadisticasJugador["intento2"],"\n";
            echo "\tIntento 3: ",$estadisticasJugador["intento3"],"\n";
            echo "\tIntento 4: ",$estadisticasJugador["intento4"],"\n";
            echo "\tIntento 5: ",$estadisticasJugador["intento5"],"\n";
            echo "\tIntento 6: ",$estadisticasJugador["intento6"],"\n";
            echo "**************************************\n";
            sleep(4);
            break;

        case 6:
            mostrarColeccionPartida($laColeccionPartidas);
            break;
            
        case 7:
            $palabraAgregada = leerPalabra5Letras();
            $palabraValida = true;
            $i = 0;
            $palabrasTotales = count($laColeccionPalabras);
            while ($i<$palabrasTotales && $palabraValida){
                if ($palabraAgregada == $laColeccionPalabras[$i]){
                    $palabraValida = false;
                    echo "La palabra ya se encuentra en el juego.\n";
                }
                else{
                    $i++;
                }
            }
            if ($palabraValida){
                $laColeccionPalabras = agregarPalabra($laColeccionPalabras,$palabraAgregada);
            }            
            break;
        }
}while ($opcion != 8); // Explicación 3 punto 12-c
