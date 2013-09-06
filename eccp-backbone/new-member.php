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

<!-- Kady Javascript-->
<link type="text/css" href="calender/css/vader/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="calender/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="calender/js/jquery-ui-1.7.2.custom.min.js"></script>



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
<meta charset="UTF-8">
</head>
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
		if( !empty($_REQUEST["email"]) ){
	   		include("action-new-member.php");
			}else{
				
				echo "<script>alert('Error In Email Entery /n Please Enter This Information In Correct Case');</script>";  ?>
				<script>location.href= "new-member.php";</script>
                
	    <?php  }
		}else{

	$GetlastUID  = mysql_query("SELECT * FROM `memeber` ORDER BY `ID` DESC LIMIT 0 , 1");
	$GetlastUID2 = mysql_fetch_array($GetlastUID);
	$last_UIDv    = $GetlastUID2["UID"];
	$last_UID = substr($last_UIDv, 2)+1; ?>

        
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" action="" enctype="multipart/form-data">
 <div class="one_wrap">
    
    
         <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>Add Course To Member - ECCP Powerd By NovaScotia</h5>
            </div>
            <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">

  
  <li>
   <label>Set Course</label>
    <div class="form_input">
     <select name="CID" id="CID" onChange="document.team.submit();">
       <?php 
 		 $CID = mysql_query("select * from `subject` where `parent_cat` = '0'  ");
		  while( $CID2 = mysql_fetch_array($CID)){ ?>
     		<option value="<?php echo $CID2["ID"]; ?>" <?php if($CID2["ID"] == $_REQUEST["CID"]){ echo "selected"; }?> ><?php echo $CID2["title"]; ?></option>
   	   <?php } ?>         
     </select>
    </div>
  </li>



<!-- Number Of Option -->
<?php // echo md5(uniqid(rand(), true)); // generateCodeBig(6);
  if(!empty($_POST["CID"]) ){ $CourID = intval($_POST["CID"]); ?>
 <li>
  <label>Add To Group</label>
    <div class="form_input">
      <select name="GID" id="GID" onChange="document.selects.submit();">
 <?php  
  	$Gquery  = mysql_query("select * from `groups` where `courseid` = '$CourID' ");
		while( $Gresult = mysql_fetch_array($Gquery)){ ?>
           <option value="<?php echo $Gresult["ID"]; ?>" ><?php echo $Gresult["UnConID"]; ?></option>
           <?php } ?>
        </select>
             	<input type="hidden" name="action" value="update">

 </div>
</li>
<?php   }?>

  


  <li>
   <label>Full Name Arabic</label>
   	<div class="form_input">
    	<input id="fnra" name="fnar" class="tip_east" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>


  <li>
   <label>Full Name</label>
   	<div class="form_input">
    	<input id="fn" name="fn" class="tip_east" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>

  <li>
   <label>Gender</label>
   	<div class="form_input">
      
      <select name="gender" id="gender">
    	<option value="Male">Male</option>
    	<option value="Female">Female</option>
      </select>
      
    </div>
  </li>

<li><label>Birthday Picker</label> <div class="form_input"><input style="width:20%" type="text" id="datepicker" name="datepicker"> (dd-mm-yyyy)</div></li>  </li>
  

  <li>
   <label>Nationality</label>
   	<div class="form_input">
    	<input id="nati" name="nati" class="tip_east" type="text" value="Egyptian" title="Make Sure to enter valid entry" style="width:40%" >
    </div>
  </li>
  

  

  <li>
   <label>Address</label>
   	<div class="form_input">
    	<input id="address" name="address" class="tip_east" type="text" value="" title="Make Sure to enter valid entry" style="width:40%" >
    </div>
  </li>
  

  <li>
   <label>Religion</label>
   	<div class="form_input">
    	<input id="relig" name="relig" class="tip_east" type="text" value="Muslim" title="Make Sure to enter valid entry" style="width:40%" >
    </div>
  </li>
  
  

  <li>
   <label>University</label>
   	<div class="form_input">
    	<input id="univ" name="univ" class="tip_east" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>
  
  <li>
   <label>Graduation Year</label>
   	<div class="form_input">
    	<input id="GradY" name="GradY" class="tip_east" type="text" value="" title="Make Sure to enter valid entry" style="width:40%" >
    </div>
  </li>
  
  
  <li>
   <label>Current Position</label>
   	<div class="form_input">
    	<input id="curr" name="curr" class="tip_east" type="text" value="" title="Make Sure to enter valid entry" style="width:40%" >
    </div>
  </li>


  <li>
   <label>Mobile Num</label>
    <div class="form_input">
    	<input id="mob" name="mob" class="in_processing" type="text" value="" title="Make Sure to enter valid entry" style="width:40%" >
    </div>
  </li>
  
  <li>
   <label>Land Line</label>
    <div class="form_input">
    	<input id="ll" name="ll" class="in_processing" type="text" value="" title="Make Sure to enter valid entry" style="width:40%">
    </div>
  </li>
  
  
  <li>
   <label>Email</label>
    <div class="form_input">
    	<input id="email" name="email" class="in_processing" type="text" value="" title="Make Sure to enter valid entry" style="width:40%" >
    </div>
  </li>

<!--Use jquery -->
<script type="text/javascript">
	$(document).ready(function(){
	  var nextUrlId = 2;
		$('#AddUrl').click(function(){

	//Create and add a paragraph
	$('<p />').attr('id', 'urlParagraph' + nextUrlId)
	.text(" ")
	.appendTo('#inputBoxes');

		//Create and add an input box
		$('').attr({'type':'text', 'id':'url' + nextUrlId})
		.appendTo('#urlParagraph' + nextUrlId);
		//Iterate id number
		nextUrlId++;
	});
	
  });


$(document).ready(function(){
	var nextUrlId2 = 2;
	$('#AddUrl2').click(function(){

//Create and add a paragraph
	$('<p />').attr('id', 'urlParagraph2' + nextUrlId2)
	.text(" ")
	.appendTo('#inputBoxes2');

//Create and add an input box
$('<table width="100%" border="0" style="padding-bottom:20px;"><tr><td width="31%"><input type="text" name="course_name[]" style="width:220px;" id="textfield" /></td><td width="24%"><input type="text" name="institute[]" style="width:180px;" id="textfield2" /></td><td width="14%"><input type="text" name="year[]" style="width:80px;" id="textfield3" /></td><td width="19%"><input type="text" name="Grade[]" style="width:130px;" id="textfield4" /></td><td width="12%"></td></tr></table>').attr({'type':'text', 'id':'url' + nextUrlId2})

	.appendTo('#urlParagraph2' + nextUrlId2);
	
 //Iterate id number
 nextUrlId2++;

});
});


$(document).ready(function(){
	var nextUrlId3 = 2;
	$('#AddUrl3').click(function(){});
	});

</script>

  <li>
   <label>Medical Course</label>
     <div class="form_input">
     <!--<textarea name="trai_course" id="trai_course" cols="" rows="5" class="auto"></textarea>-->
     <table width="109%" border="0" style="padding-bottom:20px;">
  <tr>
    <td width="31%" height="24"><strong>Course name</strong></td>
    <td width="24%"><strong>institute</strong></td>
    <td width="14%"><strong>year</strong></td>
    <td width="19%"><strong>Grade</strong></td>
    <td width="12%">&nbsp;</td>
  </tr>
  <tr>
    <td><input type="text" class="tip_east" name="course_name[]" style="width:220px;" id="textfield" /></td>
    <td><input class="tip_east" type="text" name="institute[]" style="width:180px;" id="textfield2" /></td>
    <td><input class="tip_east" type="text" name="year[]" style="width:80px;" id="textfield3" /></td>
    <td><input class="tip_east" type="text" name="Grade[]" style="width:130px;" id="textfield4" /></td>
    <td><a  style="cursor:pointer;"  id="AddUrl2"> add more</a></td>
  </tr>
  
  
  <tr>
<td colspan="5"><div id="inputBoxes2"><p id="urlParagraph1"></p></div></td>
</tr> 
</table>
     </div>
  </li>                    



                      


                   

<!--Use jquery 02  -->
<script type="text/javascript">

 $(document).ready(function(){
	  var nextUrlId3 = 2;
		$('#AddUrl').click(function(){

	//Create and add a paragraph
	$('<p />').attr('id', 'urlParagraph3' + nextUrlId3)
	.text(" ")
	.appendTo('#inputBoxes3');

		//Create and add an input box
		$('').attr({'type':'text', 'id':'url' + nextUrlId3})
		.appendTo('#urlParagraph3' + nextUrlId3);
		//Iterate id number
		nextUrlId3++;
	});
	
  });
$(document).ready(function(){
	var nextUrlId2 = 2;
	$('#AddUrl5').click(function(){

//Create and add a paragraph
	$('<p />').attr('id', 'urlParagraph3' + nextUrlId2)
	.text(" ")
	.appendTo('#inputBoxes3');

	

//Create and add an input box
$('<table width="100%" border="0" style="padding-bottom:20px;"><tr><td width="31%"><input type="text" name="n_cour[]" style="width:220px;" id="textfield" /></td><td width="24%"><input type="text" name="n_inst[]" style="width:180px;" id="textfield2" /></td><td width="14%"><input type="text" name="n_year[]" style="width:80px;" id="textfield3" /></td><td width="19%"><input type="text" name="n_grad[]" style="width:130px;" id="textfield4" /></td><td width="12%"></td></tr></table>').attr({'type':'text', 'id':'url' + nextUrlId2})


	.appendTo('#urlParagraph3' + nextUrlId2);
	
 //Iterate id number
 nextUrlId2++;

});
});


$(document).ready(function(){
	var nextUrlId3 = 2;
	$('#AddUrl5').click(function(){});
	});
</script>

  <li>
   <label>Other-Medical Courses</label>
     <div class="form_input">
     <!--<textarea name="trai_course" id="trai_course" cols="" rows="5" class="auto"></textarea>-->
     <table width="109%" border="0" style="padding-bottom:20px;">
  <tr>
    <td width="31%" height="24"><strong>Course name</strong></td>
    <td width="24%"><strong>institute</strong></td>
    <td width="14%"><strong>year</strong></td>
    <td width="19%"><strong>Grade</strong></td>
    <td width="12%">&nbsp;</td>
  </tr>
  <tr>
    <td><input class="tip_east" type="text" name="n_cour[]" style="width:220px;" id="textfield5" /></td>
    <td><input class="tip_east" type="text" name="n_inst[]" style="width:180px;" id="textfield6" /></td>
    <td><input class="tip_east" type="text" name="n_year[]" style="width:80px;"  id="textfield7" /></td>
    <td><input class="tip_east" type="text" name="n_grad[]" style="width:130px;" id="textfield8" /></td>
    <td><a  style="cursor:pointer;"  id="AddUrl5"> add more</a></td>
  </tr>
  
  <tr>
<td colspan="5"><div id="inputBoxes3"><p id="urlParagraph1"></p></div></td>
</tr> 
</table>
     </div>
  </li>      
  
  
  
  


<li>
   <label>Courses Of Interest</label>
     <div class="form_input">
	  <?php
	  	$mQuery  = mysql_query("SELECT * FROM `subject` WHERE `parent_cat` = '0' LIMIT 0 , 30");
	  	 
		 while($MFquery = mysql_fetch_array($mQuery)){ ?>
		  <div class="form_input"><input name="coi[]" type="checkbox" value="<?php echo $MFquery["ID"]; ?>"><label for="check1"><?php echo $MFquery["title"]; ?></label></div>
	<?php }
	 ?>     
     </div>
  </li>
  
  


<li>
   <label>Other Interest Courses Please Specified</label>
     <div class="form_input">
	 <textarea name="other_co" id="other_co" cols="" rows="5" class="auto"></textarea>   
     </div>
  </li>
  
  
<li>
   <label>Training Experience</label>
     <div class="form_input">
                
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/_samples/sample.js"></script>
    <link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
    <textarea cols="80" id="trai_exp" name="trai_exp" rows="20">Training Experience Here If You Need</textarea>
    <script type="text/javascript">
    //<![CDATA[
        // This call can be placed at any point after the
        // <textarea>, or inside a <head><script> in a
        // window.onload event handler.
        // Replace the <textarea id="editor"> with an CKEditor
        // instance, using default configurations.
        CKEDITOR.replace( 'trai_exp' );
    //]]>
    </script>
     			 </div>
    		  </li>
              


<li>
   <label>Work Experience</label>
     <div class="form_input">
                
                
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/_samples/sample.js"></script>
    <link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
    <textarea cols="80" id="work_exp" name="work_exp" rows="20">Work Experience Here If You Need</textarea>
    <script type="text/javascript">
    //<![CDATA[
        // This call can be placed at any point after the
        // <textarea>, or inside a <head><script> in a
        // window.onload event handler.
        // Replace the <textarea id="editor"> with an CKEditor
        // instance, using default configurations.
        CKEDITOR.replace( 'work_exp' );
    //]]>
    </script>
     			 </div>
    		  </li>
              
                <li>
   <label>C.V</label>
     <div class="form_input">
      <div align="right"><input type="file" name="cv" id="cv"></div>
    </div>
  </li>                    


  <li>
   <label>Personal Photo</label>
     <div class="form_input">
      <div align="right"><input type="file" name="picG" id="picG"></div>
    </div>
  </li>                    


  
              
             <li>
               <label>User ID</label>
                <div class="form_input">
                    <input id="uid" name="uid" class="in_submitted" type="text" value="<?php echo date("y").$last_UID; ?>" title="Make Sure to enter valid entry" >
                </div>
              </li>
              
              <li>
               <label>Password</label>
                <div class="form_input">
                    <input id="pass" name="pass" class="in_submitted" type="text" value="<?php echo rand(11111, 99999); echo generateCode(); ?>" title="Make Sure to enter valid entry" >
                </div>
              </li>
          </ul>
				
                


<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Record New data Now" class="button_small whitishBtn">
     	<input type="hidden" name="ProdID" value="<?php echo $Psuperid; ?>">
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
 	require("assay.php");
 } ?>