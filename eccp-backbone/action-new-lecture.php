<?php 
  include("Library/cleanIt.php");
	
	if($_FILES["picG"]["name"]){
	 $i=time();
	 $exe=explode(".",$_FILES['picG']['name']);
	 $arr=array("JPEG","JPG","GIF","PNG");
	  
	  if(in_array(strtoupper($exe[count($exe)-1]),$arr)){
	      $filename=$i.".".$exe[count($exe)-1];
	      $uploadfile = "uploaded/subject/".$filename;
	      }
		     move_uploaded_file($_FILES['picG']['tmp_name'],"uploaded/subject/".$filename);
			 chmod($uploadfile, 0755);
		  }// end of if($_FILES["picG"]["name"])

	$course = cleanIt($_POST["class"],'NO_HTML');
	$group  = cleanIt($_POST["group"],'NO_HTML');

 	$date     = cleanIt($_REQUEST["date"],'NO_HTML');
 	$topic    = cleanIt($_REQUEST["topic"],'NO_HTML');
 	$instr    = $_REQUEST["instr"];
 	$duration = cleanIt($_REQUEST["duration"],'NO_HTML');
	
    $INSERTME  = mysql_query("INSERT INTO `lecture` (
		`CID`, 		`GID`, 	  `date`, `topic`,   `instructor`, `duration`)VALUES(
		'$course', '$group', '$date', '$topic', '$instr',	    '$duration');"); 




  if($INSERTME == 1){
	echo "<script>alert('This Process Done With Success');</script>";  ?>
				<script>location.href= "new-lecture.php";</script>
				<?php }else{
		echo "<script>alert('Technical. Error');</script>";  ?>
				<script>location.href= "new-lecture.php";</script>
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