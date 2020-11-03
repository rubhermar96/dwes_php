<?php
$cadena1="Esto es una cadena de texto";
$cadena2="Esta es una segunda cadena de texto";

$cadena3=127;
$cadena4=257.89;

$union1=$cadena1 . $cadena2;
$union2=$cadena1 . $cadena3;
$union3=$cadena3 . $cadena4;

echo $union1,"<br>";
echo $union2,"<br>";
echo $union3,"<br>";

$cadena3 .=" Este es el texto que se añadirá a la variable cadena3";
echo $cadena3,"<br>";

$cadena3 .= <<<Pepito
Ahora le añado a la cadena
este trocillo asignado con el "formato"
de documento incrustado
Pepito;
echo $cadena3,"<br>";
?>