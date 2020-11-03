<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento24</title>
</head>
<body>
<?php
$cadena1 = "Esto es una cadena de texto";

$cadena2 = <<<Pepe
Esta es otra cadena escrita con la
sintaxis de documento incrustado.
Se escribe en varia slínes y tiene la sintaxis siguiente.
Después de escribir el nombre de la variable y el signo
igual se ponen los tres 
Pepe;
$cadena3 = <<<Pepa
Esta es otra cadena
puedo escribir Pepa cuantas Pepa
Pepa;

echo $cadena1,"<BR>";
echo $cadena2,"<BR>";
echo $cadena3,"<BR>";
?>  
</body>
</html>