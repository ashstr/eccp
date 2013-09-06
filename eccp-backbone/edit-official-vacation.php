<?php
 require("Library/config.php");
 	if( !empty($_SESSION["user_admin"]) ){
	 	  if(checkadmin($_SESSION["user_admin"],"allow_new_course")){ ?>
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
<!--
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
	   		include("action-update-official-vacation.php");
		}else{  ?>
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">

<?php 
  if(isset($_GET["valve"]) && !empty($_GET["valve"]) ){
	  $userid = intval($_GET["valve"]);
		$GetlastUID  = mysql_query("SELECT * FROM `official_vacation` where `ID`='$userid' LIMIT 0 , 1");
			if(mysql_num_rows($GetlastUID)>0){
		 $GetlastUID2 = mysql_fetch_array($GetlastUID);		
				}else{
					echo "<script>alert('This User Not In Our System Error-X108');</script>";
					echo "<meta http-equiv='refresh' content='0;url=vacation-archive.php'>";
					echo "<script>location.href='vacation-archive.php'</script>";
				  }// else not find in our recored
			}else{ // if not set or empty
				echo "<script>alert('This System Error-X403-SERVER Unix');</script>";
				echo "<meta http-equiv='refresh' content='0;url=vacation-archive.php'>";
				echo "<script>location.href='vacation-archive.php'</script>";
			} ?>
            
    
  <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>Official Vacation</h5>
        </div>
  <div class="widget_body">
            	<!--Activity Table-->
    <ul class="form_fields_container">
      <li>
       <label>Vacation Title</label>
        <div class="form_input">
            <input id="vacatit" name="vacatit" class="tip_east" type="text" value="<?php echo $GetlastUID2["title"]; ?>" title="Make Sure to Enter Valid Entry">
        </div>
      </li>
      
      <li>
       <label>Vacation Description</label>
        <div class="form_input">
            <input id="vacades" name="vacades" class="tip_east" type="text" value="<?php echo $GetlastUID2["dic"]; ?>" title="Make Sure to Enter Valid Entry">
        </div>
      </li>
      
      <li>
       <label>Vacation Date</label>
        <div class="form_input">
            <input id="vacadate" name="vacadate" class="tip_east" type="text" value="<?php echo $GetlastUID2["date"]; ?>" title="Make Sure to Enter Valid Entry">
        </div>
      </li>
       
    
     </ul>
				
                


<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Update This Record Now" class="button_small whitishBtn">
     	<input type="hidden" name="action" value="update">
     	<input type="hidden" name="values" value="<?php echo $userid; ?>">
    <!--<a class="button_small whitishBtn" href=""><span class="iconsweet">l</span>Export Table</a>-->
   </div>
  </div>

    
    
     </div><!-- End of widget _body Div -->
 </div>



 
 
  
   </form>
 </div> 
    
    
    
    



    <?php } ?>         
      
      </div>
<!--   </section>
 </div>-->

</body>
</html>
<?php
 }else{ // unauthorized test
 	require("unauthorized.php");	
	}
	
 }else{
 	include("assay.php");
 } ?>