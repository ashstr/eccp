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
    <?php $flage = 6; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
	<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
	<?php include_once("secondary_nav_tools.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){
	 $CID   = $_REQUEST["ID"];
	 $class = cleanIt($_POST["class"],'ALL');
	 $case  = cleanIt($_POST["case"],'ALL');
	 
	  $GetData  = mysql_query("UPDATE `groups` SET `title` = '$class', `active` = '$case' WHERE `ID` = $CID");
	  if($GetData){
	  	echo "<script>alert('Congratulation, This Process Done With Success');</script>";  ?>
				<script>location.href= "class-archive.php";</script>
				<?php }else{
	  	echo "<script>alert('Sorry, This Process Was fail');</script>";  ?>
				<script>location.href= history.back();</script>
			<?php 	}

		}else{ ?>
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">
<?php 
 $CID = intval($_GET["ClassID"]);
	$GetlastUID  = mysql_query("SELECT * FROM `groups` where `ID` = $CID");
	$Vdata = mysql_fetch_array($GetlastUID); ?>    
  <div class="widget">
      <div class="widget_title"><span class="iconsweet">f</span>
        <h5>New Class</h5>
     </div>
  <div class="widget_body">

<ul class="form_fields_container">
  <li>
   <label>Class Title</label>
   	<div class="form_input">
    	<input id="class" name="class" class="tip_east" type="text" value="<?php echo $Vdata["title"]; ?>" title="Make Sure to enter valid entry">
    </div>
   </li>
   
<li>
   <label>Class Status</label>
    <div class="form_input">
     <select name="case">
     	<option value="YES" <?php if( $Vdata["active"] == "YES"){ echo "selected"; } ?>>Active</option>
     	<option value="NO"  <?php if( $Vdata["active"] == "NO" ){ echo "selected"; } ?>>Suspended</option>
   	   <?php } ?>         
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
<?php }else{
 	include("assay.php");
 } ?>