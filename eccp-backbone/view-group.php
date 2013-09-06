<?php require_once("Library/config.php"); 
		if( !empty($_SESSION["user_admin"]) ){
			if(checkadmin($_SESSION["user_admin"],"allow_admin_manage")){
			require("Library/cleanIt.php"); ?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php echo $site_title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">

<!--Stylesheets-->
<?php require_once("full_css.php"); ?><!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<?php require_once("full_js2.php"); ?>

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
	
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">

    
    
  <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>View Group</h5>
        </div>
<div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">
   <?php 
   	$FlagValue = cleanIt($_GET['T'],'NO_HTML');	
 	$GID = intval($FlagValue);
	
	 $Comm1  = mysql_query("select * from `groups` where `ID` = '$GID'  LIMIT 0, 1 ");
	 $result = mysql_fetch_array($Comm1); 
	 
     $IDb = $result["courseid"];
     
	 $co1 = mysql_query("SELECT * FROM `subject` where `ID` = '$IDb' ");
	 $f1 = mysql_fetch_array($co1); ?> 

   <li>
       <label>Group ID</label>
        <div class="form_input">
         <input style="width:20%; border:hidden;" id="gid" name="gid" class="tip_east" type="text" value="<?php echo $FlagValue; ?>" title="" disabled>
        </div>
      </li>

      
   <li>
       <label>Course Name</label>
        <div class="form_input">
        	<input style="width:20%; border:hidden;" id="cids" name="cids" class="tip_east" type="text"   value="<?php echo $f1["title"]; ?>" title="" disabled>
        </div>
      </li>

      

  <li>
    <label>Group Type</label>
       <div class="form_input">
       <input style="width:20%; border:hidden;" id="gid" name="gid" class="tip_east" type="text" value="<?php if($result["type"]=='1'){ echo "Attending"; }else{ echo "Online"; } ?>" title="" disabled>
      </div>
   </li>
      

  <li>
    <label>Instructor Name</label>
       <div class="form_input">
        <select name="inst" id="inst" size="10" multiple="multiple" style="width:200px;" disabled >
         <?php
	      $links1  = mysql_query("SELECT * FROM `gr_ins` WHERE `group` = '$FlagValue' "); 
		  
		
		   while( $links2  = mysql_fetch_array($links1) ){ 
		  	$nova1  = mysql_query("SELECT * FROM `teacher` WHERE `ID` = '$links2[instID]' ORDER BY `ID` ASC"); 
			$nova2 = mysql_fetch_array($nova1); ?>

        	<option value="<?php echo $nova2["ID"]; ?>" <?php if($co02["ID"] == $Vdata["to"]){ echo "selected"; } ?> disabled><?php echo $nova2["name"]; ?></option>
         <?php } ?>
        </select>
      </div>
   </li>
      
  <li>
   <label>Start Date</label>
    <div class="form_input"><input style="width:20%; border:hidden;" type="text" id="datepicker" name="startda" value="<?php echo $result["startda"]; ?>" disabled>&nbsp;(dd-mm-yyyy)</div>
  </li>

  <li>
      <label>End Date</label>
      <div class="form_input"><input style="width:20%; border:hidden;" type="text" id="ends" name="ends"  value="<?php echo $result["ends"]; ?>" disabled>&nbsp;(dd-mm-yyyy)</div>
  </li>
    

     <li>
      <label>Duration</label>
 <div class="form_input">
 <input style="width:20%; border:hidden;" type="text" id="month" name="month" value="<?php echo $result["month"]; ?>" disabled>&nbsp; Month
 <input style="width:20%; border:hidden;" type="text" id="days"  name="days"  value="<?php echo $result["days"];  ?>" disabled> &nbsp;Day's</div>

      <div class="form_input"></div>
     </li>

     <li>
      <label>Midterm Exam Date </label>
      <div class="form_input">
         <div style="margin-bottom:10px;">
      		<input style="width:20%; border:hidden;" type="text" id="mdexam" name="mdexam" value="<?php echo $result["mdexam"]; ?>" disabled>&nbsp;Standard Format (dd-mm-yyyy)
        </div>
     </li>

     <li>
      <label>Final Exam Date</label>
      <div class="form_input">
         <div style="margin-bottom:10px;">
      		<input style="width:20%; border:hidden;" type="text" id="fexam" name="fexam" value="<?php echo $result["fexam"]; ?>" disabled>&nbsp;Standard Format (dd-mm-yyyy)
      </div>
     </li>

  </ul>
				
                
    
     </div><!-- End of widget _body Div -->
 </div>


<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">C</span><h5>Vacation Details</h5></div>
            <div class="widget_body">
                <div id="container">
                	<textarea  id="wyswig" name="vacation" disabled><?php echo $result["vacation"]; ?></textarea>
                </div>
            </div>
        </div>
    </div>
	<!--One_Wrap-->


<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">C</span><h5>Attendance Day</h5></div>
            <div class="widget_body">
                <div id="container"><textarea name="att" id="att" rows="12" cols="120" readonly><?php echo $result["att1"]; ?></textarea> </div>
            </div>
        </div>
    </div>
	<!--One_Wrap-->






  

<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">C</span><h5>Attendance Day2</h5></div>
            <div class="widget_body">
                <div id="container">
				<textarea name="att2" id="att2" rows="12" cols="120" readonly><?php echo $result["att2"]; ?></textarea>
            </div>
        </div>



<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Record New data Now" class="button_small bluishBtn ">
     	<input type="hidden" name="action" value="update">
   </div>
  </div>    </div>
	<!--One_Wrap-->
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