<?php
 require("Library/config.php");
 	if( !empty($_SESSION["user_admin"]) ){
 	    require("Library/RPC.php"); 
	 	  if(checkadmin($_SESSION["user_admin"],"allow_authority")){ ?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php echo $site_title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">

<!--Stylesheets-->
<?php  require("full_css.php"); ?>
<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<?php  require("full_js.php"); ?>
<!--Javascript-->
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
	 $CID    			 = $_REQUEST["ID"];
	 $allow_main_data     = $_POST["allow_main_data"];
	 $allow_admin_manage  = cleanIt($_POST["allow_admin_manage"],'ALL');
	 $allow_new_course    = cleanIt($_POST["allow_new_course"],'NO_HTML');
	 $allow_add_exam  	= cleanIt($_POST["allow_add_exam"],'NO_HTML');
	 
	  $GetData  = mysql_query("UPDATE `admin` SET
	  `allow_main_data` = '$allow_main_data',
	  `allow_admin_manage` = '$allow_admin_manage',
	  `allow_new_course` = '$allow_new_course',
	  `allow_add_exam` = '$allow_add_exam'
	  WHERE `ID` = $CID");
	  if($GetData){
	  	echo "<script>alert('Congratulation, This Process Done With Success');</script>";  ?>
				<script>location.href= "update-authority.php";</script>
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
   	<label>User ID</label>
        <div class="form_input">
            <input id="uid"  name="uid" class="tip_east" type="text" value="<?php print $Vdata["UID"]; ?>" title="<?php print $Vdata["UID"]; ?>" readonly>
        </div>
    </li>


    <li>
     <label>Main Site</label>
      <div class="form_input">
      	<input type="checkbox" id="allow_main_data"  name="allow_main_data" <?php if($Vdata["allow_main_data"]=="YES"){ echo "checked"; } ?> value="YES">
      	<label for="allow_main_data">Edit Main Site Information</label>
      </div>
    </li>
    
    <li>
     <label>Allow Admin Manage</label>
      <div class="form_input">
      	<input type="checkbox" id="allow_admin_manage" name="allow_admin_manage" <?php if($Vdata["allow_admin_manage"]=="YES"){ echo "checked"; } ?> value="YES">
        	<label for="check1">Allow Full Admin Management Add / Delete / Edit</label>
      </div>
    </li>
    
    
    
    <li>
     <label>Allow Course</label>
      <div class="form_input">
      	<input type="checkbox" id="allow_new_course" name="allow_new_course" <?php if($Vdata["allow_new_course"]=="YES"){ echo "checked"; } ?> value="YES">
        	<label for="add_exam">Allow To Add New Course</label>
      </div>
    </li>


    
    <li>
     <label>Allow Exam</label>
      <div class="form_input">
      	<input type="checkbox" id="allow_add_exam" name="allow_add_exam" <?php if($Vdata["allow_add_exam"]=="YES"){ echo "checked"; } ?> value="YES">
        	<label for="add_exam">Allow Add New Exam</label>
      </div>
    </li>

 </ul>
   	   <?php } ?> 				

<div class="widget_body">
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Update Admin Authority" class="button_small whitishBtn">
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
 	include("assay.php");
 } ?>