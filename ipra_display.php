<?php session_start(); ?>
IPRA Buffer<br>
<table border="1" style="font-size:120%;"><tr>

<?php
for($k=0; $k<10; $k++)
echo "<td>".$_SESSION['ipra_buffer'][$k]."</td>";

echo "</tr></table>";
//print_r($_SESSION['lru_buffer']);

?>
