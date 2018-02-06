<?php
  if(isset ( $_GET["plug"])){
	$plug = strip_tags ( $_GET["plug"] );
	 
	if( is_numeric($plug) && $plug <6 &&$plug >=0 ){
	  system("gpio mode ".$plug." out");
	  exec("gpio read ".$plug, $status, $return);
	  echo($status[0]);
	}
	else{echo "fail";}
  }
  else{echo "fail";}
?>
