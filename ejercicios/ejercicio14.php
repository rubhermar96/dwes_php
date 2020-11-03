<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio14</title>
</head>
<body>
<form name="prueba" method="post" action="">
        Introudce un numero: <br>
        <input type="text" name="n1" value='' required><br>
        <input type="reset" value="borrar">
        <input type="submit" value="enviar">
</form> 
<?php
$a = $_REQUEST['n1'];

$array[]= "División exacta";
$array[]="Uno";
$array[]="Dos";
$array[]="Tres";
$array[]="Cuatro";
$array[]="Cinco";
$array[]="Seis";
$array[]="Siete";
$array[]="Ocho";
$array[]="Nueve";
$array[]="Diez";
$array[]="Once";

for ($i = 0; $i<12; $i++){
    if (($a%12)==$i){
        echo "El resto de la division es: ", $array[$i];
    }
}
?>   
</body>
</html>