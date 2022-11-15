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
 * Obtiene una colección de palabras
 * @return array
 * (Completado punto 1 explicación 3)
 */
function cargarColeccionPalabras()
{
    // array $coleccionPalabras
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "ABRAN", "RATON", "PASOS", "LOSAS", "FECHA"
        //COMPLETADO
    ];

    return ($coleccionPalabras);
}
/**
 * Obtiene una colección de partidas
 * @return array
 * (Completado punto 2 explicación 3)
 */
function cargarPartidas()
{
    // array $coleccionPartidas
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
    //COMPLETADO
    return ($coleccionPartidas);
}

/** 
 * Esta función recibe la colección de palabras y una nueva palabra para retornar la colección de palabras con la nueva palabra.
 * @param array $coleccionPalabras
 * @param array $nuevaPalabra
 * @return array
 * (Completado punto 7 explicación 3)
 */
function agregarPalabra ($coleccionPalabras, $nuevaPalabra) {
    // A coleccionPalabras se le añade la nuevaPalabra en el indice de su longitud(ya que la longitud siempre es mas grande que el índice)
    $coleccionPalabras[count($coleccionPalabras)] = $nuevaPalabra;
    return $coleccionPalabras;
}
/**
 * Esta función devuelve el índice de la primera partida ganada por un jugador en específico
 * @param string $jugador
 * @param array $coleccionPartidas
 * @return int
 * COMPLETADO punto 8 Ejercicio 3
 */
function indicePrimerPartidaGanada($jugador, $coleccionPartidas){
    //int $n, $i, $contador, $indice
    $n = count($coleccionPartidas); 
    $i=0;
    $indice=-1;
    while ($i<$n && $i!=$indice){
        if ($jugador==$coleccionPartidas[$i]["jugador"] && $coleccionPartidas[$i]["puntaje"]>0 ){
        $indice=$i;
        }elseif($jugador==$coleccionPartidas[$i]["jugador"] && $coleccionPartidas[$i]["puntaje"]==0){
            $indice = -2;
            $i++;
        }else{
            $i++;
        }
    }
    return $indice;
}
/** Esta función solicita al usuario el nombre de un jugador y retorna el nombre en minúsculas
 * @return string
 * (COMPLETADO PUNTO 10 EXPLICACIÓN 3)
 */
function solicitarJugador() {
    // STRING $nombre, BOOLEAN $comienzaLetra
    do {
        echo "¿Nombre del jugador? Debe empezar con una letra: ";
        $nombre = trim(fgets(STDIN));
        $comienzaLetra = ctype_alpha($nombre[0]);
    } while (!$comienzaLetra);
    $nombre = strtolower($nombre);
    return $nombre;
}
/**
 * Ingresa un valor y muestra la partida con ese valor
 */
//COMPLETADO (PUNTO 6 EXPLICACION 3)
function mostrarPartida($partidas,$numeroPartida){
    /* Array $arrayAux, INT $maximoPartida, $puntajePartida, $partidaJugada, STRING $jugadorPartida, $palabraPartida */
    $arrayAux = $partidas[$numeroPartida];
    $palabraPartida = $arrayAux["palabraWordix"];
    $jugadorPartida = $arrayAux["jugador"];
    $puntajePartida = $arrayAux["puntaje"];

    //Mostrar partida
    echo "***************************************************\n";
    echo "Partida WORDIX ".$numeroPartida + 1 .": palabra ". $palabraPartida. "\n";
    echo "Jugador: ". $jugadorPartida. "\n";
    echo "Puntaje: ". $puntajePartida. " puntos \n";
    echo "Intento: ". (($arrayAux["intentos"]>0) ? "Adivinó la palabra en ". $arrayAux["intentos"]. " intentos \n" : "No adivinó la palabra \n");
    echo "***************************************************\n";
}

/** Esta función retorna dada una coleccion de partidas la información de UN jugador
 * @param string $jugador
 * @param array $coleccionPartidas
 * @return array
 */
function extraerResumenJugador($jugador,$coleccionPartidas) {
// array $resumenUnJugador, int $n,$i, $contPartidasGanadas, $contPartidasTotales, $puntajeTotalUnJugador, boolean $existe
    $n = count($coleccionPartidas); 
    $contPartidasGanadas= 0;
    $contPartidasTotales= 0;
    $puntajeTotalUnJugador=0;
    $resumenUnJugador=["jugador"=> "","cantidadPartidas"=> 0, "puntajeTotal"=>0, "victorias"=>0, "intento1"=>0, "intento2"=>0, "intento3"=>0, "intento4"=>0,"intento5"=>0,"intento6"=>0];
    $existe= false;
    for ($i=0; $i<$n; $i++){
        if ($jugador==$coleccionPartidas[$i]["jugador"]){
            $resumenUnJugador["jugador"]= $coleccionPartidas[$i]["jugador"];
            $puntajeTotalUnJugador += $coleccionPartidas[$i]["puntaje"];
            $existe = true;
            switch ($coleccionPartidas[$i]["intentos"]) {
                case 1: $resumenUnJugador["intento1"]+= 1;$contPartidasGanadas++;; break;
                case 2: $resumenUnJugador["intento2"]+= 1;$contPartidasGanadas++;break;
                case 3: $resumenUnJugador["intento3"]+= 1;$contPartidasGanadas++;break;
                case 4: $resumenUnJugador["intento4"]+= 1;$contPartidasGanadas++;break;
                case 5: $resumenUnJugador["intento5"]+= 1;$contPartidasGanadas++; break;
                case 6: $resumenUnJugador["intento6"]+= 1;$contPartidasGanadas++; break;
                }
                $contPartidasTotales++;
        } elseif($i+1==$n && !$existe) {
            echo "El jugador ingresado no existe en la colección de partidas, ingrese uno nuevamente: ";
            $jugador= trim(fgets(STDIN));
            $i=-1;
        }
    }
    $resumenUnJugador["cantidadPartidas"]= $contPartidasTotales;
    $resumenUnJugador["victorias"]= $contPartidasGanadas;
    $resumenUnJugador["puntajeTotal"]= $puntajeTotalUnJugador;
    return $resumenUnJugador;
}

