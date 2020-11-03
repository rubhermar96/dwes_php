<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Alumnos</h1>
    <ul>
    <?php
    $alumnos = array(
        0 => array(
            "nombre"=>"Paco",
            "biologia" => 8,
            "quimica" => 7,
            "latin" => 6
        ),
        1 => array(
            "nombre"=>"Laura",
            "biologia" => 8,
            "quimica" => 7,
            "latin" => 6
        ),
        2 => array(
            "nombre"=>"Lucia",
            "biologia" => 8,
            "quimica" => 7,
            "latin" => 6
        ),
        3 => array(
            "nombre"=>"Marcos",
            "biologia" => 8,
            "quimica" => 7,
            "latin" => 6
        ),
        4 => array(
            "nombre"=>"Pepe",
            "biologia" => 8,
            "quimica" => 7,
            "latin" => 6
        )
        );
        foreach($alumnos as $key1 => $value1){
            echo '<li>';
            foreach($value1 as $key2=>$value2){
                echo $key2.' >> '.$value2.'<br>';
            }
            echo '</li>';
        }
    ?>
    </ul>
</body>
</html>