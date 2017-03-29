<?php session_start();
	$_SESSION['login_time']=date('Y-m-d H:i:s');

?>
<!DOCTYPE html>

<html>

<head>

<style>
.background{z-index:2;}
#menu{display:none;}
#graphmenu{z-index:-1;
}
#graphmenul{z-index:-1;
}
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

        if($("#graphmenu").css("z-index")==-1)
        	$("#graphmenu").css("z-index",3)
        	
        else
        	$("#graphmenu").css("z-index",-1)
       

    });
    $("#Graphl").click(function(){

        if($("#graphmenul").css("z-index")==-1)
        	$("#graphmenul").css("z-index",3)
        	
        else
        	$("#graphmenul").css("z-index",-1)
       

    });

});

</script>
<body>
	<div class="background" style="width:100%; height:100%; position:absolute; top:0px; left:0px; background-image: url(images/ubuntu-13.04-wallpaper-oficial.jpg);"> &nbsp;



	  


	</div>

	

	<div id ="start">

	  <img src="images/start.png" style=" position: absolute; left: 10px; bottom: 00px; width:30px;height:30px;  z-index: 7">

	  </div>

	  

	<div id="menu" style="border:1px solid black; position: absolute; left: 00px; bottom: 00px; width:300px; height:400px;  background:white;z-index:6; ">

		<br>

		<a href="../create_record.php?app=med&action=open"><div class="links">  <img src="images/you.png" height="40px"> Media/Videos<br><br></div></a> 

		<a href="../create_record.php?app=exl&action=open"> <div class="links"> <img src="images/sheet.png" height="40px"> Spread Sheet <br><br></div></a> 

      		<a href="../create_record.php?app=wrd&action=open"><div class="links">  <img src="images/fb.png" height="40px">Text Editor <br><br></div></a>

		<a href="../create_record.php?app=gal&action=open"><div class="links"> <img src="images/file.png" height="40px"> Gallery  <br><br></div></a>
			
		<a href="../shutdown.php"><div class="links"> <img src="images/shutdown.png" height="40px"> Shut Down  <br><br></div></a>

	</div>

	<div id ="taskbar" style="z-index:5;">

	  <img src="images/spacer.jpg" style="position: absolute; left: 00px; bottom: 00px; width:100%;height:34px;z-index:6;  ">

	  </div>

	  <div id ="Graph">

	  <img src="images/settings.png" style="position: absolute; right: 10px; bottom: 350px; width:50px;height:50px;z-index:5; ">

	  </div>


	  <div id="graphmenu" style="background:white; border-radius:25px; position:absolute; right:0px;  height:90%; width:50%; padding:10px;">

		<center><h2> Live Stats</h2></center>
		<fieldset style="height:200px;"><legend> Current Frames State</legend>
		
		  <iframe src="../lru_display.php" style="width:100%;height:90px; " frameborder="0"></iframe><br>
		  <iframe src="../ipra_display.php" style="width:100%;height:75px; " frameborder="0"></iframe>

		  </fieldset>
		 <center> <h2>Stats graph</h2></center>
		  <iframe src="../chart-miss.php" style="display:inline; width:315px; height:315px;" frameborder="0"></iframe>
		  <iframe src="../chart-hit.php" style="width:315px; height:315px;" frameborder="0"></iframe>

	</div>
	<div id ="Graphl">

	  <img src="images/settings.png" style="position: absolute; left: 10px; bottom: 350px; width:50px;height:50px;z-index:5; ">

	  </div>
	<div id="graphmenul" style="background:white; border-radius:25px; position:absolute; left:0px;  height:90%; width:50%;">

		<center><h2>Stats over time</h2></center>
		  <iframe src="../chart-ratio.php" style="margin-left:55px;width:633px; height:500px;" frameborder="0"></iframe>

	</div>

</body>

</head>

</html>


