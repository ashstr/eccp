<?php require_once("Library/config.php"); 
		if( !empty($_SESSION["user_admin"]) ){
			if(checkadmin($_SESSION["user_admin"],"allow_admin_manage")){  ?>
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
	
<?php if($_REQUEST["action"]=="update"){
	   		include("action-new-rev-group.php");
		}else{ ?>

        
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">

    
    
  <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>New Revision Group</h5>
        </div>
<div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">

      
   <li>
       <label>Course Name</label>
   <?php 
   $IDb = $_REQUEST["cat"];
     $co1 = mysql_query("SELECT * FROM `subject` where `ID` = '$IDb' ");
	   $f1 = mysql_fetch_array($co1); ?> 
        <div class="form_input">
        	<input style="width:20%" id="gid" name="gid" class="tip_east" type="text" value="<?php echo $f1["title"]; ?>" title="" readonly>
        </div>
      </li>

      
   <li>
       <label>Group ID</label>
   <?php 
	$Chack01   = mysql_query("SELECT * FROM `groups` WHERE `courseid` = '$IDb' ORDER BY `ID` DESC LIMIT 0 , 1");
	
	  if(mysql_num_rows($Chack01) != 0){
			$Chack02   = mysql_fetch_array($Chack01); 
			$MYUnConID = $Chack02["UnConID"]+1 ;
			}else{
			$MYUnConID = "1";
		  }  ?> 
          
        <div class="form_input">
        	<input style="width:20%" id="gid" name="gid" class="tip_east" type="text" value="<?php echo $MYUnConID; ?>" title="" readonly>
        </div>
      </li>


  <li>
    <label>Group Type</label>
       <div class="form_input">
         <select name="type" id="type">
          <option value="1" >Attending</option>
          <option value="2" >Online</option>
         </select>
      </div>
   </li>
      

  <li>
    <label>Instructor Name</label>
       <div class="form_input">
        <select  name="inst[]" id="inst[]" size="10" multiple="multiple" style="">
         <?php $nova1  = mysql_query("SELECT * FROM `teacher` WHERE `flag` !=0 ORDER BY `ID` ASC"); 
		   while($nova2 = mysql_fetch_array($nova1)){ ?>
        	<option value="<?php echo $nova2["ID"]; ?>" <?php if($co02["ID"] == $Vdata["to"]){ echo "selected"; } ?> ><?php echo $nova2["name"]; ?></option>
         <?php } ?>
        </select>
      </div>
   </li>
      

              
  <li>
      <label>Start Date</label>
      <div class="form_input"><input style="width:20%" type="text" id="datepicker" name="startda">&nbsp;(dd-mm-yyyy)</div>
     </li>

     <li>
      <label>End Date</label>
      <div class="form_input"><input style="width:20%" type="text" id="ends" name="ends" value="06/06/2013">&nbsp;(dd-mm-yyyy)</div>
     </li>
    

     <li>
      <label>Duration</label>
 <div class="form_input">
 <input style="width:20%" type="text" id="month" name="month" value="2">&nbsp; Month
 <input style="width:20%" type="text" id="days" name="days" value="17"> &nbsp;Day's</div>

      <div class="form_input"></div>
     </li>
    
     <!--<li>
      <label>Midterm Exam Date</label>
      <div class="form_input"><input style="width:20%" type="text" id="mdexam" name="mdexam" value="06/06/2013">&nbsp;(dd-mm-yyyy)</div>
     </li>-->

     <li>
      <label>Final Exam Date</label>
      <div class="form_input"><input style="width:20%" type="text" id="fexam" name="fexam" value="06/06/2013">&nbsp;(dd-mm-yyyy)</div>
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
                	<textarea  id="wyswig" name="vacation"></textarea>
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
                <div id="container">

<textarea name="att" id="att" rows="12" cols="120"></textarea>
<!--<script type="text/javascript" src="<?php // echo $domain_site; ?>ckeditor/ckeditor.js?t=A06B"></script>
<script type="text/javascript">
  CKEDITOR.replace( 'att2',
{
	filebrowserBrowseUrl : '<?php      //echo $domain_site; ?>ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php // echo $domain_site; ?>ckeditor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php //  echo $domain_site; ?>ckeditor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php     //  echo $domain_site; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php //  echo $domain_site; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php // echo $domain_site; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	filebrowserWindowWidth : '750',
 	filebrowserWindowHeight : '700',
 	language : 'ar'
});
</script>
-->
                </div>
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
				<textarea name="att2" id="att2" rows="12" cols="120"></textarea>
            </div>
        </div>



<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Record New data Now" class="button_small bluishBtn ">
     	<input type="hidden" name="action" value="update">
     	<input type="hidden" name="CID" value="<?php echo $_REQUEST["cat"]; ?>">
   </div>
  </div>    </div>
	<!--One_Wrap-->
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
 	require("assay.php");
 } ?>