<?php

include 'head.php';
/*$array = ['Luis'=>['piso'=>5, 'escalera'=>'A', 'puerta'=>15],
 'Ana'=>['piso'=>2, 'escalera'=>'A', 'puerta'=>5],
 'Juan'=>['piso'=>3, 'escalera'=>'B', 'puerta'=>10]];
echo '<pre>';
var_dump($array);
echo '</pre>';

print_r($array['Juan']);*/
$carrito = [['id'=>1,'desc'=>'Diccionario Australiano','precio'=>24.95,'unidades'=>2],['id'=>2,'desc'=>'Building your own database','precio'=>100,'unidades'=>4],['id'=>3,'desc'=>'Simply JavaScript','precio'=>19.99,'unidades'=>3],['id'=>4,'desc'=>'Android Programing','precio'=>39.95,'unidades'=>1]];

echo '<table>';
echo'<tr>
<th>id</th>
<th>descripcion</th>
<th>precio</th>
<th>unidades</th>
</tr>';
foreach($carrito as $clave => $valor){
    echo '<tr>';
    foreach($valor as $c => $v){
        echo '<td>'.$v.'</td>';
    }
    echo '</tr>';
}
echo '</table>';

//select
echo '<select name="descripcion">';
    foreach($carrito as $clave2 => $valor2){
        echo '<option value="'.$valor2['id'].'">'.$valor2['desc'].'</option>';
    }
echo '</select>';

 include 'pie.php';

