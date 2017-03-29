<?php
	function readr($file_name)
	{
		$file = fopen($file_name,"r");
		$ret= fread($file,filesize($file_name));
		fclose($file);
		return $ret;

	}
	function writr($data,$file_name)
	{
		$file = fopen("$file_name","w+");
	 	$res=fwrite($file,$data);
		fclose($file);
		//return $ret2;
	
	}
	
?>
