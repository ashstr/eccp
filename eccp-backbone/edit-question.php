<?php include_once("Library/config.php");
 		if( !empty($_SESSION["user_admin"]) ){
		  include_once("Library/cleanIt.php");  ?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php echo $site_title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<!--Stylesheets-->

<script type="text/javascript" src="tinymce/tinymce.min.js"></script>



<script>
tinymce.init({
    selector: "textarea#ques",
    theme: "modern",

    height: 400,
    plugins: [
	    
         "jbimages advlist autolink lists link image charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor autosave"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image jbimages | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ],
	// ===========================================
// SET RELATIVE_URLS to FALSE (This is required for images to display properly)
// ===========================================
relative_urls: false

 });
 
 
 
 tinymce.init({
    selector: "textarea#Explanation",
    theme: "modern",

    height: 300,
    plugins: [
	    
         "jbimages advlist autolink lists link image charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor autosave"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image jbimages | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ],
	// ===========================================
// SET RELATIVE_URLS to FALSE (This is required for images to display properly)
// ===========================================
relative_urls: false

 }); 
</script>





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

<!--One_Wrap-->
<div class="one_wrap">
     <div class="widget">
        	<div class="widget_title"><span class="iconsweet">8</span>
              <h5>View Your Question</h5>
            </div>
            <div class="widget_body">
<?php if($_REQUEST["action"]=="update"){
//	  echo $tips         =  cleanIt($_POST["wyswig"],'HTML2TXT'); exit;

  if(isset($_POST["QID"]) && !empty($_POST["QID"])){
  
	  $QID = intval($_POST["QID"]);
	  $loops = intval($_REQUEST["nums"]);
	  
			include("edit-question-engine.php"); 

		  }else{			
			echo "<script>alert('Error-Select Section-ERROR[301]');</script>";  ?>
			<script>location.href= "question-archive-main.php";</script><?php

		   }
			
##############################################   End Edit Mode   ################################################### 
############################################## Start Normal View ################################################### 

 }else{  ?>  
     
   <form name="team" id="team" class="" action="" method="post" enctype="multipart/form-data">
			<?php 
                $cleanHTML03 = cleanIt($_GET['T'],'NO_HTML');	
                $catId = intval($cleanHTML03); 
				
	 			 $QID = intval($_GET["T"]);

            
                     /// Get Question
                     $GelLastID   =  mysql_query("SELECT * FROM `questions` where `ID` = '$catId' ");
                     $GetlastIDF  =  mysql_fetch_array($GelLastID);
                	 $LQID 		= $GetlastIDF["ID"];
            
                     /// Get Author Name
                     $autho  = mysql_query("SELECT `username` FROM `admin` where '$_SESSION[user_admin]' = `ID` ");
                     $author = mysql_fetch_array($autho);
            
            
                     /// Get Correct Answer
                     $Correct  = mysql_query("SELECT * FROM `mc_so` WHERE `qid` = '$LQID' and `flag` = '3'  ");
                     $Correct1 = mysql_fetch_array($Correct);
                     $Correct2 = $Correct1["option"];
            
            
                     /// Get Correct Answer
                     $Expl  		= mysql_query("SELECT * FROM `mc_so` WHERE `qid` = '$catId' and `flag` = '4' LIMIT 0 , 1  ");
                     $Explan 	  = mysql_fetch_array($Expl);
                     $Explanation = $Explan["option"];
            
            
                     /// Get Correct Answer
                     $tips     = mysql_query("SELECT * FROM `mc_so` WHERE `qid` = '$catId' and `flag` = '2' ");
                     $tipsFet  = mysql_fetch_array($tips);   ?>    


<ul class="form_fields_container">

  <li>
   <label>Author ID</label>
     <div class="form_input">
     
    	<input id="author" name="author" class="in_submitted" type="text" value="<?php echo $author["username"]; ?>" title="" readonly="readonly">
     </div>
  </li>                    


<li>
   <label>Course</label>
     <div class="form_input">
     <select name='sec' id="sec" dir="ltr" size="1" style="width:600px" >
<?php 

   $GetlastIDF["cat"];
   
		 $Sql = mysql_query("select * from `subject` where `parent_cat` = '0' ");
		   while ($Row = mysql_fetch_array($Sql)){
			  $ID_main=$Row["ID"];

			  if($Row7["ID"] == $GetlastIDF["cat"]){ $sele = "selected";}else{ $sele=""; }
				echo"<option value='".$Row["ID"]."' $sele>".$Row["title"];

				$Sql2 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
				$Result2 = mysql_query($Sql2);
				
				

				
  while ($Row2 = mysql_fetch_array($Result2)){
	$ID_main=$Row2["ID"];

	  if($Row2["ID"] == $GetlastIDF["cat"]){ $sele = "selected";}else{ $sele=""; }

		echo "<option value='$Row2[ID]' $sele>$Row[title] : $Row2[title] ";

		$Sql3 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
		 $Result3 = mysql_query($Sql3);

		while ($Row3 = mysql_fetch_array($Result3)){
	  $ID_main=$Row3["ID"];
				if($Row3["ID"] == $GetlastIDF["cat"]){ $sele = "selected";}else{ $sele=""; }
				
				echo "<option value='$Row3[ID]' $sele>$Row[title] : $Row2[title] : $Row3[title]";
				
				$Sql4 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
				$Result4 = mysql_query($Sql4);
		
			while ($Row4 = mysql_fetch_array($Result4)){
				$ID_main=$Row4["ID"];

				if($Row4["ID"] == $GetlastIDF["cat"]){ $sele = "selected";}else{ $sele=""; }

				echo "<option value='$Row4[ID]' $sele>$Row[title] : $Row2[title] : $Row3[title] : $Row4[title]";
				 
				$Sql5 = "select * from `subject`  where `parent_cat` ='$ID_main' ";
				$Result5 = mysql_query($Sql5);
		
			  while ($Row5 = mysql_fetch_array($Result5)){
				  $ID_main=$Row5["ID"];
				  
				  	if($Row5["ID"] == $GetlastIDF["cat"]){ $sele = "selected"; }else{ $sele=""; }

				  echo "<option value='$Row5[ID]' $sele>$Row[title] : $Row2[title] : $Row3[title] : $Row4[title] : $Row5[title]";

				  $Sql6 = "select * from `subject` where `parent_cat` ='$ID_main' ";
				  $Result6 = mysql_query($Sql6);
		
				while ($Row6 = mysql_fetch_array($Result6)){
					   $ID_main=$Row6["ID"];

						  if($Row6["ID"] == $GetlastIDF["cat"]){ $sele = "selected";}else{ $sele=""; }

					  echo "<option value='$Row6[ID]' $sele>$Row[title] : $Row2[title] : $Row3[title] : $Row4[title] : $Row5[title] : $Row6[title]";


					  $Sql7 = "select * from `subject`  where `parent_cat` ='$ID_main' ";
					  $Result7 = mysql_query($Sql7);

				   while ($Row7 = mysql_fetch_array($Result7)){
				   
						  $ID_main=$Row7["ID"];
						  if($Row7["ID"] == $GetlastIDF["cat"]){ $sele = "selected";}else{ $sele=""; }
						  echo "<option value='$Row7[ID]' $sele >$Row[title] : $Row2[title] : $Row3[title] : $Row4[title] : $Row5[title] : $Row6[title] : $Row7[title]";
	  				  // ####

	}// End While
  }// End While
}
}
}
}
 } ?>
    </select>
     </div>
  </li>
  
   <li>
         <label><center>The Question</center></label>

 <div style="margin:30px 10px 10px 10px;">
	<textarea name="ques" id="ques" rows="8" cols="60"><?php echo $GetlastIDF["ques"]; ?></textarea>  </div>
</li>



  <li>
   <label>Right Answer</label>
     <div class="form_input">
    	<input id="correct" name="correct" class="in_submitted" type="text" value="<?php echo $Correct1["option"]; ?>" title="" disabled>
     </div>
  </li>                                        
 
  <li>
     	 <div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">C</span><h5>Answer Assurance</h5></div>
            <div class="widget_body">
                <div id="container">
                	<textarea  name="Explanation" id="Explanation" name="input"><?php echo $Explanation; ?></textarea>
                </div>
            </div>
        </div>
    </div>
  </li>                    

 
<?php


  /* ###### Load All Mistake Option ######  */
 $wrong0 = mysql_query("SELECT * FROM `mc_so` WHERE `qid` = '$catId' and `flag` = '1' ORDER BY `qid` DESC ");
 $numsv  = mysql_num_rows($wrong0);
 
  if(isset($numsv) && !empty($numsv) ){
	  
   $NumVal = $numsv;
   $initiator=2;
   
   while($wrong1=mysql_fetch_array($wrong0) ){ ?> 
      <li>
       <label>Choices <?php echo $initiator; ?></label>
        <div class="form_input">
            <input id="op<?php echo $initiator; ?>" name="op<?php echo $initiator; ?>" class="in_error"  type="text" value="<?php echo $wrong1["option"]; ?>" >
        </div>
      </li>
     <?php
	  $initiator++;
	     } 	 
	 } ?> 

  
  <li>
   <label>Tips & Help</label>
     <div class="form_input">
     <textarea id="wyswig" name="wyswig" cols="10" rows="5"  class="tip_east"><?php echo $tipsFet["tips"]; ?></textarea>
     </div>
  </li>                    

 </ul>





 <!--Summit Table-->   
 <div class="widget_body">
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Insert This Now" class="button_small bluishBtn">
     	<input type="hidden" name="action" value="update">
     	<input type="hidden" name="QID"    value="<?php echo $QID; ?>">
     	<input type="hidden" name="Mistake"    value="<?php echo $numsv; ?>">
  </div>
 </div>
   </form>
   
<?php	}?>   
          </div> <!-- End widget_body --> 
        </div> <!-- End widget -->
    </div> <!-- End one_wrap -->
    

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
