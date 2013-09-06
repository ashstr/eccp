<?php include_once("Library/config.php"); 
	 if( !empty($_SESSION["user_admin"]) ){
 	  if(checkadmin($_SESSION["user_admin"],"allow_authority")){
	    require("Library/cleanIt.php"); ?>
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
    <?php $flage = 6; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
	<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
	<?php include_once("secondary_nav_tools.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){
	 $CID    = $_REQUEST["ID"];
	 $name   = cleanIt($_POST["fn"],'ALL');
	 $pass   = cleanIt($_POST["pass"],'NO_HTML');
	 $email  = cleanIt($_POST["email"],'NO_HTML');
	 $bdate  = cleanIt($_POST["datepicker"],'NO_HTML');
	 $mobile = cleanIt($_POST["mobile"],'ALL');
	 $relig  = cleanIt($_POST["relig"],'ALL');
	 $nati   = cleanIt($_POST["nati"],'ALL');
	 
	  $GetData  = mysql_query("UPDATE `admin` SET `username` = '$name', `password` = '$pass', `email` = '$email', `birthd` = '$bdate', `mobile` = '$mobile', `religion` = '$relig', `nationality` = '$nati' WHERE `ID` = $CID");
	  if($GetData){
	  	echo "<script>alert('Congratulation, This Process Done With Success');</script>";  ?>
				<script>location.href= "admin-archive.php";</script>
				<?php }else{
	  	echo "<script>alert('Sorry, This Process Was fail');</script>";  ?>
				<script>location.href= history.back();</script>
			<?php 	}

		
		
		
		
		}else{ ?>
        
        
        
        
        
        
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">
<?php 
 $CID = intval($_GET["valve"]);
	$GetlastUID  = mysql_query("SELECT * FROM `admin` where `ID` = $CID");
	$Vdata = mysql_fetch_array($GetlastUID); ?>    
  <div class="widget">
      <div class="widget_title"><span class="iconsweet">f</span>
        <h5>Edit Admin Data Profile</h5>
     </div>
  <div class="widget_body">

<ul class="form_fields_container">
  
  
    <li>
   <label>Personal Picture</label>
   	<div class="form_input"><img src="uploaded/mem-profile/<?php echo $Vdata["pacth"]; ?>"> </div>
  </li>
  
  
  
    <li>
   <label>User ID</label>
   	<div class="form_input">
    	<input id="uid"  name="uid" class="tip_east" type="text" value="<?php print $Vdata["UID"]; ?>" title="<?php print $Vdata["UID"]; ?>" readonly>
    </div>
  </li>
    
    <li>
   <label>Full Name</label>
   	<div class="form_input">
    	<input id="fn" name="fn" class="tip_east" type="text" value="<?php print $Vdata["username"]; ?>" title="<?php print $Vdata["username"]; ?>">
    </div>
  </li>
  
  
  <li><label>Birthday </label>
	<div class="form_input">
    <input id="datepicker" name="datepicker" style="width:20%" type="text" value="<?php print $Vdata["birthd"]; ?>" title="<?php print $Vdata["birthd"]; ?>" readonly> 
    (dd-mm-yyyy)</div></li>  
  

  <li>
   <label>Nationality</label>
   	<div class="form_input">
    	<input id="nati" name="nati" class="tip_east" type="text" value="<?php print $Vdata["nationality"]; ?>" title="<?php print $Vdata["nationality"]; ?>">
    </div>
  </li>
  
  
<li>
   <label>Religion</label>
   	<div class="form_input">
    	<input id="relig" name="relig" class="tip_east" type="text" value="<?php print $Vdata["religion"]; ?>" title="<?php print $Vdata["religion"]; ?>">
    </div>
  </li>
  
  

  <li>
   <label>Mobile</label>
   	<div class="form_input">
    	<input id="mobile" name="mobile" class="tip_east" type="text" value="<?php print $Vdata["mobile"]; ?>" title="<?php print $Vdata["mobile"]; ?>">
    </div>
  </li>
  

  <li>
   <label>Email</label>
   	<div class="form_input">
    	<input id="email" name="email" class="tip_east" type="text" value="<?php print $Vdata["email"]; ?>" title="<?php print $Vdata["email"]; ?>">
    </div>
  </li>
  
  
  
  <li>
   <label>Password</label>
   	<div class="form_input">
    	<input id="pass" name="pass" class="tip_east" type="password" value="<?php print $Vdata["password"]; ?>" title="">
    </div>
  </li>     


  


 </ul>
   	   <?php } ?> 				

<div class="widget_body">
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Update Class Name" class="button_small whitishBtn">
     	<input type="hidden" name="action" value="update">
     	<input type="hidden" name="ID" value="<?php echo $Vdata["ID"]; ?>">
   </div>
  </div>
  
     </div>
 </div>
 </div>
   </form>
   
      </div>

</body>
</html>
<?php
		}else{ // unauthorized test
 				require("unauthorized.php");	
			}
  }else{
 	require("assay.php");
 } ?>