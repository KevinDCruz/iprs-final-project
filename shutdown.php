<?php session_start();
require_once('conn.php');
	$_SESSION['logout_time']=date('Y-m-d H:i:s');
	
// if unset then NULL
		
		$query = "INSERT into stats values (NULL,'".$_SESSION['login_time']."','".$_SESSION['logout_time']."','".$_SESSION['lru_hit']."','".$_SESSION['lru_miss']."','".$_SESSION['ipra_hit']."','".$_SESSION['ipra_miss']."')";

	//echo $query. "<br>";
	
	//echo $demo;
	if($conn->query($query) == FALSE)
		die ("<br>Failed to insert query".$conn->error);
	else
		echo "<script> window.location.assign('UI/index.html')</script>";

?>

