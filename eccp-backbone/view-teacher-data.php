<?php include_once("Library/config.php");
		if( !empty($_SESSION["user_admin"]) ){
			if(checkadmin($_SESSION["user_admin"],"allow_add_exam")){  ?>

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
	
<?php 
  if(isset($_GET["valve"]) && !empty($_GET["valve"]) ){
	  $userid = intval($_GET["valve"]);
		$GetlastUID  = mysql_query("SELECT * FROM `teacher` where `ID`='$userid' ORDER BY `teacher`.`ID` DESC  LIMIT 0 , 1");
			if(mysql_num_rows($GetlastUID)>0){
		 $GetlastUID2 = mysql_fetch_array($GetlastUID);		
				}else{
					echo "<script>alert('This User Not In Our System Error-X108');</script>";
					echo "<meta http-equiv='refresh' content='0;url=index.php'>";
					echo "<script>location.href='index.php'</script>";
				  }// else not find in our recored
			}else{ // if not set or empty
				echo "<script>alert('This System Error-X403-SERVER LUNIX-RED ');</script>";
				echo "<meta http-equiv='refresh' content='0;url=index.php'>";
				echo "<script>location.href='index.php'</script>";
			} ?>

        
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">
    
         <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>View Instructor  Profile</h5>
           </div>
        <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">
  <li>
   <label>Personal Picture</label>
   	<div class="form_input"><img src="uploaded/mem-profile/<?=$GetlastUID2["path"]; ?>"> </div>
  </li>
  
  <li>
   <label>Instructor ID</label>
   	<div class="form_input">
    	<input id="UID" name="UID" class="tip_east" type="text" value="<?php print $GetlastUID2["UID"]; ?>" title="<?php print $GetlastUID2["name"]; ?>" style="border:hidden; background-color:#FFF;" readonly>
    </div>
  </li>
  

  <li>
   <label>Full Name</label>
   	<div class="form_input">
    	<input id="fn" name="fn" class="tip_east" type="text" value="<?php print $GetlastUID2["name"]; ?>" title="<?php print $GetlastUID2["name"]; ?>" style="border:hidden; background-color:#FFF;" readonly>
    </div>
  </li>
  

<li><label>Birthday </label>
	<div class="form_input"><input style="border:hidden; background-color:#FFF; width:20%" type="text" value="<?php print $GetlastUID2["Birthd"]; ?>" title="<?php print $GetlastUID2["Birthd"]; ?>" readonly></div></li>  </li>
  

  <li>
   <label>Nationality</label>
   	<div class="form_input">
    	<input id="nati" name="nati" class="tip_east" type="text" value="<?php print $GetlastUID2["nati"]; ?>" title="<?php print $GetlastUID2["nati"]; ?>"   style="border:hidden; background-color:#FFF;" readonly>
    </div>
  </li>
  

  <li>
   <label>Religion</label>
   	<div class="form_input">
    	<input id="relig" name="relig" class="tip_east" type="text" value="<?php print $GetlastUID2["relig"]; ?>" title="<?php print $GetlastUID2["relig"]; ?>"   style="border:hidden; background-color:#FFF;" readonly>
    </div>
  </li>
  
  

  <li>
   <label>University</label>
   	<div class="form_input">
    	<input id="univ" name="univ" class="tip_east" type="text" value="<?php print $GetlastUID2["univ"]; ?>" title="<?php print $GetlastUID2["relig"]; ?>"  style="border:hidden; background-color:#FFF;"  readonly>
    </div>
  </li>
  
  <li>
   <label>Graduation Year</label>
   	<div class="form_input">
    	<input id="graduation" name="graduation" class="tip_east" type="text" value="<?php print $GetlastUID2["graduation"]; ?>" title="<?php print $GetlastUID2["graduation"]; ?>" style="border:hidden; background-color:#FFF;" readonly>
    </div>
  </li>
  
  <li>
   <label>About Person</label>
     <div class="form_input">
     <textarea name="about" id="about" cols="" rows="5" class="auto" readonly style="border:hidden; background-color:#FFF;"><?php print $GetlastUID2["about"]; ?></textarea>
     </div>
  </li>                             



  <li>
     <label>Current Work Position</label>
        <div style="margin:0px 10px 10px 10px">
        <textarea name="curw" id="curw" rows="4" cols="115" readonly><?php print $GetlastUID2["curw"]; ?></textarea></div>
 </li>
 
 
  <li>
     <label>Previous Work</label>
        <div style="margin:0px 10px 10px 10px">
        <textarea name="prew" id="prew" rows="6" cols="115" readonly><?php print $GetlastUID2["prew"]; ?></textarea></div>
 </li>
 
          
      <li>
     <label>Qualifications</label><br/><br/>   
        <div style="margin:10px 10px 10px 10px">        
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="ckeditor/_samples/sample.js"></script>
        <link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
        <textarea cols="80" id="qua" name="qua" rows="20" readonly><?php print $GetlastUID2["qua"]; ?></textarea>
        <script type="text/javascript">
        //<![CDATA[
            // This call can be placed at any point after the
            // <textarea>, or inside a <head><script> in a
            // window.onload event handler.
            // Replace the <textarea id="editor"> with an CKEditor
            // instance, using default configurations.
            CKEDITOR.replace( 'qua' );
        //]]>
        </script>
         </div>
      </li>
      
      
      <li>
               <label>User ID</label>
                <div class="form_input">
                    <input id="uid" name="uid" class="in_submitted" type="text" value="<?php print $GetlastUID2["UID"]; ?>" title="" readonly>
                </div>
              </li>
              
              <li>
               <label>Password</label>
                <div class="form_input">
                    <input id="pass" name="pass" class="in_submitted" type="text" value="<?php print $GetlastUID2["Upass"]; ?>" title="Make Sure to enter valid entry" readonly>
                </div>
              </li>  
              
          </ul>
				
     </div><!-- End of widget _body Div -->
 </div>

   </form>
 </div> 
    
    

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
 	require("assay.php");
 } ?>