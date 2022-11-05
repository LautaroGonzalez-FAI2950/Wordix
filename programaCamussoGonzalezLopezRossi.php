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
 * Obtiene una coleccion de partidas
 * @return array
 * (Completado punto 2 explicación 3)
 */
function cargarPartidas()
{
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
    ;

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
 * Esta funcion devuelve el indice de la primera partida ganada por un jugador en especifico
 * @param array $coleccionPartidas
 * @param string $jugador
 * @return int
 */
function indicePrimerPartidaGanada($coleccionPartidas, $jugador){
    $coleccionPartidas=cargarPartidas();
    $n = count($coleccionPartidas); //10
    $i=0;
    $indice=-1;
    $cortar= true;
    while ($i<$n && $i!=$indice){
        if ($jugador==$coleccionPartidas[$i]["jugador"] && $coleccionPartidas[$i]["puntaje"]>0 ){
        $indice=$i;
        }
        else $i++;
    }
    return $indice;
}
/**
 * Ingresa un valor y muestra la partida con ese valor
 */
//COMPLETADO (PUNTO6 EXPLICACION3)
function mostrarPartida(){
    /* INT $aux, BOOLEAN $consulta */
    echo "Ingrese un número de partida para mostrar: ";
    $consulta = true;
    $contador=count(cargarPartidas());
    do{
        $aux = trim(fgets(STDIN));
        if ($aux-1 <= $contador && $aux-1>=0){
            $consulta = false;
            print_r(cargarPartidas()[$aux-1]);
        } else {
            echo "Número inválido, ingrese otro número";
        }
    }while($consulta);
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);

/**
 * Esta funcion muestra el menu de wordix y compruba si la opcion seleccionada por el usuario
 * esta dentro del rango de opciones
 * @return Int
 * (Completado punto 3 explicación 3)
 */
function seleccionarOpcion(){
    $numeroOpcion = 0;
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
    echo "Ingrese la opcion que desea elegir: ";
    $numeroOpcion = trim(fgets(STDIN));//Obtiene la opcion del usuario
    if($numeroOpcion < 0 || $numeroOpcion > 9){
        //Si la opcion no es valida, pide al usuario que ingrese otra opcion
        do{
            echo "La opcion ingresada no es valida, por favor ingrese una opcion valida: ";
            $numeroOpcion = trim(fgets(STDIN));
        }while($numeroOpcion < 0 || $numeroOpcion > 9);
    }      
    return $numeroOpcion;
}

/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/
