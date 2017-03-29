<?php session_start(); ?>
<?php require_once('getssid.php');?>
Showing for location :<b> <?php echo get_ssid(); ?></b> <br>LRU Buffer<br>
<table border="1" style="font-size:120%;"><tr>

<?php
for($k=0; $k<10; $k++)
echo "<td>".$_SESSION['lru_buffer'][$k]."</td>";

echo "</tr></table>";
//print_r($_SESSION['lru_buffer']);

?>
