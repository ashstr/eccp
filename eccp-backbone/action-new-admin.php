<?php 
	include("Library/cleanIt.php");
	
	if($_FILES["picG"]["name"]){
	 $i=time();
	 $exe=explode(".",$_FILES['picG']['name']);
	 $arr=array("JPEG","JPG","GIF","PNG");
//  $arr=array("JPEG","JPG","GIF","PNG","ZIP","RAR","DOC","GZ","PDF","pdf");
	  
	  if(in_array(strtoupper($exe[count($exe)-1]),$arr)){
	      $filename=$i.".".$exe[count($exe)-1];
	      $uploadfile = "uploaded/mem-profile/".$filename;
	      }
		     move_uploaded_file($_FILES['picG']['tmp_name'],"uploaded/mem-profile/".$filename);
			 chmod($uploadfile, 0755);
		  }


 	$uid    = cleanIt($_REQUEST["uid"],'NO_HTML');
 	$name  = cleanIt($_REQUEST["fn"],'ALL');
 	$pass    = cleanIt($_REQUEST["pass"],'NO_HTML');
 	$mob    = cleanIt($_REQUEST["mob"],'ALL');


 	$bd    = cleanIt($_REQUEST["datepicker"],'NO_HTML');
 	$nati  = cleanIt($_REQUEST["nati"],'ALL');
 	$relig = cleanIt($_REQUEST["relig"],'ALL');
 	$email = cleanIt($_REQUEST["email"],'NO_HTML');
	

 $INSERTME = mysql_query("INSERT INTO `admin`
 			(`UID`, `username`, `password`, `email` , `birthd`, `mobile`, `religion`,  `nationality`, `pacth`, `dat`) VALUES
 			('$uid', '$name'  , '$pass',    '$email', '$bd'   , '$mob' ,  '$relig'  ,   '$nati',      '$filename', NOW());"); 




  if($INSERTME == 1){
	echo "<script>alert('This Process Done With Success');</script>";  ?>
				<script>location.href= "new-admin.php";</script>
				<?php }else{
		echo "<script>alert('Technical. Error');</script>";  ?>
				<script>location.href= "new-admin.php";</script>
				<?php  } ?>

<div class="one_wrap fl_left">
  <div class="widget">
   <div class="widget_title">
   	 <span class="iconsweet">8</span><h5>Result</h5>
   </div>
   
   <div class="widget_body">
   <h3 style="margin:10px 10px 10px 10px;" align="center">Your Data Was Recorded Successfully</h3>
       <a class="button_small whitishBtn" href="#"><span class="iconsweet">l</span>Export Table</a>

   </div><!--end of widget_body-->
    </div>
</div>

