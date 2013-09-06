<?php 
  include("Library/cleanIt.php");
	
 	$ssub       = cleanIt($_REQUEST["ssub"],'NO_HTML');
 	$cat       = $_REQUEST["cat"];
    $INSERTME  = mysql_query("INSERT INTO `subject` (`level`, `title`, `parent_cat`, `active`) VALUES ('$cat', '$ssub', '$cat', 'YES');"); 




  if($INSERTME == 1){
	echo "<script>alert('This Process Done With Success');</script>";  ?>
				<script>location.href= "new-sub-subject.php";</script>
				<?php }else{
		echo "<script>alert('Technical. Error');</script>";  ?>
				<script>location.href= "new-sub-subject.php";</script>
				<?php  } ?>

<div class="one_wrap fl_left">
  <div class="widget">
   <div class="widget_title">
   	 <span class="iconsweet">8</span><h5>Result</h5>
   </div>
   
   <div class="widget_body">
   <h3 style="margin:10px 10px 10px 10px;" align="center">Your Data Was Update Successfully</h3>
       <a class="button_small whitishBtn" href="#"><span class="iconsweet">l</span>Export Table</a>

   </div><!--end of widget_body-->
    </div>
</div>