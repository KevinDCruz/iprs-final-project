<?php session_start(); 

	if(!isset($_SESSION['ipra_buffer']))
		$_SESSION['ipra_buffer']=array();
	
	//	If no WiFi ... echo FALL BACK TO LRU, exit
	function ipra($app)
	{
		$require_pages =count($app->pg);
		//echo "<script> window.alert('Pg count:".$count."');</script>";
		$available_pages = (10-count($_SESSION['ipra_buffer']));
		if($available_pages>$require_pages)
		{
			//check if page already exists
			for($i=0; $i<count($_SESSION['ipra_buffer']);$i++)
			{
				for($k=0; $k<$require_pages; $k++)
				{
					if($app->pg[$k]==$_SESSION['ipra_buffer'][$i])
						$_SESSION['ipra_hit']++;
						//echo "<script> window.alert('HIT_IPRA');</script>";
						
				}
			
			}
			for($i=0; $i<$require_pages; $i++)
			{
				$_SESSION['ipra_buffer'][count($_SESSION['ipra_buffer'])]=$app->pg[$i];
			}
			
		
		}
		
		
		echo "<script> window.alert('Pg count:".$_SESSION['ipra_hit']."');</script>";
	}
	
	/*
		Get which app opened	
		If place is there, put it in
		
		Else
			Get its number of pages
			Get free buffer size
			Get number of faults to be done
		LOOP	Get the least accessed app
			Check if it's page exists
		E-LOOP		else move to another app 
			Replace pages
			If more pages need to be loaded in go to LOOP
		
	*/
	
?>
