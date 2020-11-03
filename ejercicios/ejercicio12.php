<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    $a = $_REQUEST['n1'];
    $b = $_REQUEST['n2'];

    $suma = ($a + $b);
    $resta = ($a-$b);
    $multi = ($a * $b);
    $div = ($a / $b);
    $pot = (ceil(pow(($a+$b), 4)));
    $raiz = (ceil(pow(pow(($a + $b), 3), (1/5))));

    print "La suma es: " . number_format($suma,4,"."," ") . "<BR>";
    print "La resta es: " . number_format($resta,4,"."," ") . "<BR>";
    print "La multiplicación es: " . number_format($multi,4,"."," ") . "<BR>";
    print "la division es: " . number_format($div,4,"."," ") . "<BR>";

    print "La potencia cuarta de la suma es: " . number_format($pot,4,"."," ") . "<BR>";
    print  "La raiz quinta del cubo de la suma es: " . number_format($raiz,4,"."," ") . "<BR>";
    ?>
    <form name="prueba" method="post" action="">
        Introudce un numero: <br>
        <input type="text" name="n1" value='' required><br>
        Introduce otro numero: <br>
        <input type="text" name="n2" value='' required><br>
    <input type="reset" value="borrar">
    <input type="submit" value="enviar">

</body>
</html>