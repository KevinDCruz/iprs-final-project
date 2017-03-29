<?php session_start();

// 0-- bottom of stack... 9--- top of stack
//top of the stack (9) represents most used
	if(!isset($_SESSION['lru_buffer']))
		$_SESSION['lru_buffer']=array();

//remove pgid.. Get value from create_record.php
	//$pgid1=22;
	//lru($pgid1);

/******************************* ADD PAGES HERE ******************************/	
/*	lru(22);
	lru(33);
	lru(44);
	lru(55);
	lru(66);
	lru(77);
	lru(88);
	lru(99);
	lru(101);
	lru(201);
	lru(1030);
	lru(201);
	lru(44);
/************************SPACE to add pages ends****************************/	


	
	function lru($pgid)
	{	
		//echo "in LRU <br>";
		//$_SESSION['lru_buffer'][0]=101;
		$count=count($_SESSION['lru_buffer']);
		$hit1=0;	
		echo "count".$count."<br>";
		if(count($_SESSION['lru_buffer'])<10)
		{
			for ($i1=0; $i1<10; $i1++)
			{
				//echo "i".$i1."<br>";
				$frame = $_SESSION['lru_buffer'][$i1];
				echo $frame;
				if ($pgid==$frame)
				{
					echo "hitpgid".$pgid." at ".$i1."<br>";
					$_SESSION['lru_hit']++;
					$hit1=1;
					move_elements_less($i1);
					add_page($pgid,count ($_SESSION['lru_buffer']));
					break;
				}

			}
			if($hit1!=1)
			{
				//move_elements(0);
				add_page($pgid,count($_SESSION['lru_buffer']));
				$_SESSION['lru_miss']++;
			}
		}
		else
		{
			echo "fault";
			do_fault($pgid);
		}

		
	}
	function add_page($pgid,$index)
	{
		//echo "in add_page <br>";
		$_SESSION['lru_buffer'][$index]=$pgid;
	}
	function do_fault($pgid)
	{
		$hit=0;
		//echo $pgid;
		//echo "in do_fault <br>";
		$count=count($_SESSION['lru_buffer']);
		for ($i=0; $i<10; $i++)
		{
			$frame = $_SESSION['lru_buffer'][$i];
			//echo $frame;
			if ($pgid==$frame)
			{
				$_SESSION['lru_hit']++;
				$hit=1;
				move_elements($i);
				add_page($pgid,9);
				break;
			}

		}
		if($hit!=1)
		{
			move_elements(0);
			add_page($pgid,9);
			$_SESSION['lru_miss']++;
		}
	
	}
	function move_elements($i)
	{
		//echo "in move_elements <br>";
		//secho"unser_before".count($_SESSION['lru_buffer'])."<br>";
		unset ($_SESSION['lru_buffer'][$i]);
		
		//echo "unset_after".count($_SESSION['lru_buffer']);
		for($j=$i; $j<=9; $j++)
		{
			$_SESSION['lru_buffer'][$j]=$_SESSION['lru_buffer'][$j+1];
		}
		//echo "unset_after".count($_SESSION['lru_buffer']);
	}
	function move_elements_less($p)
	{
		unset ($_SESSION['lru_buffer'][$p]);
		echo "buffer before for loop".print_r($_SESSION['lru_buffer'])."<br>";
		for($j=$p; $j<count($_SESSION['lru_buffer']) ; $j++)
		{
			//echo "fucl"."<br>";
			$_SESSION['lru_buffer'][$j]=$_SESSION['lru_buffer'][$j+1];
			unset($_SESSION['lru_buffer'][$j+1]);
		}
		echo "buffer AFTER for loop".print_r($_SESSION['lru_buffer'])."<br>";
	
	}
//add_page will add a page to the top of the stack -- > index is the result of COUNT function
/* 
do_fault --> 
	searchForArray
	ifExists
		unset currentIndex
		move everything down till currentIndex -- separate Generic function
		put the elemet at the top of the stack --  add_page()
		
	Else
		unset Bottom of the stack
		Move everything down till bottom of the stack  -- separate Generic function (currentIndex = bottom = 0)
		put element at the top of the stack -- add_page()
*/

?>


