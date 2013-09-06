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


 	$class  = cleanIt($_REQUEST["class"],'NO_HTML');
 	$uid    = cleanIt($_REQUEST["uid"],'NO_HTML');
 	$pass    = cleanIt($_REQUEST["pass"],'NO_HTML');
 	$mob    = cleanIt($_REQUEST["mob"],'ALL');
 	$ll    = cleanIt($_REQUEST["ll"],'ALL');


 	$name  = cleanIt($_REQUEST["fn"],'ALL');
 	$bd    = cleanIt($_REQUEST["bd"],'NO_HTML');
 	$nati  = cleanIt($_REQUEST["nati"],'ALL');
 	$relig = cleanIt($_REQUEST["relig"],'ALL');
 	$univ  = cleanIt($_REQUEST["univ"],'ALL');
 	$class  = cleanIt($_REQUEST["class"],'ALL');
 	$email = cleanIt($_REQUEST["email"],'NO_HTML');
    $about = cleanIt($_REQUEST["about"],'ALL');
 	$picG  = cleanIt($_REQUEST["picG"],'ALL');
 	$note  = cleanIt($_REQUEST["note"],'NO_HTML');
	

 $INSERTME = mysql_query("UPDATE `memeber` SET `Upass` = '$pass',  `name` = '$name', `Birthd` = '$bd', `nati` = '$nati', `relig` =, `univ` =, `class` =, `email` = ,  `mobile` = ,  `landl` = , `about` = , `path` = , `note` = , `classid` = ) VALUES ( '$relig', '$univ', $class, '$email', '$mob', '$ll', '$about', '$filename', '$note', '$class'  WHERE  `memeber`.`ID` =1"); 


UPDATE  `eccp`.`memeber`   `univ` =  '6 Of Oct University',
`class` =  'final'

  if($INSERTME == 1){
	echo "<script>alert('This Process Done With Success');</script>";  ?>
				<script>location.href= "member-archive.php";</script>
				<?php }else{
		echo "<script>alert('Technical. Error');</script>";  ?>
				<script>location.href= "member-archive.php";</script>
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

