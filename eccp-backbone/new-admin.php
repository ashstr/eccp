<?php require_once("Library/config.php"); 
		if( !empty($_SESSION["user_admin"]) ){
			if(checkadmin($_SESSION["user_admin"],"allow_admin_manage")){  ?>
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
<!--Javascript-->
<script type="text/javascript" src="./js/jquery.min.js"> </script>
<script type="text/javascript" src="./js/highcharts.js"> </script>
<script type="text/javascript" src="./js/exporting.js"> </script>
<script type="text/javascript" src="./js/jquery.quicksand.js"> </script>
<script type="text/javascript" src="./js/jquery.easing.1.3.js"> </script>
<script type="text/javascript" src="./js/jquery.tipsy.js"> </script>
<script type="text/javascript" src="./js/cl_editor/jquery.cleditor.min.js"> </script>
<script type="text/javascript" src="./uploadify/swfobject.js"></script>
<script type="text/javascript" src="./uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" src="./js/jquery.autogrowtextarea.js"></script>
<script type="text/javascript" src="./js/form_elements.js"></script>
<script type="text/javascript" src="./js/jquery.ui.core.js"></script>
<script type="text/javascript" src="./js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="./js/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="./js/jquery.ui.slider.js"></script>
<script type="text/javascript" src="./js/jquery.ui.progressbar.js"></script>
<script type="text/javascript" src="./js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="./js/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="./js/fullcalendar.js"></script>
<script type="text/javascript" src="./js/gcal.js"></script>
<script type="text/javascript" src="./js/bootstrap-modal.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./js/highlight.js"></script>
<script type="text/javascript" src="./js/main.js"> </script>
<meta charset="UTF-8"></head>
<body>
<!--Container-->
<div id="dreamworks_container">
    <!--Primary Navigation Start -->
    <?php $flage = 1; require("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php require("secondary_nav_main.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){
		if( !empty($_REQUEST["email"]) ){
	   		
			require("action-new-admin.php");
			
		}else{
				echo "<script>alert('Error In Email Entery /n Please Enter This Information In Correct Case');</script>";  ?>
			<script>location.href= "new-admin.php";</script>
	<?php  }
		
		
		}else{

	$GetlastUID  = mysql_query("SELECT * FROM `admin` ORDER BY `ID` DESC LIMIT 0 , 1");
	$GetlastUID2 = mysql_fetch_array($GetlastUID);
	$last_UID    = $GetlastUID2["ID"]+1;  ?>

        
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">




         <!--One_TWO-->
    <div class="one_two_wrap fl_left">
        <!--Unordered List-->
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">k</span>
                <h5>Admin Login Information</h5>
          </div>
            <div class="widget_body">
                <div class="content_pad">
                    <ul class="form_fields_container">
  <li>
   <label>User ID</label>
    <div class="form_input" style="width:60%">
    	<input id="uid" name="uid" class="in_submitted" type="text" value="<?php echo $last_UID; ?>" title="" readonly>
    </div>
  </li>
  
  <li>
   <label>Password</label>
    <div class="form_input" style="width:60%">
    	<input id="pass" name="pass" class="in_submitted" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>
  

 </ul>
                </div>
            </div>
        </div>
 </div>
 



<div class="one_two_wrap fl_right">
        <!--List Tick-->
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">N</span>
                <h5>Contact Information</h5>
            </div>
            <div class="widget_body">
                <div class="content_pad">
                    <ul class="form_fields_container">

  <li>
   <label>Mobile Num</label>
    <div class="form_input" style="width:60%">
    	<input id="mob" name="mob" class="in_processing" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>
  
  
  <li>
   <label>Email</label>
    <div class="form_input" style="width:60%">
    	<input id="email" name="email" class="in_processing" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>
  

 </ul>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
         <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>New Admin Access</h5>
            </div>
            <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">


  <li>
   <label>Full Name</label>
   	<div class="form_input">
    	<input id="fn" name="fn" class="tip_east" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>
  

<li><label>Birthday Picker</label> <div class="form_input"><input style="width:20%" type="text" id="datepicker" name="datepicker"> (dd-mm-yyyy)</div></li>  </li>
  

  <li>
   <label>Nationality</label>
   	<div class="form_input">
    	<input id="nati" name="nati" class="tip_east" type="text" value="Egyptian" title="Make Sure to enter valid entry">
    </div>
  </li>

  <li>
   <label>Religion</label>
   	<div class="form_input">
    	<input id="relig" name="relig" class="tip_east" type="text" value="Muslim" title="Make Sure to enter valid entry">
    </div>
  </li>
  

  <li>
   <label>University</label>
   	<div class="form_input">
    	<input id="univ" name="univ" class="tip_east" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>
                      

  <li>
   <label>Photo</label>
     <div class="form_input">
      <div align="right"><input type="file" name="picG" id="picG"></div>
    </div>
  </li>                    

              
          </ul>
				
<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Record New data Now" class="button_small whitishBtn">
     	<input type="hidden" name="action" value="update">
     	<input type="hidden" name="ProdID" value="<?php echo $Psuperid; ?>">
    <!--<a class="button_small whitishBtn" href=""><span class="iconsweet">l</span>Export Table</a>-->
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
 	require("assay.php");
 } ?>