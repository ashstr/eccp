<?php
include_once ("Library/config.php");
/******************************** Validation Action 1 **************************************
	Chack if user was login really or not & if the exam id was send and not empty          */	
	
	
 if( !empty($_SESSION["UID"]) ){	  
	 
	$NovaUIDValus = $_SESSION["UID"]; 	 // This User ID
	$examID9      = intval($_GET["es"]);  // Exam ID
	$_SESSION["eid"]=$examID9;
	 
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
// check which button have been pressed
if ( isset( $_GET["flag"] ) && !empty( $_GET["flag"] ) ){
	$flag=intval($_GET["flag"]);
}

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
	$c=0;
	$quesnumber;
	if($insertFlag){
		// save answer in DB
		// echo "INSERT INTO QandA VALUES ('".$_SESSION['UID']."',".$examID9.",".$_SESSION['prevQuesID'].",".$_POST['radioselect'].")";
		$ansCheck = mysql_query("SELECT * FROM QandA WHERE UID='".$_SESSION['UID']."' AND ExID=$examID9 AND QID=".$_SESSION['prevQuesID']);
		if (!mysql_num_rows($ansCheck)){
			mysql_query("INSERT INTO QandA VALUES ('".$_SESSION['UID']."',".$examID9.",".$_SESSION['prevQuesID'].",".$_POST['radioselect'].")");
		}
		else {
			mysql_query("UPDATE QandA set AID=".$_POST['radioselect']." WHERE UID='".$_SESSION['UID']."' AND ExID=$examID9 AND QID=".$_SESSION['prevQuesID']);
		}
 	   /******************************* Load Qustaion  *********************************/
 	   if (!isset($_SESSION['qarray'])){
 	   	echo "hello";
	   $GetQTitle   = mysql_query("SELECT qid FROM  questions,container WHERE container.qid=questions.id AND container.eid=$QustaionID");
	   $_SESSION['arsize']=mysql_num_rows($GetQTitle);
	   $_SESSION['counter']=0;
	   while($row = mysql_fetch_array($GetQTitle))
		  {
		  $_SESSION['qarray'][$c]=$row['qid'];
		  //echo $_SESSION['qarray'][$c]."<br>";
		  $c++;
		  echo $c;
		  }
		$_SESSION['pres']=$c-1; // to save the number of the rows, it keeps giving out errors !!
	   }
	   
	    if (isset($_REQUEST['firstBtn'])){
		$_SESSION['counter']=0;
		$temp2=$_SESSION['qarray'][$_SESSION['counter']];
		$_SESSION['prevQuesID']=$temp2;
	    $getQu=mysql_query("SELECT * FROM questions Where id=$temp2 ");
	    $GetQTitleR  = mysql_fetch_array($getQu);
	    $TheQuestion = $GetQTitleR["ques"];
		$quesnumber=1;
		$_SESSION['counter']++; // to advance to next question instead of showing it twice
	}
	
	if (isset($_REQUEST['nextBtn'])){
		if ($_SESSION['prevQuesID']==$_SESSION['qarray'][$_SESSION['counter']]&&$_SESSION['counter']+1<$_SESSION['arsize'])
			$_SESSION['counter']++;
		if ($_SESSION['counter']==$_SESSION['arsize'])
			$_SESSION['counter']=0;
			echo $_SESSION['counter']."   ".$_SESSION['arsize'];
	   if ($_SESSION['counter']<$_SESSION['arsize']){
	   $temp2=$_SESSION['qarray'][$_SESSION['counter']];
	   	$_SESSION['prevQuesID']=$temp2;
	   $getQu=mysql_query("SELECT * FROM questions Where id=$temp2 ");
	   $GetQTitleR  = mysql_fetch_array($getQu);
	   $TheQuestion = $GetQTitleR["ques"];
	   $_SESSION['counter']=$_SESSION['counter']+1;
	   	$quesnumber=$_SESSION['counter'];
	   }
	   if ($_SESSION['counter']==$_SESSION['arsize']){
		$_SESSION['counter']=0; // go back to the first question after reaching the last one!
	   	// require("unauthorizedexam.php");
		// die();
	   }
	}
	if (isset($_REQUEST['prvBtn'])){
		$_SESSION['counter']--;
		if ($_SESSION['prevQuesID']==$_SESSION['qarray'][$_SESSION['counter']])
			$_SESSION['counter']--;
		if ($_SESSION['counter']<0){
			$temp2=$_SESSION['qarray'][$_SESSION['pres']];
			$_SESSION['counter']=$_SESSION['pres'];
		}
		else {
			$temp2=$_SESSION['qarray'][$_SESSION['counter']];
		}
		$quesnumber=$_SESSION['counter']+1;
		$_SESSION['prevQuesID']=$temp2;
	    $getQu=mysql_query("SELECT * FROM questions Where id=$temp2 ");
	    $GetQTitleR  = mysql_fetch_array($getQu);
	    $TheQuestion = $GetQTitleR["ques"];
		//$_SESSION['counter']++; // to advance to next question instead of showing it twice
	}
	if (isset($_REQUEST['goTo'])){
		if (intval($_POST['QuesNum'])>count($_SESSION['qarray'])){
			echo "<script> alert('Out of range, please enter a valid question number'); </script>";
		}
		else{
			$_SESSION['counter']=intval($_POST['QuesNum'])-1;
		}
		// $arlength=count($_SESSION['qarray']);
		// echo $_SESSION['counter'];
		// for ($i=0;$i<$arlength;$i++){
			// echo $_SESSION['qarray'][$i]."<br>";
		// }
			   	$quesnumber=$_SESSION['counter']+1;
		$temp2=$_SESSION['qarray'][$_SESSION['counter']];
		$_SESSION['prevQuesID']=$temp2;
	    $getQu=mysql_query("SELECT * FROM questions Where id=$temp2 ");
	    $GetQTitleR  = mysql_fetch_array($getQu);
	    $TheQuestion = $GetQTitleR["ques"];
	}
	if (isset($_REQUEST['flag'])){
		$check=mysql_query("SELECT * FROM flag WHERE UID='".$_SESSION['UID']."' AND qid=".$_SESSION['prevQuesID']);
		if (mysql_num_rows($check)){
			mysql_query("DELETE FROM flag WHERE UID='".$_SESSION['UID']."' AND qid=".$_SESSION['prevQuesID']);
		}
		else {
			mysql_query("INSERT INTO flag values ('".$_SESSION['UID']."',".$_SESSION['prevQuesID'].")");
		}
	}
	if (!(isset($_REQUEST['firstBtn'])||isset($_REQUEST['nextBtn'])||isset($_REQUEST['prvBtn'])||isset($_REQUEST['goTo'])||isset($_REQUEST['flag'])
	||isset($_REQUEST['prevFlag'])||isset($_REQUEST['nextFlag']))){
		$temp2=$_SESSION['qarray'][0];
		$_SESSION['prevQuesID']=$temp2;
	    $getQu=mysql_query("SELECT * FROM questions Where id=$temp2 ");
	    $GetQTitleR  = mysql_fetch_array($getQu);
	    $TheQuestion = $GetQTitleR["ques"];
		//$_SESSION['counter']++;
		$quesnumber=1; 
	}
	   ?>
       
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
							WHERE  `qid` =  '$temp2' AND (`flag` = '1' OR `flag` ='3') ORDER BY  RAND( ) LIMIT 6 ");
							// I HAVE NO IDEA WHAT DOES FLAG DO -- ZAHRAN
							// added order by rand() to randomize the choices every time -- ZAHRAN
					   
  /// next Questions
	  $next   = mysql_query("SELECT * FROM `container` WHERE `qid` > '$QustaionID' and `eid` = '$examID9' ORDER BY `qid` ASC LIMIT 1");
	  $nextR  = mysql_fetch_array($next);
  /// prev Questions
	  $prev   = mysql_query("SELECT * FROM `container` WHERE `qid` < '$QustaionID' and `eid` = '$examID9' ORDER BY `qid` DESC LIMIT 1 ");
	  $prevR  = mysql_fetch_array($prev); 
	  
	  
	  	
 include("activity_due_exam.php");  ?>

  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">

 <div style="padding-right:20px;">
 
  
   	<input type="submit" class="bluishBtn button_small fl_left" style="margin:5px;color:#FFFFFF;" value="First Question" name="firstBtn"/>
   <input type="submit" class="yellowBtn button_small fl_left" style="margin:5px;color:#FFFFFF;" value="Next Question" name="nextBtn"/>
   <input type="submit" class="yellowBtn button_small fl_left" style="margin:5px;color:#FFFFFF;" value="Previous Question" name="prvBtn"/>
   <input type="text" class="yellowBtn button_small fl_left" style="margin:5px;color:#FFFFFF;" name="QuesNum" />
	<input type="submit" class="yellowBtn button_small fl_left" style="margin:5px;color:#FFFFFF;" value="Go" name="goTo"/>
	<input type="submit" class="yellowBtn button_small fl_left" style="margin:5px;color:#FFFFFF;" value="Previous Flagged Question" name="prevFlag"/>
   <input type="submit" class="yellowBtn button_small fl_left" style="margin:5px;color:#FFFFFF;" value="Flag This Question" name="flag"/>
   <input type="submit" class="yellowBtn button_small fl_left" style="margin:5px;color:#FFFFFF;" value="Next Flagged Question" name="nextFlag"/>
   
   <!-- // added flag to the url to identify which button have been pressed 
   // 0 for first
   // 1 for next
   // 2 for previous
   // ZAHARAN -->
   
   
   
<?php 	  
  if(empty($nextR["qid"])){ ?>
	  <input name="Update" type="submit" value="Answer This Questions" class="button_small greenishBtn fl_right" style="margin-right:20px;"
        <div style="padding-right:20px; float:right;">
           <a class="greenishBtn button_small fl_left" href="view-exam.php?q=<?php echo $nextR["qid"];?>&es=<?php echo $examID9; ?>">
           <span style="color:#FFFFFF;">Next Questions</span></a>
        </div>>
        
 <?php } ?>


   <a style="margin:5px;" class="bluishBtn button_small fl_right" href="view-exam.php?q=<?php echo $nextR["qid"];?>&es=<?php echo $examID9; ?>"><span style="color:#FFFFFF;">Last Question</span></a>

        </div>
        
<!--One_Wrap-->
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
        	<h5><?php echo $TITLE; ?> - ECCP - Question <?php echo $quesnumber ?></h5>
        	<!--// ADDED BY ZAHRAN
        	// TRACK QUESTION NUMBER --> 
        	</div>
            <div class="widget_body">
            	<!--Activity Table-->
                
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr align="left">
                      <th colspan="2" align="left">
					   <?php echo html_entity_decode($TheQuestion);  // Show The Qusetion ?>
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