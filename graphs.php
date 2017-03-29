<?php
	require_once('nodes_class.php');
	require_once('io.php');
	

	
	function print_adj_matrix($ssid)
	{
		
		$gal=unserialize(readr('logs/'.$ssid.'/log_gal'));
		$med=unserialize(readr('logs/'.$ssid.'/log_med'));
		$wrd=unserialize(readr('logs/'.$ssid.'/log_wrd'));
		$exl=unserialize(readr('logs/'.$ssid.'/log_exl'));

		echo "<h3> Displaying data for ". $ssid."</h3> <br>";
		echo '
		<table border="1">
		<th> <td>GALLERY</td><td>MEDIA</td><td>WORD</td> <td> EXCEL</td> </th>';

		
		echo "<tr>"; echo "<td>GALLERY</td><td>".$gal->d['gal']."</td><td>".$gal->d['med']."</td><td>".$gal->d['wrd']."</td><td>".$gal->d['exl']."</td>"; echo "</tr>";
		echo "<tr>"; echo "<td>MEDIA</td><td>".$med->d['gal']." </td><td>".$med->d['med']."</td><td>".$med->d['wrd']."</td><td>".$med->d['exl']."</td>"; echo "</tr>";
		echo "<tr>"; echo "<td>WORD</td><td>".$wrd->d['gal']." </td><td>".$wrd->d['med']." </td><td>".$wrd->d['wrd']." </td><td>".$wrd->d['exl']."</td>"; echo "</tr>";
		echo "<tr>"; echo "<td>EXCEL</td><td>".$exl->d['gal']." </td><td>".$exl->d['med']." </td><td>".$exl->d['wrd']."</td><td>".$exl->d['exl']."</td>"; echo "</tr>";			
		echo "</table>";
		echo "<br> <h3> Average Time Spent </h3> <br>";
		echo '	
		<table border="1">
		<tr> <td>GALLERY</td> <td>MEDIA</td> <td>WORD</td> <td> EXCEL</td> </tr>';
		echo "<tr> <td>".$gal->time."</td><td>".$med->time ."</td><td>".$wrd->time ."</td> <td>".$exl->time. "</td></tr>";
		echo "</table>";
		
		echo "<br> <h3> Page Numbers </h3> <br>";
		echo "GALLERY: "; foreach ($gal->pg as $val)
			echo $val." ";
		echo "<br>";
		echo "MEDIA: "; foreach ($med->pg as $val)
			echo $val." ";
		echo "<br>";
		echo "WORD: "; foreach ($wrd->pg as $val)
			echo $val." ";
		echo "<br>";
		echo "EXCEL: "; foreach ($exl->pg as $val)
			echo $val." ";
			

				
	}
	

	

?>
