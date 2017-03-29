<?php 	session_start();
	require_once('nodes_class.php');
	require_once('getssid.php');
	require_once('io.php');	

	/*****test****
	$_SESSION['last_used']="wrd";
	$ssid="DBCL_wifi_g";
	$path="logs/".$ssid."/log_".$_SESSION['last_used'];
	$r=unserialize(readr($path));
	$app="wrd";	
	penalty($r,$app,$path);
	/***test****/
	
	function penalty($r,$app,$path)
	{
		$sort_for_penalty=$r->d;
		arsort($sort_for_penalty);
		$most_app = key($sort_for_penalty);
		
	
		
		if($most_app!=$app)
		{
			echo "<script> window.alert('Pattern disturbed. Expected:".$most_app." Given: ".$app."'); </script>";
			$rs;
			for($i=0; $i<3; $i++)
			{
				next($sort_for_penalty);
				$now_app= key($sort_for_penalty);
				$rs = $rs+pow(($sort_for_penalty[$most_app]-$sort_for_penalty[$now_app]),2);
			}
			$rms = round(sqrt($rs/3),2);
			//echo $rms;
			reset($sort_for_penalty);
			for($k=0; $k<3; $k++)
			{
				
				$decr_app=key($sort_for_penalty);
				if($decr_app!=$app)
					$r->d[$decr_app]=$r->d[$decr_app]-$rms;
				next($sort_for_penalty);
				
				
			}
			$dat_pen=serialize($r);
			writr($dat_pen,$path);
		}
		
	
	}

?>
