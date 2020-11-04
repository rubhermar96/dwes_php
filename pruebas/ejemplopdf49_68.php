<?php
$a=3;
$b=2;
function a1(&$a,$b){
    $a=pow($a,2);
    $b=pow($b,3);
    echo "El cuadrado de a dentro de la función es: ",$a, "<br>";
    echo "El cubo de b dentro de la función es: ",$b, "<br><br>";
}
a1($a,$b);
echo "Al salir de la función a conserva la modificación: ",$a, "<br>";
echo "Por el contrario, b no la conserva: ",$b, "<br><br>";
$c=8; $d=12;
function b1(&$a,$b){
    $a=pow($a,2);
    $b=pow($b,3);
    echo "El cuadrado de a dentro de la función es: ",$a, "<br>";
    echo "El cubo de b dentro de la función es: ",$b, "<br><br>";
}
b1($c,$d);
echo "Al salir de la función c conserva la modificación: ",$c, "<br>";
echo "Por el contrario, d no la conserva: ",$d, "<br><br>";
?>