<?php
 require("Library/config.php");
 	if( !empty($_SESSION["user_admin"]) ){
	 	  if(checkadmin($_SESSION["user_admin"],"allow_new_course")){
		  	require("Library/cleanIt.php");  ?>
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
	   		include("action-edit-course.php");
		}else{
		 $CTitle  = cleanIt($_GET['valve']);
		 $SqlComand = mysql_query("select * from `subject` where `ID` = '$CTitle' ");
		 $FetchMe   = mysql_fetch_array($SqlComand);  ?>

        
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">

    
    
  <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>Edit Course</h5>
        </div>
  <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">
  <li>
   <label>Course Title</label>
   	<div class="form_input">
    	<input id="title" name="title" class="tip_east" type="text" value="<?php echo $FetchMe["title"]; ?>" title="">
    </div>
  </li>
  
  <li>
   <label>Course Description</label>
   	<div class="form_input">
      <textarea id="decs" name="decs" class="tip_east"><?php echo $FetchMe["desc"]; ?></textarea>
    </div>
  </li>
  
  <li>
   <label>Course Duration</label>
   	<div class="form_input">
    	<input id="duration" name="duration" class="tip_east" type="text" value="<?php echo $FetchMe["duration"]; ?>" title="">
    </div>
  </li>
  
  
 <li> 
  <div>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/_samples/sample.js"></script>
    <link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
        <textarea cols="80" id="cont" name="cont" rows="20"><?php echo $FetchMe["content"]; ?></textarea>
        <script type="text/javascript">
        //<![CDATA[
            // This call can be placed at any point after the
            // <textarea>, or inside a <head><script> in a
            // window.onload event handler.
            // Replace the <textarea id="editor"> with an CKEditor
            // instance, using default configurations.
            CKEDITOR.replace( 'cont' );
        //]]>
        </script>
 </div>
  </li>
  
  <li>
   <label>Course Fees</label>
   	<div class="form_input">
    	<input id="fees" name="fees" class="tip_east" type="text" value="<?php echo $FetchMe["fees"]; ?>" title="">
    </div>
  </li>
  
  
  
  <li>
   <label>Photo Cover</label>
     <div class="form_input">
      <div align="right"><input type="file" name="picG" id="picG"></div>
    </div>
  </li>                    


              
          </ul>
				
                


<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Record New Data Now" class="button_small whitishBtn">
     	<input type="hidden" name="action" value="update">
     	<input type="hidden" name="CovPath" value="<?php echo $FetchMe["CovPath"]; ?>">
     	<input type="hidden" name="CourID" value="<?php echo $FetchMe["ID"]; ?>">
   </div>
  </div>

    
    
     </div><!-- End of widget _body Div -->
 </div>



 
 
  
   </form>
 </div> 
    
    
    
    



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