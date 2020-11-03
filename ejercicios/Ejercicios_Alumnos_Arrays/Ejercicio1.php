<?php

include 'head.php';
$nombres=['Ana','Paco','Pepe','Laura'];
//$nombres=array() si lo quiero vacío
echo '<pre>';
var_dump($nombres);
echo '</pre>';
//print_r($nombres); igual que var_dump con menos iformación
//añadimos un alumno
$nombres[]='Lucia';
echo "<br>El total de alumnos es: " .count($nombres);
foreach($nombres as $valor){
    echo '<br>'.$valor;
}
$contador = 0;
$acumulador = 0;
$notas=['Ana'=>5,'Paco'=>2,'Pepe'=>10,'Laura'=>8,'Lucia'=>7];
foreach($notas as $key=>$valor){
    if ($valor >= 5){
        $contador++;
    }
    $acumulador+= $valor;
    echo '<br>'.$key." --> ".$valor;
}
echo '<br>'."Numero de aprobados: ".$contador;
echo '<br>'."Media notas: ".$acumulador/count($notas);
include 'pie.php';

