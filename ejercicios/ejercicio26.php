<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border=2 width=500>
<?php
function escribetabla($fi,$co){
    $contador=1;
    for($filas=$fi;$filas>0;$filas--){
        echo '<tr>';
        for($columnas=$co;$columnas>0;$columnas--){
            echo '<td align=center>';
            print $contador++;
            print ("</td>");
        }
        echo '</tr>';
    }
}
escribetabla(200,200);
?>
</table>
</body>
</html>