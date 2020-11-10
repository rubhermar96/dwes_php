<?php
setcookie("cookie1","Mi regalito",time()+3600);
echo "Esta es la galletita:",$_COOKIE['cookie1'];
?>