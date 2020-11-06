<!-- Repetimos la inclusión de ambos ficheros    
pero veremos que no aparece mensaje de error 
por duplicidad de funciones y además 
pese a hacer una doble inserción de ejemplo1
solo se visualiza una vez por efecto del filtro 
establecido por include_onde   //--> 
<?php include_once("ejemplo2.inc.php") ?>
<?php Encabezado() ?>
 Aquí iría el contenido de la página<br> 
 ....................<br>
  ...........................<br><br><br> 
<?php include_once("ejemplo1.inc.php") ?>
....................<br> 
no aparecerá nada aquí debajo<br><br><br> 
<?php include_once("ejemplo1.inc.php") ?>
<?php include_once("ejemplo2.inc.php") ?>