<?php
$cadena1="Este texto esta
    Escrito en varias
                        lineas
                        y hemos saltado
                                de una a otra pulsando enter";
$cadena2="Aquí\nseparamos\nlas\nlíneas\ncon\nsin\npulsar\nenter";
$cadena3=<<<Prueba
Nuevamente texto en varias lineas ahora 
usando sintaxis de documento incrustado. 
Seguiremos probando 
Prueba;
$cadena4=<<<OtraPrueba
Ahora\ninsertaré\nalgo\ncomo\nesto 
OtraPrueba;
$saltador="<br><br><br>";
$salida=$cadena1.$saltador;
$salida .=$cadena2.$saltador;
$salida .=$cadena3.$saltador;
$salida .=$cadena4.$saltador;

print $salida;

print $saltador.nl2br($salida);
?>
