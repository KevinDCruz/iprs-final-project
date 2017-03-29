<?php session_start();	

?>
<html>

<head>
	<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.time.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.tooltip.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.axislabels.js"></script>
		
	<script>
			var lru_hit = [];
			var ipra_hit = [];
	</script>
	<?php
		echo "<script>lru_hit.push([0,".$_SESSION['lru_hit']."]);</script>";
		echo "<script>ipra_hit.push([1,".$_SESSION['ipra_hit']."]);</script>";
		
	
	?>		
	<script>
$(function () {
        //var a1 = [[0,3]];
        //var a2 = [[1,8]];
        //var a3 = [[0,3],[1,12],[2,11],[3,2],[4,13]];
var ticks = [[0, "LRU HITS"], [1, "IPRA HITS"]];
        var data = [
            {
                label: "LRU HITS",
                data: lru_hit
            },
            {
                label: "IPRA HITS",
                data: ipra_hit
            }
        ];

        $.plot($("#placeholder1"), data, {
            series: {
                bars: {
                    show: true,
                    barWidth: 1,
                    order: 3,
                    align:'center'
                }
            },
            valueLabels: {
                show: true
            },
            xaxis: { ticks: ticks
            
           },

                        		grid: {
				hoverable: true,
				clickable: true
			},
//tooltio

tooltip: true,
tooltipOpts: {
content: '%s  %y'
}
        });
    });
 //tooltip
        	</script>

</head>
<body>
	

	<div id="placeholder1" style="width:297px;height:297px"> &nbsp;</div>


</body>

</html>
