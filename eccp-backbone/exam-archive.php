<?php
 require("Library/config.php");
  if( !empty($_SESSION["user_admin"]) ){
     require("Library/cleanIt.php"); 
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
	
<?php if($_REQUEST["action"]=="update"){ }else{  ?>
        
<!--One_Wrap-->
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
        	<h5>Exam Archive Access - ECCP</h5>
       	  </div>
            <div class="widget_body">
            	<!--Activity Table-->
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>
                      <th width="8%">ID</th>
                      <th width="42%">Exam Titile</th>
                      <th width="14%">add date</th>
                      <th width="13%">author</th>
                      <th width="9%">status</th>
                      <th width="14%">Actions</th>
                  </tr>
 <?php 
  $cleanHTML03 = cleanIt($_GET['T'],'NO_HTML');	
  $CID = intval($cleanHTML03);

 	$Comm1 = mysql_query("SELECT * FROM `exam` WHERE `group` = '$CID' LIMIT 0, 90 ");
		while( $result = mysql_fetch_array($Comm1)){ ?>
     <tr>
        <td align="center"><?php echo $result["ID"]; ?></td>
        <td align="left"><?php
			$valv = cleanIt($result["title"],'NO_HTML');
			$valv = strip_tags($valv);
			str_replace("<p>",' ',$valv);
	  echo  html_entity_decode($valv);
		  ?></td>
        <td align="center"><span class="green_highlight pj_cat" ><?php echo $result["date"]; ?></span></td>
        <td align="center"><?php if($result["author"]== ""){ echo "Not Define"; }else{ echo $result["author"]; } ?></td>
  <td align="center">
  	<a href="#">
	 <?php if($result["pending"]!=0){
	 			echo "Active";
			  }else{
			    echo "<span style='color:#FF0000'><strong>INACTIVE</strong></span>";
			    } ?>
     </a>
   </td>
        <td align="center"><span class="data_actions iconsweet">
	 <?php if($result["pending"] == 1){ ?>
	   <a class="tip_north" original-title="Disactive This Exam" href="disactive-exam.php?SESSION=ECCP&=SESSIONID=<?php echo rand(1111111, 9999999); ?>&T=<?php echo $result["ID"]; ?>">z</a>
   <?php  }else{ ?>       
	   <a class="tip_north" original-title="Active This Exam" href="valid-exam.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>">y</a>
     <?php  } ?>       
 
        <a class="tip_north" original-title="View Full Exam Details" href="view-exam.php?point=<?php echo $result["ID"]; ?>" target="_blank">}</a> 
            <a class="tip_north" original-title="View Full Question" href="question-list.php?point=<?php echo $result["ID"]; ?>" target="_blank">%</a> 
        
        <a class="tip_north" original-title="Edit" href="edit-exam.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>">l</a>
        <!--<a class="tip_north" original-title="Delete This Question" href="delete-question.php?SESSION=ECCP&=SESSIONID=<?php //echo rand(11111, 99999); ?>&T=<?php //echo $result["ID"]; ?>">X</a>--></span></td>
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