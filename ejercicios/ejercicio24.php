<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=2 width=300>
    <?php
    $columnas = 0;
    $aleatorio=0;
    $numeros[]=0;
    $numeros[]=0;
    $numeros[]=0;
    $numeros[]=0;
    $numeros[]=0;
    $numeros[]=0;
    echo'<tr>';
    for($columnas=0;$columnas<=6;$columnas++){
        $aleatorio= rand(1,49);
        for($i=0;$i<6;$i++){
            while($numeros[$i]==$aleatorio){
                $aleatorio=rand(1,49);
            }
        }
        $numeros[$columnas]= $aleatorio;
        echo '<td align="center">'.$aleatorio.'</td>';
    }
    echo'</tr>';
    ?>
    </table>
</body>
</html>