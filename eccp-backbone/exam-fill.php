<?php
 require("Library/config.php");
 	if( !empty($_SESSION["user_admin"]) ){
 	    require("Library/RPC.php"); 
	 	  if(checkadmin($_SESSION["user_admin"],"allow_add_exam")){ ?>
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
	   		//include("action-new-member.php");
		}else{  ?>
        
<!--One_Wrap-->
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
        	<h5>Exam Titles - ECCP</h5>
       	  </div>
            <div class="widget_body">
            	<!--Activity Table-->
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>
                        <th width="10%">ID</th>
                        <th width="60%">Exam Titile</th>
                        <th width="22%">author</th>
                        <th width="8%">Add </th>
                  </tr>
 <?php 
 	$Comm1 = mysql_query("SELECT * FROM `exam` LIMIT 0, 50 ");
		while( $result = mysql_fetch_array($Comm1)){ ?>
 <tr>
    <td align="center"><?php echo $result["ID"]; ?></td>
    <td align="left"><?php
        $valv = cleanIt($result["title"],'NO_HTML');
        $valv = strip_tags($valv);
        str_replace("<p>",' ',$valv);
  echo  html_entity_decode($valv);
      ?></td>
    <td align="center"><a href="#">
      <?php if($result["author"]== ""){ echo "Not Define"; }else{ echo $result["author"]; } ?>
    </a></td>
    <td align="center"><span class="data_actions iconsweet"><a class="tip_north" original-title="Add Question In This Exam" href="all-course-view.php?SESSION=ECCP&SESSIONID=<?php echo rand(11111, 99999); ?>&SESSIONID=<?php echo rand(11111111, 999999999);  echo "&MCV=".generateCodeBig(40); ?>&ExamID=<?php echo $result["ID"]; ?>&PartID=<?php echo rand(11111111, 999999999); echo generateCodeBig(40); ?>">i</a></span></td>
  </tr>                   
	<?php } ?>
  </table>
<div class="action_bar">
                    <!--<a class="button_small whitishBtn" href="#"><span class="iconsweet">l</span>Export This List To Excel Sheet </a>-->
                </div>
            </div>
        </div>
    </div> 
    <?php } ?>         
      
      </div>
   </section>
 </div>

</body>
</html>
<?php
 }else{ // unauthorized test
 	require("unauthorized.php");	
	}
	
 }else{
 	include("assay.php");
 } ?>