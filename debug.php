<?php session_start(); 
print_r($_SESSION['ipra_buffer']);
echo "<br>hit:".$_SESSION['ipra_hit'];
echo "<br>miss:".$_SESSION['ipra_miss'];


?>
