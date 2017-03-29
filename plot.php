<?php 
require_once('conn.php');
$query = "select * from stats";
$res = $conn->query($query);
if($res->num_rows <=0)
		die ("<br>Failed to select query".$conn->error);
	
?>
<html>

<head>
	<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.time.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.tooltip.min.js"></script>
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

</head>
<body>
	

	<div id="placeholder" style="width:600px;height:200px"> &nbsp;</div>


</body>

</html>
