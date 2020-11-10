<?php
    session_start();
    echo session_id(),"<br>";
    echo session_name(),"<br>";
?>
<A Href="ejemplo118.php?<?echo session_name()."=".session_id()?>">       Volver a llamar esta página</A>