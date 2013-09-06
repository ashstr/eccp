<?php 
  include_once("Library/config.php"); 

/******************************** Validation Action 1 **************************************
	Chack if user was login really or not & if the exam id was send and not empty          */	
	
	
 if( !empty($_SESSION["UID"]) ){	  
	 
	$NovaUIDValus = $_SESSION["UID"]; 	 // This User ID
	$examID9      = intval($_GET["es"]);  // Exam ID

	 
	  	if(empty($examID9)){ ?>
        	<script type="text/javascript">
        		function closeme(){
					close();
					}
			</script>
         <script type="text/javascript">closeme();</script>
         
	<?php }else{ // This Exam ID Not Empty Start Work

 /******************  add new session with exam id as holder  *******************************/	
 	//
 	//$_SESSION["examID9"] = intval($_GET["es"]);
	// Load From container
	
 /******************************* Load Exam Properties Information **************************/
	$load = mysql_query("SELECT * FROM `exam` where `ID`= $examID9 ");

 /*********************************************************************************/
 /******************************* Chack If Exam existing **************************/
	 if(mysql_num_rows($load) <=0 ){	 	
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		echo "<script>location.href='login.php'</script>";
	 } /* else{   echo mysql_num_rows($load); } */
 /*********************************************************************************/
 

 /*********************************************************************************/
 /*******************************  Excute Fetch Load Question *********************/
	$RDU = mysql_fetch_array($load);
	$TITLE = $RDU["title"];
	$Times = $RDU["exam_period"];
 /*********************************************************************************/


 /******************************* Load All Exam Qustaion From Container *********************/
/* 	$Get0F1 = mysql_query("SELECT * FROM  `container` WHERE `eid` = '$examID9' ORDER BY RAND() "); */

 	$Get0F1 = mysql_query("SELECT * FROM  `container` WHERE `eid` = '$examID9' ORDER BY `qid` ASC "); 
	$QnumsR = mysql_num_rows($Get0F1); // To Show Number OF Qustaion IN Top Area


	// Check IF the Quseation ID Was Find And Not Empty and if it empty will add from us intioan value
	if( isset($_GET["es"]) || !empty($_GET["es"]) ){
		$QustaionID = intval($_GET["es"]);
	  }else{
		$Qnums       = mysql_query("SELECT `qid` FROM `container` WHERE `eid` = '$examID9' ORDER BY `ID` ASC LIMIT 0 , 1 ");
		$Qustaion    = mysql_fetch_array($Qnums);
		$QustaionID  = $Qustaion["qid"];
	  } 
	  
	  
	// Check IF The Member was enter this exam befoure 
	$cheackPrevious = mysql_query("SELECT * FROM `exam_checker` WHERE `uid`= '$NovaUIDValus' AND `exam_id` = '$examID9' AND `flag` ='1' ");
	 if(mysql_num_rows($cheackPrevious) ){
		 /*  require("unauthorizedexam.php");
		   die();  */	   
	}else{
	/*	$insertFlag  = mysql_query("insert into `exam_checker` (`time`, `uid`, `exam_id`, `exam_period`, `flag`)VALUES(NOW(), '$NovaUIDValus', '$examID9', '$Times', '1')"); */
		$insertFlag  = mysql_query("insert into `exam_checker` (`time`, `uid`, `exam_id`, `exam_period`)VALUES(NOW(), '$NovaUIDValus', '$examID9', '$Times' )");
	}
	
	if($insertFlag){

 	   /******************************* Load Qustaion  *********************************/
	   $GetQTitle   = mysql_query("SELECT * FROM  `questions` WHERE `ID` = '$QustaionID'");
	   $GetQTitleR  = mysql_fetch_array($GetQTitle);
	   $TheQustaion = $GetQTitleR["ques"]; 	?>
       
<!DOCTYPE html>
  <html>
  <head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php echo $TITLE." - ".$site_title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<!--Stylesheets-->

<link rel="stylesheet" href="./css/reset.css" />
<link rel="stylesheet" href="./css/main2.css" />
<link rel="stylesheet" href="./css/typography.css" />
<!--<link rel="stylesheet" href="./css/tipsy.css" />
<link rel="stylesheet" href="./js/cl_editor/jquery.cleditor.css" />
<link rel="stylesheet" href="./uploadify/uploadify.css" />
<link rel="stylesheet" href="./css/jquery.ui.all.css" />
<link rel="stylesheet" href="./css/fullcalendar.css" />-->
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
<!--<script type="text/javascript" src="./uploadify/swfobject.js"></script>
<script type="text/javascript" src="./uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" src="./js/jquery.autogrowtextarea.js"></script>
--><!--<script type="text/javascript" src="./js/form_elements.js"></script>
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
<script type="text/javascript" src="./js/highlight.js"></script>-->
<script type="text/javascript" src="./js/main.js"> </script>
<meta charset="UTF-8"></head>

<body>
<!--Container-->
<div id="dreamworks_container">
    <!--Primary Navigation Start -->
    <?php //$flage = 3; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
    <!--Secondary Navigation-->
    	<?php include_once("secondary_nav_exam.php"); // Show Exam Questions In Left Side ?>
    <!--Content Wrap-->
    
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){
	   		//include("action-new-member.php");
		}else{ 


	 $LoadOp = mysql_query("SELECT * FROM  `mc_so` 
							WHERE  `qid` =  '$QustaionID' AND (`flag` = '1' OR `flag` ='3') ORDER BY `qid` ASC ");
					   
  /// next Questions
	  $next   = mysql_query("SELECT * FROM `container` WHERE `qid` > '$QustaionID' and `eid` = '$examID9' ORDER BY `qid` ASC LIMIT 1");
	  $nextR  = mysql_fetch_array($next);
  /// prev Questions
	  $prev   = mysql_query("SELECT * FROM `container` WHERE `qid` < '$QustaionID' and `eid` = '$examID9' ORDER BY `qid` DESC LIMIT 1 ");
	  $prevR  = mysql_fetch_array($prev); 
	  
	  
	  	
 include("activity_due_exam.php");  ?>

  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">

 <div style="padding-right:20px;">
 
   <a style="margin:5px;" class="bluishBtn button_small fl_left" href="view-exam.php?q=<?php echo $nextR["qid"];?>&es=<?php echo $examID9; ?>"><span style="color:#FFFFFF;">First Question</span></a>
   
   <a style="margin:5px;" class="yellowBtn button_small fl_left" href="view-exam.php?q=<?php echo $nextR["qid"];?>&es=<?php echo $examID9; ?>"><span style="color:#FFFFFF;">Next Question</span></a>
   
   <a style="margin:5px;" class="yellowBtn button_small fl_left" href="view-exam.php?q=<?php echo $nextR["qid"];?>&es=<?php echo $examID9; ?>"><span style="color:#FFFFFF;">Previous Question </span></a>
   
   
   
<a style="margin:5px;" class="yellowBtn button_small fl_left" href="view-exam.php?q=<?php echo $nextR["qid"];?>&es=<?php echo $examID9; ?>"><span style="color:#FFFFFF;">Flag This Questions</span></a>

<?php 	  
  if(empty($nextR["qid"])){ ?>
	  <input name="Update" type="submit" value="Answer This Questions" class="button_small greenishBtn fl_right" style="margin-right:20px;"><?php  }else{ ?>
        <div style="padding-right:20px; float:right;">
           <a class="greenishBtn button_small fl_left" href="view-exam.php?q=<?php echo $nextR["qid"];?>&es=<?php echo $examID9; ?>">
           <span style="color:#FFFFFF;">Next Questions</span></a>
        </div>
        
 <?php } ?>


   <a style="margin:5px;" class="bluishBtn button_small fl_right" href="view-exam.php?q=<?php echo $nextR["qid"];?>&es=<?php echo $examID9; ?>"><span style="color:#FFFFFF;">Last Question</span></a>

        </div>
        
<!--One_Wrap-->
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
        	<h5><?php echo $TITLE; ?> - ECCP</h5>
        	</div>
            <div class="widget_body">
            	<!--Activity Table-->
                
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr align="left">
                      <th colspan="2" align="left">
					   <?php echo html_entity_decode($TheQustaion);  // Show The Qusetions ?>
                      </th>
                      </tr>
   <?php // load the options
   //  $Step01 = mysql_query("SELECT * FROM `container` WHERE `eid` = $examID9 ORDER BY `ID` ASC LIMIT 0 , 1 ");
   //  $Step02 = mysql_fetch_array($Step01);	  
		while($Reloaded = mysql_fetch_array($LoadOp)){ ?>
                            <tr>
                              <th><label style="float:left; margin-left:15px;"><?php echo $Reloaded["option"]; ?></label></th>
                              <th width="11%" align="center" valign="middle">
                              	<label style="float:left; margin-left:40%;">
                                 <?php // while(){ ?>
                              		<input type="radio" name="radioselect" id="radioselect" value="<?php echo $Reloaded["ID"]; ?>">
									<?php //} ?>
                               	</label>                               </th>
                            </tr>
                       <?php }   ?>
                       
<tr>
 <th colspan="2">       
 


<br/><br/><br/>


</th>
</tr>
  </table>

            </div>
        </div>
    </div> 
    
     </form>
    <?php } ?>         
      
      </div>
   </section>
 </div>

</body>
</html>
<?php
 		}// here the add action was success
  } // if not add in db UID, ExamID, Time
}else{
	include("assay.php");
}
?>