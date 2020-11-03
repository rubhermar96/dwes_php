<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio13</title>
</head>
<body>
<?php
$body = "El elemento &#60;body&#62; de HTML representa el contenido de un documento HTML";
$head = <<<Paco
El elemento &#60;head&#62; provee información general del documento
Paco;
$html = <<<Paqui
El elemento &#60;html&#62; 
Paqui;
echo $body,"<br>";
echo $head,"<br>";
echo $html,"<br>";
?>
</body>
</html>