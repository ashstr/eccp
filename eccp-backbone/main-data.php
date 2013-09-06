<?php include_once("Library/config.php"); 
	if( !empty($_SESSION["user_admin"]) ){?>
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
    <?php $flage = 1; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php include_once("secondary_nav_main.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){
	   		// include("action-new-class.php");
			echo "<script>alert('Under Technical Development . Error-TD');</script>";
		}else{

	$GetlastUID  = mysql_query("SELECT * FROM `data`");
	$GetlastUID2 = mysql_fetch_array($GetlastUID);  ?>
        
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">   
    
  <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>New Class </h5>
        </div>
  <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">
 
  <li>
   <label>Class Title</label>
   	<div class="form_input">
    	<input id="class" name="class" class="tip_east" type="text" value="<?php echo $GetlastUID2["site_title"]; ?>" title="Make Sure to enter valid entry">
    </div>
  </li>
  


  <li>
   <label>Project URL</label>
   	<div class="form_input">
    	<input id="url" name="url" class="tip_east" type="text" value="<?php echo $GetlastUID2["domain"]; ?>" title="Make Sure to enter valid entry">
    </div>
  </li>
  
    <li>
     <label>Close Project</label>
      <div class="form_input"><input <?php if($GetlastUID2["close_site"]=="YES"){ echo "checked"; } ?> id="check1" type="checkbox"><label for="check1">If Project Was Closeed - This Will Be Checked</label></div>
    </li>

<li>
	<textarea name="ques" id="ques" rows="8" cols="60"><?php echo $GetlastUID2["close_resone"]; ?></textarea>
    <?php //$basePath = "http://novascotia-inc.ca/eccp/ECCP-BackBone/"; ?>
<script type="text/javascript" src="<?php echo $domain_site; ?>ckeditor/ckeditor.js?t=A06B"></script>
<script type="text/javascript">
  CKEDITOR.replace( 'ques',
{
	filebrowserBrowseUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	filebrowserWindowWidth : '800',
 	filebrowserWindowHeight : '700',
 	language : 'ar'
});
</script>
</li>

<!--  <li>
   <label>Photo Cover</label>
     <div class="form_input">
      <div align="right"><input type="file" name="picG" id="picG"></div>
    </div>
  </li>                    
-->

              
 </ul>


<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="update New Data" class="button_small whitishBtn">
     	<input type="hidden" name="action" value="update">

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
<?php }else{
 	include("assay.php");
 } ?>