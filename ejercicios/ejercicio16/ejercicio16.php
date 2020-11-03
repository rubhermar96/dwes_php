<?php
$num=$_REQUEST['n1'];
$texto = $_REQUEST['texto'];

printf("%'*12.2f euros",$num);
echo '<br>';
echo strtoupper(substr(nl2br($texto),0,10)).strtolower(substr(nl2br($texto),10));
?>