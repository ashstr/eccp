<?php
include_once("Library/config.php");
	if( !empty($_SESSION["user_admin"]) ){ ?>
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
<?php include_once("secondary_nav_main.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">	<!--Activity Stats-->
    	<?php include_once("activity_stats.php"); ?>                  
<!-- Quick Actions -->
<div id="quick_actions">
    <a class="button_big " href="new-member.php"><span class="iconsweet">+</span>New Member</a>
    <a class="button_big btn_grey" href="new-question.php"><span class="iconsweet">+</span>New Question</a>
    <a class="button_big btn_grey" href="#"><span class="iconsweet">+</span>New Exams</a>
    <a class="button_big btn_grey" href="inbox.php"><span class="iconsweet">@</span>Read New Message</a>
    <a class="button_big btn_grey" href="compose-message.php"><span class="iconsweet">C</span>Send Message</a>
    <a class="button_big btn_grey" href="#"><span class="iconsweet">f</span>Manage Exams</a>
</div>
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
 	<?php include("my-exam.php"); ?>     
	<!--One_Wrap-->




   
    <!--One_TWO-->
    <!--<div class="one_two_wrap69 fl_left">
        <div class="widget">
            <div class="widget_title"><span class="iconsweet">/s</span>
                <h5>Active Visits In Last 9 Day's</h5>
            </div>
            <div class="widget_body">
                <div class="content_pad">
                  <?php //include("XML/Column3D.php"); ?>
                </div>
            </div>
        </div>
    </div>-->
    
    
        
      
    <!--<div class="one_two_wrap30 fl_right">
        <div class="widget">
            <div class="widget_title"><span class="iconsweet"></span>
                <h5>Authorization and validity</h5>
            </div>
            <div class="widget_body">
                <div class="content_pad">
                  <table width="99%" border="1">
  <tr>
    <td>&nbsp;1</td>
    <td>&nbsp;2</td>
  </tr>
  <tr>
    <td>&nbsp;4</td>
    <td>&nbsp;5</td>
  </tr>
</table>

                </div>
            </div>
        </div>
    </div>-->
    
    
   
      
	<!--One_TWO-->
 	<!--<div class="one_two_wrap fl_left">
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
    </div>-->
	<!--One_TWO-->
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
		@session_start();
		@session_destroy();

		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		echo "<script>location.href='login.php'</script>";
  } ?>