/** Esta función compara una colección de partida y las ordena alfabéticamente según jugador y palabra jugada
 * @param Array $a
 * @param Array $b
 * @return Int
 */
function comparacion($a,$b){
    if ($a["palabraWordix"]==$b["palabraWordix"]){
        return 0;
    }
    return (($a["jugador"]<$b["jugador"]) ? -1 : 1);
}
/** Muestra la colección de partidas total
 * @param array $coleccionPartidas
 */
function mostrarColeccionPartida($coleccionPartidas){
    uasort($coleccionPartidas, 'comparacion');
    print_r($coleccionPartidas);
}

/**
 * Esta función muestra el menú de wordix y comprueba si la opción seleccionada por el usuario
 * esta dentro del rango de opciones
 * @return Int
 * (Completado punto 3 explicación 3)
 */
function seleccionarOpcion(){
    /*INT $numeroOpcion, $minimoOpcion, $maximoOpcion */
    //Muestra el menu
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
//Declaración de variables:
// STRING $nombreJugador
// INT $numeroPalabra, $i
// ARRAY $laColeccionPalabras, $laColeccionPartidas, $partida
//Inicialización de variables:


//Proceso:
$laColeccionPartidas = cargarPartidas(); // 12) a)
$laColeccionPalabras = cargarColeccionPalabras(); // 12) b)

do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: 
            $cantidadPartidas = count($laColeccionPartidas);
            $nombreJugador = solicitarJugador();
            echo "¿Con que número de palabra desea jugar?: ";
            $numeroPalabra = solicitarNumeroEntre(1,count($laColeccionPalabras)) - 1;
            for ($i = 0; $i < count($laColeccionPartidas); $i++) {
                if ($laColeccionPartidas[$i]["jugador"] == $nombreJugador && $laColeccionPartidas[$i]["palabraWordix"] == $laColeccionPalabras[$numeroPalabra]) {
                    echo "La palabra solicitada ya fue utilizada por usted. Ingrese otro número: ";
                    $numeroPalabra = solicitarNumeroEntre(1,count($laColeccionPalabras)) - 1;
                    $i = -1;
                }
            }
            $partida = jugarWordix($laColeccionPalabras[$numeroPalabra], $nombreJugador);
            $laColeccionPartidas[count($laColeccionPartidas)] = $partida;
            break;
        case 2: 
            $nombreJugador=solicitarJugador();
            $numeroPalabra=rand(0, count($laColeccionPalabras)-1);
            for ($i = 0; $i < count($laColeccionPartidas)-1; $i++) {
                if ($laColeccionPartidas[$i]["jugador"] == $nombreJugador && $laColeccionPartidas[$i]["palabraWordix"] == $laColeccionPalabras[$numeroPalabra]) {
                    echo "La palabra generada aleatoriamente ya fue utilizada por usted. Generando uno nuevo: ";
                    $numeroPalabra = rand(0,count($laColeccionPalabras)-1);
                    $i = -1;
                }
            }
            $partida = jugarWordix($laColeccionPalabras[$numeroPalabra], $nombreJugador);
            $laColeccionPartidas[count($laColeccionPartidas)]=$partida;
            break;
        case 3: 
            echo "Ingrese un número de partida para mostrar (Entre 1 y ". count($laColeccionPartidas). "): ";
            $partidaJugada = solicitarNumeroEntre(1, count($laColeccionPartidas))-1; //Guarda un valor como índice
            mostrarPartida($laColeccionPartidas,$partidaJugada);
            sleep(5);
            break;
        case 4:
            $nombreJugador = solicitarJugador();
            $elIndice = indicePrimerPartidaGanada($nombreJugador, $laColeccionPartidas);
            if($elIndice == -1){
                echo "No existe el jugador.";
            }elseif($elIndice == -2){
                echo "El jugador ",$nombreJugador," no ganó ninguna partida";
            }else{
                mostrarPartida($laColeccionPartidas,$elIndice);
            }
            sleep(5);
            break;

        case 5:
            $nombreJugador = solicitarJugador();
            $estadisticasJugador = extraerResumenJugador($nombreJugador,$laColeccionPartidas);
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
            sleep(5);
            break;
        case 6:
            mostrarColeccionPartida($laColeccionPartidas);
            break;
        case 7:
            $palabraAgregada = leerPalabra5Letras();
            $laColeccionPalabras = agregarPalabra($laColeccionPalabras,$palabraAgregada);
            break;
        }

}while ($opcion != 8); // 12) c)
