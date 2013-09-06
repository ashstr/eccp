<?php
 require("Library/config.php");
 	if( !empty($_SESSION["user_admin"]) ){
	 	  if(checkadmin($_SESSION["user_admin"],"allow_new_course")){
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
<!--
<link rel="stylesheet" href="./js/cl_editor/jquery.cleditor.css" />
<link rel="stylesheet" href="./uploadify/uploadify.css" /> 	-->
<link rel="stylesheet" href="./css/jquery.ui.all.css" />
<!-- <link rel="stylesheet" href="./css/fullcalendar.css" /> 	-->
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
    <?php $flage = 6; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php include_once("secondary_nav_tools.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){

    $CID    = $_REQUEST["ID"];

 	$group    = $_REQUEST["group"];
 	$date     = cleanIt($_REQUEST["date"],'NO_HTML');
 	$topic    = cleanIt($_REQUEST["topic"],'NO_HTML');
 	$instr    = $_REQUEST["instr"];
 	$duration = cleanIt($_REQUEST["duration"],'NO_HTML');
		 		 
	  $GetData  = mysql_query("UPDATE `lecture` SET `GID` = '$group', `date` = '$date', `topic` = '$topic', `instructor` = '$instr', `duration` = '$duration' WHERE `ID` = $CID");
	  if($GetData){
	  	echo "<script>alert('Congratulation, This Process Done With Success');</script>";  ?>
				<script>location.href= "lecture-archive.php";</script>
				<?php }else{
	  	echo "<script>alert('Sorry, This Process Was fail');</script>";  ?>
				<script>location.href= "lecture-archive.php";</script>
			<?php 	}



 }else{		
 	$CID = intval($_GET["T"]);

 	if(!empty($CID)){
		   $SqlSql = mysql_query("select * from `lecture` where `ID` = '$CID' ");
		   $IDataz = mysql_fetch_array($SqlSql);
		}else{ ?><script>location.href= "lecture-archive.php";</script><?php }  ?>

        
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">

  <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>New Lecture Date</h5>
        </div>
        
        
<div class="widget_body">
        
 <ul class="form_fields_container">
  <li>
   <label>Select Group</label>
     <div class="form_input">
     <select name='group' id="group" dir="ltr">
<?php
	 $Sql = mysql_query("select * from `groups` ");
	   while ($Row = mysql_fetch_array($Sql)){
				echo"<option value='".$Row["ID"]."'";
				if($Row["ID"] == $IDataz["GID"]){ echo "selected"; }
				echo ">".$Row["ID"]."</option>";
		 } ?>
		</select>
     </div>
  </li>
  
  
  
    <li>
   <label>Lecture Date</label>
   	<div class="form_input">
    	<input id="date" name="date" class="tip_east" type="text" value="<?php echo $IDataz["date"]; ?>" title="">
    </div>
  </li>
  
  <li>
   <label>Lecture Topics</label>
   	<div class="form_input">

      <div>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/_samples/sample.js"></script>
    <link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
        <textarea cols="80" id="topic" name="topic" rows="20"><?php echo $IDataz["topic"]; ?></textarea>
        <script type="text/javascript">
        //<![CDATA[
            // This call can be placed at any point after the
            // <textarea>, or inside a <head><script> in a
            // window.onload event handler.
            // Replace the <textarea id="editor"> with an CKEditor
            // instance, using default configurations.
            CKEDITOR.replace( 'topic' );
        //]]>
        </script>
 </div>
    </div>
  </li>
  
  
  
<li>
   <label>Lecture Instructor</label>
     <div class="form_input">
     <select name='instr' id="instr" dir="ltr">
<?php
	 $SqlCo = mysql_query("select * from `teacher` ");
	   while ($Rows = mysql_fetch_array($SqlCo)){
				echo "<option value='".$Rows["ID"]."' ";
				if($Rows["ID"] == $IDataz["instructor"]){ echo "selected"; }
				echo ">".$Rows["name"]."</option>";
		 } ?>
		</select>
     </div>
  </li>
  
     
  <li>
   <label>Lecture Duration</label>
   	<div class="form_input">
    	<input id="duration" name="duration" class="tip_east" type="text" value="<?php echo $IDataz["duration"]; ?>" title="">
    </div>
  </li>
</ul>
				
                

<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Record New Data Now" class="button_small whitishBtn">
     	<input type="hidden" name="action" value="update">
     	<input type="hidden" name="ID" value="<?php echo $IDataz["ID"]; ?>">

   </div>
  </div>

    
    
     </div><!-- End of widget _body Div -->
 </div>



 
 
 </div>   
   </form>

    
    
    
    



    <?php } ?>         
      
      </div>
<!--   </section>
 </div>-->

</body>
</html>
<?php
 }else{ // unauthorized test
 	require("unauthorized.php");	
	}
	
 }else{
 	include("assay.php");
 } ?>