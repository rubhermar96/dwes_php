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
        14 => array(
            "nombre"=>"Paco",
            "biologia" => 8,
            "quimica" => 7,
            "latin" => 6
        ),
        10 => array(
            "nombre"=>"Laura",
            "biologia" => 10,
            "quimica" => 10,
            "latin" => 9
        ),
        5 => array(
            "nombre"=>"Lucia",
            "biologia" => 6,
            "quimica" => 6,
            "latin" => 8
        ),
        6 => array(
            "nombre"=>"Marcos",
            "biologia" => 4,
            "quimica" => 4,
            "latin" => 5
        ),
        2 => array(
            "nombre"=>"Pepe",
            "biologia" => 7,
            "quimica" => 7,
            "latin" => 2
        )
        );
        foreach($alumnos as $key1 => $value1){
            echo '<li><b>Número Lista</b> >> '.$key1.'<br>';
            foreach($value1 as $key2=>$value2){
                echo '<b>'.$key2.'</b> >> '.$value2.'<br>';
            }
            echo '</li>';
        }
    ?>
    </ul>
</body>
</html>