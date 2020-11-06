<?php include_once("C:/xampp/htdocs/dwes_php/ejercicios/seguridad/ejemplo2.inc.php")?>
<?php Encabezado() ?>
<?php echo "El resultado de mutliplcar 7 * 9 es: ".Calcula(7,9)."<br>";?>
<?php Pie()?>

Lista de ficheros utilizados por include<br>
<?php
$z = get_included_files();
foreach($z as $clave => $valor){
    echo "clave: ".$clave." valor: ".$valor."<br>"; 
};
show_source("C:/xampp/htdocs/dwes_php/ejercicios/seguridad/ejemplo2.inc.php");
?>