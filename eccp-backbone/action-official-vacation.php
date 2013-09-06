<?php 
  include("Library/cleanIt.php");


 	$title     = cleanIt($_REQUEST["vacatit"],'NO_HTML');
 	$vacades   = cleanIt($_REQUEST["vacades"],'NO_HTML');
 	$vacadate  = cleanIt($_REQUEST["vacadate"],'NO_HTML');
	
    $INSERTME  = mysql_query("INSERT INTO `official_vacation` (
	`title`,  `dic`,      `date`) VALUES (
	'$title', '$vacades', '$vacadate');"); 


  if($INSERTME == 1){
	echo "<script>alert('This Process Done With Success');</script>";  ?>
				<script>location.href= "official-vacation.php";</script>
				<?php }else{
		echo "<script>alert('Technical. Error');</script>";  ?>
				<script>location.href= "official-vacation.php";</script>
				<?php  } ?>

<div class="one_wrap fl_left">
  <div class="widget">
   <div class="widget_title">
   	 <span class="iconsweet">8</span><h5>Result</h5>
   </div>
   
   <div class="widget_body">
   <h3 style="margin:10px 10px 10px 10px;" align="center">Your Data Was Update Successfully</h3>
       

   </div><!--end of widget_body-->
    </div>
</div>