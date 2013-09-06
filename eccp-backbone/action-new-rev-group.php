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
		  }// end of if($_FILES["picG"]["name"])



 	$courseid      = cleanIt($_REQUEST["CID"],'NO_HTML');
 	$groupid      = cleanIt($_REQUEST["gid"],'NO_HTML');

 	$type      = cleanIt($_REQUEST["type"],'NO_HTML');
 	$inst      = cleanIt($_REQUEST["inst"],'NO_HTML');

 	$startda      = cleanIt($_REQUEST["startda"],'NO_HTML');
 	$ends      = cleanIt($_REQUEST["ends"],'NO_HTML');

 	$month      = cleanIt($_REQUEST["month"],'NO_HTML');
 	$days       = cleanIt($_REQUEST["days"],'NO_HTML');

 	$mdexam      = cleanIt($_REQUEST["mdexam"],'NO_HTML');
 	$fexam      = cleanIt($_REQUEST["fexam"],'NO_HTML');
	
 	$active      = 1;
	
 	$att1       = cleanIt($_REQUEST["att"],'NO_HTML');
 	$att2       = cleanIt($_REQUEST["att2"],'NO_HTML');
 	$vacation   = cleanIt($_REQUEST["vacation"],'NO_HTML');

    $INSERTME  = mysql_query("INSERT INTO `groups`
	(`courseid`,  `type`,  `inst`,  `startda`,  `ends`,   `month`, `days`,  `mdexam`,  `fexam`,  `active`, `att1`,  `att2`,  `vacation`,  `UnConID`) VALUES
	('$courseid', '$type', '$inst', '$startda', '$ends', '$month', '$days', '$mdexam', '$fexam', 'YES',    '$att1', '$att2', '$vacation', '$groupid');"); 




  if($INSERTME == 1){
	  
		$getfinald = mysql_query("SELECT `ID` FROM `groups` ORDER BY `ID` DESC LIMIT 0 , 1");
		$fetchdatas = mysql_fetch_array($getfinald);
		
	foreach ($_POST['inst'] as $names){
		$INSERTME03  = mysql_query("INSERT INTO `gr_ins` (`group`, `instID`, `flag`) VALUES ('$fetchdatas[ID]', '$names', '1');"); 
		print "You are selected $names<br/>";
	
	}


	echo "<script>alert('This Process Done With Success');</script>";  ?>
				<script>location.href= "new-rev-group.php";</script>
				<?php }else{
		echo "<script>alert('Technical. Error');</script>";  ?>
				<script>location.href= "new-rev-group.php";</script>
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