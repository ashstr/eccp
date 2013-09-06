<?php
 include("Library/config.php");
   if( !empty($_SESSION["user_admin"]) ){ 
	  require("Library/cleanIt.php"); ?>

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php echo $site_title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">

<!--Stylesheets-->


<link rel="stylesheet" href="./css/reset.css" />
<link rel="stylesheet" href="./css/main.css" />
<link rel="stylesheet" href="./css/typography.css" />
<link rel="stylesheet" href="./css/tipsy.css" />
<link rel="stylesheet" href="./js/cl_editor/jquery.cleditor.css" />
<link rel="stylesheet" href="./uploadify/uploadify.css" />
<link rel="stylesheet" href="./css/jquery.ui.all.css" />
<link rel="stylesheet" href="./css/fullcalendar.css" />
<link rel="stylesheet" href="./css/bootstrap.css" />
<link rel="stylesheet" href="./js/fancybox/jquery.fancybox-1.3.4.css" />
<link rel="stylesheet" href="./css/highlight.css" />
<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<script type="text/javascript" src="./js/jquery.min.js"> </script>
<script type="text/javascript" src="./js/jquery.quicksand.js"> </script>
<script type="text/javascript" src="./js/jquery.easing.1.3.js"> </script>
<script type="text/javascript" src="./js/jquery.tipsy.js"> </script>

<script type="text/javascript" src="./js/jquery.autogrowtextarea.js"></script>
<script type="text/javascript" src="./js/form_elements.js"></script>
<script type="text/javascript" src="./js/jquery.ui.core.js"></script>
<script type="text/javascript" src="./js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="./js/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="./js/gcal.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./js/main.js"> </script>



<meta charset="UTF-8"></head>
<body>
<!--Container-->
<div id="dreamworks_container">
    <!--Primary Navigation Start -->
    <?php $flage = 1; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php include_once("secondary_nav_main.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){
		echo "1";
		if( !empty($_REQUEST["GID"]) ){

			$MemID = cleanIt($_POST["MyId"],'ALL'); 
			$CID 	  = cleanIt($_POST["CID"],'ALL');
			$GID 	  = cleanIt($_POST["GID"],'ALL');			
			  
			  $Comm1 = mysql_query("insert into `course2member` (`MID`, `CID`, `GID`) values ('$MemID', '$CID', '$GID') ") or die(mysql_error());
				
				if($Comm1){
					echo "<script>alert('Adding Course To User Done Successfully');</script>";  ?>
					<script>location.href= "Course-Controller.php?SESSION=ECCP&=SESSIONID=79367&T=<?php echo $MemID; ?>";</script>
				<?php }else{
				echo "<script>alert('Sorry Error Add This Course To Member');</script>";  ?>
				<script>location.href= "Course-Controller.php?SESSION=ECCP&=SESSIONID=79367&T=<?php echo $MemID; ?>";</script>
		 <?php   }
	
		}else{
				echo "<script>alert('Sorry No User Group Selected From List /n Please You Must Select Group From List To Recognition Correct Date');</script>";  ?>
				<script>location.href= "Course-Controller.php?SESSION=ECCP&=SESSIONID=79367&T=<?php echo $MemID; ?>";</script>
	    <?php  } // end of check  if( !empty($_REQUEST["to"]) )
		
		
 }else{
#########################################################################################################################################################
########################                          Show Normal Case Here                                                          ########################
#########################################################################################################################################################

		$MemIdValue = cleanIt($_REQUEST["T"],'ALL');
		$Comm1 = mysql_query("SELECT * FROM `memeber` where `ID` = '$MemIdValue' ") or die(mysql_error());

		if(mysql_num_rows($Comm1) > 0){
		 
		 $result = mysql_fetch_array($Comm1);


		 // Get All Information About user and course
		 $GetCourseInfo = mysql_query("SELECT * FROM `course2member` where `MID` = '$MemIdValue' ") or die(mysql_error());
		 if(mysql_num_rows($GetCourseInfo) >0){ ?>

 <div class="one_wrap">
 
 <form name="team" id="team" class="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?SESSION=ECCP&=SESSIONID=48179&T=<?php echo $_GET["T"]; ?>" enctype="multipart/form-data">

 
         <div class="widget">
        	<div class="widget_title">
             <span class="iconsweet">C</span>
              <h5>Archive For Member Course - ECCP</h5>
            </div>
            <div class="widget_body">
            	<!--Activity Table-->

			<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr>
                    <th width="8%">ID</th>
                    <th width="13%">NAME</th>
                    <th width="13%">University </th>
                    <th width="23%">Course</th>
                    <th width="20%">Course > Group</th>
                    <!--<th width="13%">Actions</th>-->
              </tr>

	<?php 	while($GetCourseInfo1 = mysql_fetch_array($GetCourseInfo) ){
				$Command1  = mysql_query("SELECT * FROM `memeber` where `ID` = '$GetCourseInfo1[MID]' ");
				$Command1F = mysql_fetch_array($Command1); 
				
				$Command2  = mysql_query("SELECT * FROM `subject` where `ID` = '$GetCourseInfo1[CID]' ");
				$Command2F = mysql_fetch_array($Command2); 
				
				$CommandGroup  = mysql_query("SELECT * FROM `groups` where `ID` = '$GetCourseInfo1[GID]' ");
				$CommandGroupF = mysql_fetch_array($CommandGroup); 
				
				?>
     <tr>
        <td align="center"><?php echo $Command1F["UID"]; ?></td>
        <td align="center"><?php echo $Command1F["name"]; ?></td>
        <td align="center"><span class="green_highlight pj_cat"><?php echo $Command1F["univ"]; ?></span></td>
        <td align="center"><a href="view-course.php?valve=<?php echo $GetCourseInfo1["CID"]; ?>" target="_blank"><?php echo $Command2F["title"]; ?></a></td>
        <td align="center">
        	<a href="view-group.php?SESSION=ECCP&=SESSIONID=85734&T=<?php echo $GetCourseInfo1["GID"]; ?>" target="_blank"><?php echo $CommandGroupF["UnConID"]; ?></a></td>
        <!--<td align="center"><?php //echo $Command1F["name"]; ?></td>-->
      </tr>                   
	<?php } ?>
  </table>

	</div>
  
	<?php 
		}else{ // no course find tin DB Do back to search page
	 		echo "<script>alert('Sorry No Course Matching With This User Information  /n Sorry This Correct Matching Error. ');</script>"; ?>
			<script>location.href= "Search-Member.php";</script>
	    	<?php } ?>



<!--One_Wrap-->

     <?php }else{ // here if we cant find this memeber with the ID
	 				echo "<script>alert('No User Was Find By This ID ');</script>";  ?>
					<script>location.href= "Search-Member.php";</script>  <?php }// end of check query database  ?>

        
      
      </div>
	




<div class="widget">
   <div class="widget_title">
     <span class="iconsweet">C</span>
       <h5>Search For Member Access - ECCP</h5>
     </div>
     <div class="widget_body">

<ul class="form_fields_container">

  
  <li>
   <label>Member ID</label>
    <div class="form_input"><input type="text" value="<?php echo $Command1F["UID"]; ?>" disabled></div>
  </li>

  <li>
   <label>Set Course</label>
    <div class="form_input">
     <select name="CID" id="CID" onChange="document.team.submit();">
       <?php 
 		 $CID = mysql_query("select * from `subject` where `parent_cat` = '0'  ");
		  while( $CID2 = mysql_fetch_array($CID)){ ?>
     		<option value="<?php echo $CID2["ID"]; ?>" <?php if($CID2["ID"] == $_REQUEST["CID"]){ echo "selected"; }?> ><?php echo $CID2["title"]; ?></option>
   	   <?php } ?>         
     </select>
    </div>
  </li>



<!-- Number Of Option -->
<?php // echo md5(uniqid(rand(), true)); // generateCodeBig(6);
  if(!empty($_POST["CID"]) ){
   $CourID = intval($_POST["CID"]); ?>
 <li>
  <label>Select Group</label>
    <div class="form_input">
      <select name="GID" id="GID"s>
		<option value="0" >Select Group</option>
         <?php  
  	       $Gquery  = mysql_query("select * from `groups` where `courseid` = '$CourID' ");
		     while( $Gresult = mysql_fetch_array($Gquery)){ ?>
                <option value="<?php echo $Gresult["ID"]; ?>" ><?php echo $Gresult["UnConID"]; ?></option>
              <?php } ?>
        </select>
        
 </div>
</li>
 <input type="hidden" name="action" value="update">
 <input type="hidden" name="MyId" value="<?php echo $Command1F["ID"]; ?>">
<?php   }?>
</ul>


	</div>
   </div> 
   
   <div class="widget_body">
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Record New Course Now" class="button_small whitishBtn">
      
   </div>
  </div>

 </form>  
  </div>
	
    
    
    </div>
 </section>
</body>
</html>

    <?php } // end normal view
    
 }else{
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		echo "<script>location.href='login.php'</script>";
} ?>
