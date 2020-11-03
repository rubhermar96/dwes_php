<?php
$a=12;
$b=12;
echo "Operador ==","<br>";
echo "El resultado de comparar $a con $b ",($a==$b),"<br>";
$a=123;
echo "El resultado de comparar $a con $b ",ord($a==$b),"<br>";

echo "Operador ===","<br>";
$b=123;
echo "El resultado de comparar $a con $b ",($a===$b),"<br>";
$b="123";
echo "El resultado de comparar $a con $b ",ord($a===$b),"<br>";

echo "Operador !=","<br>";
$a=124;
echo "El resultado de comparar $a con $b ",($a!=$b),"<br>";
$b=124;
echo "El resultado de comparar $a con $b ",ord($a!=$b),"<br>";

echo "Operador <","<br>";
$a="abc";
$b="abcd";
echo "El resultado de comparar $a con $b ",($a<$b),"<br>";
$a="abcde";
echo "El resultado de comparar $a con $b ",ord($a<$b),"<br>";

echo "Operador <=","<br>";
$a=123;
$b=124;
echo "El resultado de comparar $a con $b ",($a<=$b),"<br>";
$a="abc";
$b="ABC";
echo "El resultado de comparar $a con $b ",ord($a<=$b),"<br>";

echo "Operador >","<br>";
$a="abcd";
$b="abc";
echo "El resultado de comparar $a con $b ",($a>$b),"<br>";
$a="ab";
echo "El resultado de comparar $a con $b ",ord($a>$b),"<br>";

echo "Operador >=","<br>";
$a=124;
$b=123;
echo "El resultado de comparar $a con $b ",($a>=$b),"<br>";
$b="abc";
$a="ABC";
echo "El resultado de comparar $a con $b ",ord($a>=$b),"<br>";
?>


