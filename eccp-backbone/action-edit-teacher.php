<?php 

	$UserIDVal = $_REQUEST["UserIDVal"];
	
	
	if($_FILES["picG"]["name"]){
	 $i=time();
	 $exe=explode(".",$_FILES['picG']['name']);
	 $arr=array("JPEG","JPG","GIF","PNG");
	  
	  if(in_array(strtoupper($exe[count($exe)-1]),$arr)){
	      $filename=$i.".".$exe[count($exe)-1];
	      $uploadfile = "uploaded/mem-profile/".$filename;
	       }
		     move_uploaded_file($_FILES['picG']['tmp_name'],"uploaded/mem-profile/".$filename);
			 chmod($uploadfile, 0755);
		   }
		  
		  if(empty($filename)){
			$load001 = mysql_query("SELECT * FROM `teacher` where `ID` = '$UserIDVal' ");
			$load002 = mysql_fetch_array($load001);
			$filename  = $load001["path"];		  
		  }

	
 	$uid    = cleanIt($_REQUEST["uid"],'NO_HTML');
 	$pass    = cleanIt($_REQUEST["pass"],'NO_HTML');
 	$mob    = cleanIt($_REQUEST["mob"],'ALL');
 	$ll    = cleanIt($_REQUEST["ll"],'ALL');

 	$name  = cleanIt($_REQUEST["fn"],'ALL');
 	$bd    = cleanIt($_POST["datepicker"],'NO_HTML');
 	$nati  = cleanIt($_REQUEST["nati"],'ALL');
 	$relig = cleanIt($_REQUEST["relig"],'ALL');
 	$univ  = cleanIt($_REQUEST["univ"],'ALL');

 	$graduation = cleanIt($_REQUEST["graduation"],'ALL');
	
 	$email = cleanIt($_REQUEST["email"],'NO_HTML');
    $about = cleanIt($_REQUEST["about"],'ALL');
 	$picG  = cleanIt($_REQUEST["picG"],'ALL');

 	$curw  = cleanIt($_REQUEST["curw"],'NO_HTML');
 	$prew  = cleanIt($_REQUEST["prew"],'NO_HTML');
 	$qua   = cleanIt($_REQUEST["qua"],'NO_HTML');
	

 $INSERTME = mysql_query("UPDATE `teacher` SET `UID` = '$uid', `Upass` = '$pass', `name` = '$name', `Birthd` = '$bd', `nati` = '$nati', `relig` = '$relig', `univ` = '$univ', `graduation` = '$graduation', `email` = '$email' , `mobile` = '$mob', `landl` = '$ll', `about` = '$about', `path` = '$filename', `prew` = '$prew', `curw` = '$curw', `qua` = '$qua'  WHERE `ID` = '$UserIDVal' "); 




  if($INSERTME == 1){
	echo "<script>alert('This Process Done With Success');</script>";  ?>
				<script>location.href= "instructor-archive.php";</script>
				<?php }else{
		echo "<script>alert('Technical. Error');</script>";  ?>
				<script>location.href= "instructor-archive.php";</script>
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

