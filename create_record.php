<?php session_start();

require_once('nodes_class.php');
require_once('getssid.php');
require_once('io.php');
require_once('lru.php');
require_once('ipra2.php');
require_once('penalty.php');

	$app = $_GET['app'];
	$action=$_GET['action'];
	$ssid =  get_ssid();
	

	if (!(is_dir('logs/'.$ssid)))
	{
	 	echo "<script> window.alert('NEW WiFI/Location detected. Creating logs'); </script>";
	 	mkdir("logs/".$ssid,0777);
	 	$gal = new nodes();
		$gal->name="gal";
		$gal->pg[0]=101;
		$gal->pg[1]=102;
		$gal->pg[2]=103;
		$gal->pg[3]=104;
		$gal->d['gal']=0; $gal->d['med']=0; $gal->d['wrd']=0; $gal->d['exl']=0;
		$dat1=serialize($gal);
		writr($dat1,"logs/".$ssid."/log_gal");
		

		$media = new nodes();
		$media->name="med";
		$media->pg[0]=201;
		$media->pg[1]=202;
		$media->pg[2]=203;
		$media->pg[3]=204;
		$media->pg[4]=205;
		$media->d['gal']=0; $media->d['med']=0; $media->d['wrd']=0; $media->d['exl']=0;
		$dat1=serialize($media);
		writr($dat1,"logs/".$ssid."/log_med");

		$excel = new nodes();	
		$excel->name="exl";
		$excel->pg[0]=301;
		$excel->pg[1]=302;
		$excel->pg[2]=303;
		$excel->d['gal']=0; $excel->d['med']=0; $excel->d['wrd']=0; $excel->d['exl']=0;
		$dat1=serialize($excel);
		writr($dat1,"logs/".$ssid."/log_exl");

		$word = new nodes();
		$word->name="wrd";
		$word->pg[0]=401;
		$word->pg[1]=402;
		$word->pg[2]=403;
		$word->d['gal']=0; $word->d['med']=0; $word->d['wrd']=0; $word->d['exl']=0;
		$dat1=serialize($word);
		writr($dat1,"logs/".$ssid."/log_wrd");
	 	
	}
	if($action=="open")
	{
		$_SESSION['time_start']=time();
		
		$path1="logs/".$ssid."/log_".$app;
		$s=unserialize(readr($path1));
		
		if (!isset($_SESSION['last_used']))
		{	// just redirect
					foreach($s->pg as $page)
					{
						lru($page);
						//echo $page;
					}
					ipra($s);
			echo "<script> window.location.assign('UI/".$app.".php'); </script>";
		}
		if (isset($_SESSION['last_used']))
		{
			
			$path="logs/".$ssid."/log_".$_SESSION['last_used'];
			$r=unserialize(readr($path));
			//If not as predicted, impose RMS penalty
			penalty ($r,$app,$path);
			
			
			
			// increase graph weight
			echo "<script> window.alert('session exists'); </script>";
			

			
			
			//$r->name;
			//print_r($r);

			switch ($app)
			{
				case gal:
					
					$r->d['gal']++;
					ipra($s);
					foreach($s->pg as $page)
					{
						lru($page);
						//echo $page;
					}
					break;
				case med:
					$r->d['med']++;
					ipra($s);
					foreach($s->pg as $page)
					{
						lru($page);
						//echo $page;
					}
					break;
				case wrd:
					$r->d['wrd']++;
					ipra($s);
					foreach($s->pg as $page)
					{
						lru($page);
					}
					break;
				case exl:
					$r->d['exl']++;
					ipra($s);
					foreach($s->pg as $page)
					{
						lru($page);
					}
					break;
			}
			$dat=serialize($r);
			writr($dat,$path);
			echo "<script> window.location.assign('UI/".$app.".php'); </script>";
		
		}
	}
	if($action=="close")
	{
		$newtime=time();
		$time_difference =$newtime-$_SESSION['time_start']; 
		echo "<script>window.alert('".$time_difference."');</script>";
		//  save time
		$path="logs/".$ssid."/log_".$app;
		$r=unserialize(readr($path));
		$r->time=($r->time+$time_difference)/2; //average
		$dat=serialize($r);
			writr($dat,$path);
		/// write to object and then the file
		$_SESSION['last_used']=$app;
		echo "<script> window.location.assign('UI/homescreen.php');</script>";
		
	
	}
	


?>
