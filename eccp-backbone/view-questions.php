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
    <?php $flage = 5; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php include_once("secondary_nav_question.php"); ?>









<!--Content Wrap-->
<div id="content_wrap">

<?php
  if(isset($_GET["qid"]) && !empty($_GET["qid"]) ){ ?>
<!--One_Wrap-->
 <div class="one_wrap">
  <form name="team" id="team" class="" action="<?php echo $_SERVER['PHP_SELF']; ?>?QUE=<?php echo $_GET["qid"]; ?>" method="post" enctype="multipart/form-data">
<?php
  if(isset($_GET["ex"]) && !empty($_GET["ex"])){
   $qID = intval($_GET["ex"]);
   
   $selects  = mysql_query("SELECT * FROM `questions` WHERE `ID` = '$qID' ");
   $MP5 =  mysql_fetch_array($selects);
   
   $GetRightAnswer   = mysql_query("SELECT * FROM `mc_so` WHERE `qid` = '$qID' AND `flag` LIKE '3' LIMIT 0 , 1");
   $fetchRightAnswer = mysql_fetch_array($GetRightAnswer);
     }else{ ?>
	 	<script>location.href= "fill-question.php";</script>
	 <?php  }  ?>

     <div class="widget">
        	<div class="widget_title"><span class="iconsweet">8</span>
              <h5>View Your Question</h5>
            </div>
            <div class="widget_body">
            	<!--Activity Table-->
                
                
                
                



<ul class="form_fields_container">
  <li>
   <label>Author ID</label>
     <div class="form_input">
    	<input id="author" name="author" class="in_submitted" type="text" value="<?php echo $MP5["author"]; ?>" title="" readonly="readonly">
     </div>
  </li>                    



  
   <li>
         <label><center>The Question :</center></label>

 <div style="margin:10px 20px 10px 10px;"><?php echo html_entity_decode($MP5["ques"]); ?> </div>
</li>

  <li>
   <label>Right Answer</label>
     <div class="form_input">
    	<input id="correct" name="correct" class="in_submitted" type="text" value="<?php echo $fetchRightAnswer["option"]; ?>" title="" disabled>
     </div>
  </li>                                        
 
  <li>
     	 <div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">C</span><h5>Answer Assurance</h5></div>
            <div class="widget_body">
                <div id="container">
                	<textarea  id="wyswig" name="input"></textarea>
                </div>
            </div>
        </div>
    </div>
  </li>                    

 
<?php

   $GetWrongAnswer   = mysql_query("SELECT * FROM `mc_so` WHERE `qid` = '$qID' AND `flag` = '1'");
   $Numes = mysql_num_rows($GetWrongAnswer);
  
   
   $NumVal = $Numes;
  
   while($MP5 = mysql_fetch_array($GetWrongAnswer)){ ?> 
      <li>
       <label>Choices <?php echo $initiator; ?></label>
        <div class="form_input">
            <input id="op<?php echo $initiator; ?>" name="op<?php echo $initiator; ?>" class="in_error"  type="text" value="<?php echo $MP5["option"]; ?> " title="" disabled>
        </div>
      </li>
     <?php } 
	 
	 
	 ?> 

  
  <li>
   <label>Tips & Help</label>
     <div class="form_input">
<?php

   $GetTips   = mysql_query("SELECT * FROM `mc_so` WHERE `qid` = '$qID' AND `flag` = '2'");
   //echo mysql_num_rows($GetTips);
   $GetTipsF = mysql_fetch_array($GetTips);  ?>     
   
  <textarea name="tips" id="tips" cols="10" rows="5"  class="tip_east"><?php echo $GetTipsF["option"]; ?></textarea>
     </div>
  </li>                    

          </ul>








 <!--Summit Table-->   

          </div><!-- End of widget _body Div -->
        </div>
     </form>
    </div> <!--<div class="widget">-->
    <?php } ?>         
<!--</div>
</section>
</div>
-->
</body>
</html>
 <?php }else{
		@session_start();
		@session_destroy();

		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		echo "<script>location.href='login.php'</script>";
  } ?>
