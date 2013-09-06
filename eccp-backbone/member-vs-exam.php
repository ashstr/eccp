<?php include_once("Library/config.php"); 
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
    <?php $flage = 5; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php include_once("secondary_nav_question.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){
		
		}else{  ?>
<!--One_Wrap-->
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Member VS Exam Archive Access - ECCP</h5></div>
            <div class="widget_body">
            	<!--Activity Table-->
                <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>
                        <th width="6%">ID</th>
                      <th width="21%">NAME</th>
                      <th width="49%">exam name</th>
                      <th width="15%">time</th>
                      <th width="9%">Actions</th>
                  </tr>
 <?php 
 	$checker = mysql_query("SELECT * FROM `exam_checker` LIMIT 0, 200 ");
		while( $result = mysql_fetch_array($checker)){

		 $namequey = mysql_query("SELECT * FROM `memeber` where `ID` = $result[uid]  "); 
		 $namereq = mysql_fetch_array($namequey);
		 
		 $exam = mysql_query("SELECT * FROM `exam` where `ID` = $result[exam_id]  "); 
		 $examreq = mysql_fetch_array($exam);
		 
		 
		 ?>
     <tr>
        <td align="center"><?php echo $result["ID"]; ?></td>
        <td align="center"><a href="#" style="font-family:Tahoma;"><?php echo $namereq["name"]; ?></a></td>
        <td align="center"><span class="green_highlight pj_cat"><?php echo $examreq["title"]; ?></span></td>
        <td align="center"><a href="#"><?php echo $result["time"]; ?></a></td>
	
        <td align="center">
          <span class="data_actions iconsweet">
        	<a class="tip_east" original-title="View Details" href="#">l</a>
            <a class="tip_north" original-title="reactive this exam again" href="reactive-exam.php?id=<?php echo $result["ID"]; ?>">z</a>
          </span></td>
      </tr>                   
	<?php } ?>
  </table>
 </form>
 
 <!--<div class="action_bar">
                    <a class="button_small whitishBtn" href="#"><span class="iconsweet">l</span>Export This List To Excel Sheet </a>
                </div>-->
            </div>
        </div>
    </div> 
    <?php } ?>         
      
      </div>
   </section>
 </div>

</body>
</html>
<?php }else{
 	include("assay.php");
 } ?>