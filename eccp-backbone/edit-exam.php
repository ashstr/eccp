<?php include_once("Library/config.php"); 
 	  if( !empty($_SESSION["user_admin"]) ){
	    include("Library/cleanIt.php"); ?>
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
<link rel="stylesheet" href="./css/tipsy.css" /><!--
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
    <?php $flage = 5; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
	<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
	<?php include_once("secondary_nav_question.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){
	 $CID    = $_REQUEST["ID"];
	 $title  = cleanIt($_POST["title"],'ALL');
	 $time   = cleanIt($_POST["time"],'ALL');
	 $class  = cleanIt($_POST["class"],'ALL');
	 
	  $GetData  = mysql_query("UPDATE `exam` SET `title` = '$title', `exam_period` = '$time' , `to` = '$class' WHERE `ID` = $CID");
	  if($GetData){
	  	echo "<script>alert('Congratulation, This Process Done With Success');</script>";  ?>
				<script>location.href= "exam-archive.php";</script>
				<?php }else{
	  	echo "<script>alert('Sorry, This Process Was fail');</script>";  ?>
				<script>location.href= "exam-archive.php";</script>
			<?php 	}

		}else{ ?>
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">
<?php 
 $CID = intval($_GET["T"]);
	$GetlastUID  = mysql_query("SELECT * FROM `exam` where `ID` = $CID");
	$Vdata = mysql_fetch_array($GetlastUID); ?>    
  <div class="widget">
      <div class="widget_title"><span class="iconsweet">f</span>
        <h5>Edit This Exam Details</h5>
     </div>
  <div class="widget_body">

<ul class="form_fields_container">
  <li>
   <label>Exam Title</label>
   	<div class="form_input">
    	<input id="title" name="title" class="tip_east" type="text" value="<?php echo $Vdata["title"]; ?>" title="Make Sure to enter valid entry">
    </div>
  </li>


  <li>
   <label>Set Class</label>
   	<div class="form_input">
    	<select name="class" id="class">
         <?php $co01 = mysql_query("SELECT * FROM  `groups` ");
		 	while($co02 = mysql_fetch_array($co01)){ ?>
        	 <option value="<?php echo $co02["ID"]; ?>" <?php if($co02["ID"] == $Vdata["to"]){ echo "selected"; } ?> ><?php echo $co02["title"]; ?></option>
         <?php } ?>
        </select>
    </div>
  </li>
  


  <li>
   <label>Exam Time</label>
   	<div class="form_input">
    	<select name="time" id="time">
        	<option value="30"    <?php if( $Vdata["exam_period"] == "30"){ echo "selected"; } ?>> 30 Minutes</option>
        	<option value="45"    <?php if( $Vdata["exam_period"] == "45"){ echo "selected"; } ?>> 45 Minutes</option>
        	<option value="60"    <?php if( $Vdata["exam_period"] == "60"){ echo "selected"; } ?>> 1 Hours</option>
        	<option value="90"    <?php if( $Vdata["exam_period"] == "90"){ echo "selected"; } ?>> 1.5 Hours</option>
        	<option value="120"   <?php if( $Vdata["exam_period"] == "120"){ echo "selected"; } ?>> 2 Hours</option>
        	<option value="150"   <?php if( $Vdata["exam_period"] == "150"){ echo "selected"; } ?>> 2.5 Hours</option>
        	<option value="180"   <?php if( $Vdata["exam_period"] == "180"){ echo "selected"; } ?>> 3 Hours</option>
        	<option value="360"   <?php if( $Vdata["exam_period"] == "360"){ echo "selected"; } ?>> 6 Hours</option>
        	<option value="720"   <?php if( $Vdata["exam_period"] == "720"){ echo "selected"; } ?>> 12 Hours</option>
        	<option value="1440"  <?php if( $Vdata["exam_period"] == "1440"){ echo "selected"; } ?>> 24 Hours</option>
        	<option value="2880"  <?php if( $Vdata["exam_period"] == "2880"){ echo "selected"; } ?>> 48 Hours</option>
        	<option value="4320"  <?php if( $Vdata["exam_period"] == "4320"){ echo "selected"; } ?>> 72 Hours</option>
        </select>
    </div>
  </li>

 </ul>
				

<div class="widget_body">
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Update Class Name" class="button_small whitishBtn">
     	<input type="hidden" name="action" value="update">
     	<input type="hidden" name="ID" value="<?php echo $Vdata["ID"]; ?>">
   </div>
  </div>
  
     </div>
 </div>
   </form>
 </div>
      </div>

</body>
</html>
<?php
   }
  }else{
 	include("assay.php");
   } ?>