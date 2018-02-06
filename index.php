<head>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css" </script>
</head>
<body>
	<div class="container-fluid">
		<?php
		$plug_names = array("Lights","Angle Cam","Heater",
							"Decline Cam","Irrigation","Water Swap");
		$plug_status = array(0,0,0,0,0,0);
		for($i=0;$i<6;$i++){
			system("gpio mode ".$i." out");
			exec("gpio read ".$i, $val_array[$i],$return);
		}
		
		$i=0;
		for($i=0;$i<6;$i++){
			if($i%2==0){
				echo("<div class='row'>");
			}
			echo("<div id='plug_".$i."' class='col-6 third-split' onclick='toggleswitch(".$i.")'>");
			echo("<p class='underline'>".$plug_names[$i]."</p>");
			if($plug_status[$i]==0){
				echo("<p class='bold'>Off</p>");
			}
			else if($plug_status[$i]==1){
				echo("<p class='bold'>On</p>");
			}
			echo("</div>");
			if($i%2==1){
				echo("</div>");
			}
		}
		?>
	</div>

	<script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script src="script.js"></script>
</body>
