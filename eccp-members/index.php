<?php
require("Library/config.php"); 
 	  if( !empty($_SESSION["UID"]) ){ ?>

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>ECCP - VirtualOffice - NovaScotia-Inc.ca</title>
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

<!--Header-->
<!--Dreamworks Container-->
<div id="dreamworks_container">
    <!--Primary Navigation Start -->
    <?php $flage = 1; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
 <nav id="secondary_nav"> 
    <!--UserInfo-->
    <?php include("iden_card.php"); ?>
    <h2>Course Home</h2>
        <ul>
            <li><a href="#"><span class="iconsweet">a</span>User Profiles</a></li>
            <li><a href="#"><span class="iconsweet">+</span>All Course</a></li>
            <li><a href="#"><span class="iconsweet">r</span>Admin Tools</a></li>
            <li><a href="#"><span class="iconsweet">s</span>Admin Tools</a></li>
            <li><a href="#"><span class="iconsweet">k</span>Admin Tools</a></li>
            <li><a href="#"><span class="iconsweet">o</span>Milestornes</a></li>
            <li><a href="#"><span class="iconsweet">S</span>Worklog</a></li>
        </ul>
 </nav>
<!--Content Wrap-->
<div id="content_wrap">	<!--Activity Stats-->
    	<?php include("activity.php"); 
		
		?> 


        <!--<div class="msgbar msg_Info hide_onC" style="margin-bottom:15px;">
           <span class="iconsweet">*</span><p>This is a Information message.</p>
        </div>
        <div class="msgbar msg_Success hide_onC" style="margin-bottom:11px;">
            <span class="iconsweet">=</span><p>This is a Success message.</p>
        </div> -->


<!--Quick Actions
<div id="quick_actions">
    <a class="button_big" href="#"><span class="iconsweet">+</span>Add new Project</a>
    <a class="button_big" href="#"><span class="iconsweet">w</span>Export Report</a>
    <a class="button_big btn_grey" href="#"><span class="iconsweet">f</span>Manage Projects</a>
</div>-->
	<!--Notification Message-->
    
    
    	<!--<div class="msgbar msg_Info hide_onC">
            <span class="iconsweet">*</span>
            <p>Welcome Back To Your ECCP Virtual Office Disk !</p>
      </div>-->
      
 

<!--<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Activity across your course</h5></div>
            <div class="widget_body">          	
				
            </div>
        </div>
    </div>-->



     
	<!--One_Wrap-->
 	<?php
		include("my-note.php");

		include("my-course.php");
		?>     
	<!--One_Wrap-->




   
    
   
      
	<!--One_TWO-
 	<div class="one_two_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title">
            	<span class="iconsweet">r</span><h5>Your Performance Evaluation</h5>
            </div>
            <div class="widget_body">
            <!--Projects Graph--
                <div id="chart_linear" class="no_overflow">
                </div>
            </div>
        </div>
    </div>
	One_TWO-->
 	<div class="one_two_wrap fl_right">
    	<div class="widget">
        	
            <?php // include("product_bar.php"); ?>
        </div>
    </div>  
    	
		<?php require_once("exam-table.php");	 ?>
      
  </div>
</section>
</div>
 </body>
</html>
<?php }else{
 		 require("assay.php");
     } ?>