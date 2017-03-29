<?php

function get_ssid()
{
	$cmd= shell_exec("iwgetid");
	$match = preg_match('/\"([^\"]*)\"/',$cmd,$id);
	$ssid = preg_replace('/"/','',$id);
	if($match)
	{
		
		return $ssid[0];
	}
	else
	{
		return "No-WiFi-Detected";
	}
}
?>
