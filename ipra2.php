<?php session_start(); 

	if(!isset($_SESSION['ipra_buffer']))
		$_SESSION['ipra_buffer']=array();
	

/****TESTING****
require_once('nodes_class.php');
require_once('io.php');
require_once('getssid.php');
$ssid =  get_ssid();
$gal=unserialize(readr('logs/'.$ssid.'/log_med'));
print_r($gal);
ipra($gal);
/*****TESTING END****/
	function ipra($app)
	{
		
		for($i=0; $i<count($app->pg); $i++)
		{
			ipra_real($app->pg[$i],$app);
		}
	}	


	function ipra_real($pgid,$app)
	{
		// search if it already exists
		for ($i1=0; $i1<10; $i1++)
		{
				//echo "i".$i1."<br>";
				$frame = $_SESSION['ipra_buffer'][$i1];
				//echo $frame;
				if ($pgid==$frame)
				{
					$_SESSION['ipra_hit']++;
					$hit1=1;
					break;
				}
		}
		//if it does not exist but there is place
		if($hit1!=1)
		{
			//check if place is there, if yes put if no do fault
			if((count($_SESSION['ipra_buffer']))<10)
			{
				$_SESSION['ipra_buffer'][count($_SESSION['ipra_buffer'])]=$pgid;
				$_SESSION['ipra_miss']++;
			}
			else
			{
				do_ipra_fault($pgid,$app);
				$_SESSION['ipra_miss']++;
			}
		}
	
	}
	function do_ipra_fault($pgid,$app)
	{
		 $removeable;
		 $found;
		$sorted=$app->d;
		asort($sorted);
		echo "<br>sorted";
		print_r($sorted);
		echo "sorted<br>";
		reset($sorted);
		for($i=0; $i<4; $i++)
		{
			$least_app=key($sorted);
			if($least_app==$app->name)
			{
				next($sorted);
				$least_app=key($sorted);
			}
			echo "<script> window.alert('Pg count:".$least_app."');</script>";
			switch($least_app)
			{
				case gal:
					$removeable=array(101,102,103,104);
					break;
				case med:
					$removeable=array(201,202,203,204,205);
					break;
				case wrd:
					$removeable=array(401,402,403);
					break;
				case exl:
					$removeable=array(301,302,303);
					break;
			
			}
			echo "<br>removeable";
			print_r($removeable);
			echo "removeable<br>";
			//check if any of the pages exist
			for($k=0; $k<count($_SESSION['ipra_buffer']); $k++)
			{
				for($l=0; $l<count($removeable); $l++)
				{
					if($_SESSION['ipra_buffer'][$k]==$removeable[$l])
					{
						//replace// break break
						$_SESSION['ipra_buffer'][$k]=$pgid;
						$found=1;
						break;
					}

				}
				if($found==1)
					break;
			}
			if($found==1)
				break;
			next($sorted);			
		}	
			
	}
	

	
?>
