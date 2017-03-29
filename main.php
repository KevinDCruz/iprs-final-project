<?php
	require_once('graphs.php');
	
	require_once('getssid.php');
	$ssid = get_ssid();
	print_adj_matrix($ssid);
	//echo $ssid;
	
	
	 
//	 get_ssid();
/*
PUT PATHS logs/
$gal = new nodes();
$gal->name="gal";

$media = new nodes();
$media->name="med";

$excel = new nodes();
$excel->name="exl";

$word = new nodes();
$word->name="doc";

$dat=serialize($excel);
writr($dat,'log_exl');
$dat=serialize($word);
$dat=serialiwritr($dat,'log_wrd');
ze($media);	
writr($dat,'log_med');
$dat=serialize($gal);
writr($dat,'log_gal');

$r=unserialize(readr('log_exl'));
print_r($r);
echo $r->name;
*/
	//echo shell_exec("iwgetid");
?>
