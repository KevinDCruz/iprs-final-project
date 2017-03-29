<?php session_start();
	$_SESSION['login_time']=date('Y-m-d H:i:s');

?>
<?php 
require_once('../conn.php');
$query = "select * from stats";
$res = $conn->query($query);
if($res->num_rows <=0)
		die ("<br>Failed to insert query".$conn->error);
	
?>
<!DOCTYPE html>

<html>

<head>
	<script language="javascript" type="text/javascript" src="../js/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="../js/jquery.flot.min.js"></script>
		<script language="javascript" type="text/javascript" src="../js/jquery.flot.time.js"></script>
		<script language="javascript" type="text/javascript" src="../js/jquery.flot.tooltip.min.js"></script>
	<script>
			var lru_ratio = [];
			var ipra_ratio = [];
	</script>
	<?php
		while ($row = $res->fetch_array())
		{
			if($row['miss_lru']==0)
				$row['miss_lru']=0.001;
			$ratio = $row['hit_lru']/$row['miss_lru'];
			echo "<script>lru_ratio.push([".$row['id'].",".$ratio."]);</script>";
		}
		
	
	?>		
	<script>
		/*var prices = [[0.11,0.1],[0.12,0.13],[4,5]];
		var prices1 = [[1,2],[2,3],[4,5]];*/
		

		$(document).ready(function(){ 
		$.plot($("#placeholder"), [ 
			{data:lru_ratio, label: "LRU: Hit-To-Miss Ratio"},
			{data:ipra_ratio, label: "IPRA: Hit-To-Miss Ratio"}
			
			
		
		
		
		],  { 
		
		points: {
					show: true
				},
		lines: {
					show: true,
					fill:true
				},
	
		grid: {
				hoverable: true,
				clickable: true
			},
//tooltio

tooltip: true,
tooltipOpts: {
content: '%s Ratio: %y'
},
///tooltip options end
		grid: {
				hoverable: true,
				clickable: true
			},
				
		yaxis: { max: 5 }, xaxis: { max: 8 } });
		});
	</script>

<style>

#menu{display:none;}
#graphmenu{display:none;}
#menu a{
text-decoration:none;
color:black;

}

.links:hover
{
background:gray;
color:white;
cursor:pointer;
} 



</style>

	<script type="text/javascript" 

    src="script/jquery-1.10.2.js">

	</script>

    

    <script>

$(document).ready(function(){

    $("#start").click(function(){

        $("#menu").toggle();

    });

});

</script>

<script>

$(document).ready(function(){

    $("#Graph").click(function(){

        $("#graphmenu").toggle();

    });

});

</script>

	<div class="background">

	<style>

	body { background-image: url(images/ubuntu-13.04-wallpaper-oficial.jpg); }

	</style>

	</div>

	

	<div id ="start">

	  <img src="images/start.png" style="position: absolute; left: 10px; bottom: 00px; width:30px;height:30px;  z-index: 2">

	  </div>

	  

	<div id="menu" style=" position: absolute; left: 00px; bottom: 00px; width:300px; height:400px;  background:white; ">

		<br>

		<a href="../create_record.php?app=med&action=open"><div class="links">  <img src="images/you.png" height="40px"> Media/Videos<br><br></div></a> 

		<a href="../create_record.php?app=exl&action=open"> <div class="links"> <img src="images/sheet.png" height="40px"> Spread Sheet <br><br></div></a> 

      		<a href="../create_record.php?app=wrd&action=open"><div class="links">  <img src="images/fb.png" height="40px">Text Editor <br><br></div></a>

		<a href="../create_record.php?app=gal&action=open"><div class="links"> <img src="images/file.png" height="40px"> Gallery  <br><br></div></a>
			
		<a href="../shutdown.php"><div class="links"> <img src="images/shutdown.png" height="40px"> Shut Down  <br><br></div></a>

	</div>

	<div id ="taskbar">

	  <img src="images/spacer.jpg" style="position: absolute; left: 00px; bottom: 00px; width:100%;height:34px;  ">

	  </div>

	  <div id ="Graph">

	  <img src="images/settings.png" style="position: absolute; right: 10px; bottom: 350px; width:50px;height:50px;  z-index: 2">

	  </div>
<div id="placeholder" style="position:relative; width:300px;height:300px"> &nbsp;</div>

	  <div id="graphmenu" style="background:white; position:absolute; right:0px;  height:90%; width:50%;">

		<center><h3>LRU Stats</h3></center>
		  <iframe src="../lru_display.php" style="width:100%; height:40%;" frameborder="0"></iframe><br>
		 


	</div>

</body>

</head>

</html>


