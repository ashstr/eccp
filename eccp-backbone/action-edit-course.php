<?php 
	if($_FILES["picG"]["name"]){
	 $i=time();
	 $exe=explode(".",$_FILES['picG']['name']);
	 $arr=array("JPEG","JPG","GIF","PNG");
//  $arr=array("JPEG","JPG","GIF","PNG","ZIP","RAR","DOC","GZ","PDF","pdf");
	  
	  if(in_array(strtoupper($exe[count($exe)-1]),$arr)){
	      $filename=$i.".".$exe[count($exe)-1];
	      $uploadfile = "uploaded/subject/".$filename;
	      }
		     move_uploaded_file($_FILES['picG']['tmp_name'],"uploaded/subject/".$filename);
			 chmod($uploadfile, 0755);
		  }else{
		  	$filename = $_REQUEST["CovPath"];
		  }
		  
	$CID		  = cleanIt($_REQUEST["CourID"],'NO_HTML');
 	$title        = cleanIt($_REQUEST["title"],'NO_HTML');
 	$Description  = cleanIt($_REQUEST["decs"],'NO_HTML');
 	$Content      = cleanIt($_REQUEST["cont"],'NO_HTML');
 	$Duration     = cleanIt($_REQUEST["duration"],'NO_HTML');
 	$Fees         = cleanIt($_REQUEST["fees"],'NO_HTML');
	
    $INSERTME  = mysql_query("UPDATE `subject` SET `title` = '$title', `desc` = '$Description', `content` = '$Content', `duration`= '$Duration', `fees` = '$Fees', `CovPath` = '$filename' WHERE `ID` = '$CID' "); 


  if($INSERTME == 1){
	echo "<script>alert('This Process Done With Success');</script>";  ?>
				<script>location.href= "course-archive.php";</script>
				<?php }else{
		echo "<script>alert('Technical. Error');</script>";  ?>
				<script>location.href= "course-archive.php";</script>
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