<?php
    $valores=Array("Verde","Verano","Rolls-Royce","Millonario");
    setcookie("cookie3[color]",$valores[0],time()+3600);
    setcookie("cookie3[estacion]",$valores[1],time()+3600);
    setcookie("cookie3[coche]",$valores[2],time()+3600);
    setcookie("cookie3[finanzas]",$valores[3],time()+3600);
    if (isset($_COOKIE['cookie3']) ) {
        while( list( $indice, $valor) = each($_COOKIE['cookie3']) ) {
            echo "$indice == $valor\n";
        }
    }
?>