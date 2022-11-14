<?php 
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
$jugador = "majo";
function indicePrimerPartidaGanada($jugador){
    //int $n, $i, $indice, Array $coleccionPartidas
    $coleccionPartidas=cargarPartidas();
    $n = count($coleccionPartidas); 
    $i=0;
    $contador = 0;
    $indice=-1;
    while ($i<$n && $i!=$indice){
        if ($jugador==$coleccionPartidas[$i]["jugador"] && $coleccionPartidas[$i]["puntaje"]>0 ){
            $indice=$i;
            $contador++;
        }elseif($jugador==$coleccionPartidas[$i]["jugador"] && $coleccionPartidas[$i]["puntaje"]==0){
            $indice = -2;
            $contador++;
            $i++;
        }
        else{
            $i++;
            $contador++;
        } 
    }
    echo $indice;
    echo "\n",$contador;
    return $indice;
}
indicePrimerPartidaGanada($jugador);