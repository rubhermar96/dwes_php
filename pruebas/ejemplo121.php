<?php
session_cache_limiter('nocache,private');
session_name('leocadia');
session_start();

echo session_id(),"<br>";
echo session_name(),"<br>";
?>
<A Href="ejemplo121.php?<?echo session_name()."=".session_id()?>">                  Volver a llamar esta página</A>