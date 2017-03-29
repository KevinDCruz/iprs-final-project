<?php session_start(); 

	if(!isset($_SESSION['ipra_buffer']))
		$_SESSION['ipra_buffer']=array();
	
	
	function ipra($app)
	{
		$require_pages =count($app->pg);
		
		//Check if page already exists
		for($i=0; $i<count($_SESSION['ipra_buffer']);$i++)
			{
				for($k=0; $k<$require_pages; $k++)
				{
					if($app->pg[$k]==$_SESSION['ipra_buffer'][$i])
					{
						$_SESSION['ipra_hit']++;
						$hit[$k]=$app->pg[$k];
						$require_pages--;
					}
						
				}
			
			}
			
		//Pages which do not exist
		
		$available_pages = (10-count($_SESSION['ipra_buffer']));
		if($available_pages>$require_pages)
		{
			//check if page already exists
			for($i=0; $i<count($_SESSION['ipra_buffer']);$i++)
			{
				for($k=0; $k<count($app->pg); $k++)
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
			
	
	}
	
?>
