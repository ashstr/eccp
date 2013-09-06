<?php 	
 include("Library/cleanIt.php");
	
	if($_FILES["cv"]["name"]){
	 $i=time();
	 $exe=explode(".",$_FILES['cv']['name']);
	 $arr=array("RAR","GZ","DOC","DOCX","PDF","pdf");
	  
	  if(in_array(strtoupper($exe[count($exe)-1]),$arr)){
	      $cv=$i.".".$exe[count($exe)-1];
	      $uploadfile = "uploaded/cv/".$cv;
	      }
		     move_uploaded_file($_FILES['cv']['tmp_name'],"uploaded/cv/".$cv);
			 chmod($uploadfile, 0755);
		  }

	
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

 	$uid      = cleanIt($_REQUEST["uid"],'NO_HTML');
 	$pass     = cleanIt($_REQUEST["pass"],'NO_HTML');
 	$name     = cleanIt($_REQUEST["fn"],'ALL');
 	$namear   = cleanIt($_REQUEST["fnar"],'ALL');
 	$gender   = cleanIt($_REQUEST["gender"],'ALL');
 	$bd       = cleanIt($_REQUEST["datepicker"],'HTML2TXT');
 	$nati     = cleanIt($_REQUEST["nati"],'ALL');
 	$relig    = cleanIt($_REQUEST["relig"],'ALL');
 	$univ     = cleanIt($_REQUEST["univ"],'ALL');
 	$curr     = cleanIt($_REQUEST["curr"],'ALL');
 	$GradY    = cleanIt($_REQUEST["GradY"],'ALL');
 	$email    = cleanIt($_REQUEST["email"],'HTML2TXT');
 	$mob      = cleanIt($_REQUEST["mob"],'ALL');
 	$ll       = cleanIt($_REQUEST["ll"],'ALL');
	
    $trai_exp = cleanIt($_REQUEST["trai_exp"],'ALL');
    $work_exp = cleanIt($_REQUEST["work_exp"],'ALL');
 	$trai_course  = cleanIt($_REQUEST["trai_course"],'ALL');
	
 	$trai_course  = cleanIt($_REQUEST["trai_course"],'ALL');

 $INSERTME = mysql_query("INSERT INTO `memeber` (
 	`UID`, `Upass`, `name`, `name_arb`, `gender`, `Birthd`, `nati`,  `relig`, `univ`,   `current_position`, `GradY`,  `email`, `mobile`, `landl`, `cv`,`path`, `trai_exp`, `work_exp`, `trai_course`
	) VALUES (
	'$uid', '$pass', '$name', '$namear', '$gender', '$bd', '$nati',  '$relig', '$univ', '$curr', 			 '$GradY', '$email', '$mob',   '$ll',  '$cv', '$filename', '$trai_exp', '$work_exp', '$trai_course');"); 



 if($INSERTME == 1){
	$Getlast0020 = mysql_query("SELECT * FROM `memeber` ORDER BY `ID` DESC LIMIT 0 , 1");
	$Getlast0021 = mysql_fetch_array($Getlast0020);
	
	$MEMBIDS 	  = $Getlast0021["ID"];

 /* *************** Our Courses Of Interest ************** */ 
	
	$CourOI = cleanIt($_POST["coi"],'NO_HTML');
	$CountMe 	 = 0;
	
	if(!empty($MEMBIDS)){
		foreach ($CourOI as $CourOInt){
		 if($CourOI){
			$sql999="insert into `courses_local_int` (`course_name`, `mem_id`)values( '$CourOI[$CountMe]', '$MEMBIDS') ";

		$Final_result = mysql_query($sql999);
		}
		$CountMe ++;
	}
	
  }else{ 
	echo "<script>alert('Error Other Courses Add User Id Empty');</script>";  ?>
	<script>location.href= "new-member.php";</script><?php  
 } 
 
/* *************** Other Courses Please Specified ************** */ 
	$other_co   = cleanIt($_POST["other_co"],'NO_HTML');
	$other_co_sql= mysql_query("insert into `courses_oth` (`course_name`, `mem_id`)values('$other_co', '$MEMBIDS')");
	
	
/* *************** Other Courses ************** */ 
	$coN = cleanIt($_POST["n_cour"],'NO_HTML');
	$instituteN   = cleanIt($_POST["n_inst"],'NO_HTML');
	$yearN 		= cleanIt($_POST["n_year"],'NO_HTML');
	$GradeN 	   = cleanIt($_POST["n_grad"],'NO_HTML');
	$coutN 	 = 0;
	
	if(!empty($MEMBIDS)){
		foreach ($coN as $ts){
		 if($ts){
			$sql="insert into `courses` (`course_name`, `institute`, `year`, `Grade` , `mem_id`, `flag`
				)values(
				 '$ts' , '$instituteN[$coutN]','$yearN[$coutN]', '$GradeN[$coutN]', '$MEMBIDS', '2') ";

		$result = mysql_query($sql);
		}
		$coutN ++;
	}
	
  }else{ 
	echo "<script>alert('Error Other Courses Add User Id Empty');</script>";  ?>
	<script>location.href= "new-member.php";</script><?php  
 } 
 
    /* ****************** Medical Course ****************** */
	$course_name = cleanIt($_REQUEST["course_name"],'NO_HTML');
	$institute   = cleanIt($_REQUEST["institute"],'NO_HTML');
	$year 		= cleanIt($_REQUEST["year"],'NO_HTML');
	$Grade 	   = cleanIt($_REQUEST["Grade"],'NO_HTML');
	$counter 	 = 0;
	
	if(!empty($MEMBIDS)){
		foreach ($course_name as $t){
		 if($t){
			$sql2="insert into `courses` (`course_name`, `institute`, `year`, `Grade`, `mem_id`, `flag`
				)values(
				 '$t' , '$institute[$counter]','$year[$counter]', '$Grade[$counter]' , '$MEMBIDS', '1') "; 

		$results = mysql_query($sql2);
		}
		$counter ++;
	}
	
  }else{ 
	echo "<script>alert('Error Course Add User Id Empty');</script>";  ?>
	<script>location.href= "new-member.php";</script>
 <?php  } 
 
 


 
   }else{
     echo "<script>alert('Technical. Error');</script>";  ?>
     <script>location.href= "new-member.php";</script>
  <?php  }  ?>
                
                

<div class="one_wrap fl_left">
  <div class="widget">
   <div class="widget_title">
   	 <span class="iconsweet">8</span><h5>Result</h5>
   </div>
   
   <div class="widget_body">
   <p style="margin:10px 10px 10px 10px;" align="left">Your Data Was Update Successfully</p>
   <p style="margin:10px 10px 25px 10px;" align="left"><a href="new-member.php" target="_self">Back To Add New Member</a></p>

   </div><!--end of widget_body-->
    </div>
</div>

