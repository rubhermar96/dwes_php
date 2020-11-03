<?php
$tono = 0;
echo '<table width=300 border=2>';
while($tono<=255){
    echo '<tr><td align=center style="background:RGB('.$tono.','.$tono.','.$tono.')"><b>'.$tono.'</b></td></tr>';
    $tono+=5;
}
echo '</table';
?>