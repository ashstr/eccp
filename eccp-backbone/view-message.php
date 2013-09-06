<?php include_once("Library/config.php");
		if( !empty($_SESSION["user_admin"]) ){  ?>
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
    <?php include_once("secondary_nav_inbox.php"); ?>
    <!--Content Wrap-->
    <div id="content_wrap">
        
<?php if($_REQUEST["action"]=="update"){
		if( !empty($_REQUEST["email"]) ){
	   		//include("action-new-member.php");
			}else{
				echo "<script>alert('Error In Email Entery /n Please Enter This Information In Correct Case');</script>";  ?>
				<script>location.href= "new-member.php";</script>
	    <?php  }
		}else{
	//$tago = ;
	$cbc   = mysql_query("SELECT * FROM `message` WHERE `ID` =".intval($_GET["tag"]));
	$cbc2  = mysql_fetch_array($cbc);
	
	if($cbc){
	 if($_SESSION["user_admin"] != $cbc2["from"]){	
		$myv = intval($_GET["tag"]);
		$abdc   = mysql_query("UPDATE  `message` SET  `read` =  'YES' WHERE  `message`.`ID` = $myv LIMIT 1 ");
	    }else{ /*Dont Update Status of this message*/ }
	} ?>

<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">
    
    
         <div class="widget">
        	<div class="widget_title"><span class="iconsweet">@</span>
              <h5>Read Message Access</h5>
            </div>
            <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container"><li>
   <label>From :</label>
   	<div class="form_input">
     <?php
	   $com02 = mysql_query("SELECT `UID`, `name` FROM `memeber` WHERE `UID` = $cbc2[from] ");
	   
	   	if(mysql_num_rows($com02)!=0){
				$com03 = mysql_fetch_array($com02);
				$res = $com03["UID"]."&nbsp; - &nbsp;".$com03["name"];
 			}else{
				$com02 = mysql_query("SELECT `username` FROM `admin` WHERE `ID` = $cbc2[from] ");
					$com03 = mysql_fetch_array($com02);
					$res =  strtoupper($com03["username"]);
		} ?>
    	<input id="bd" name="bd" class="tip_east" type="text" value="<?php echo $res; ?>" title="Who Send This Message Is : <?php echo $res; ?>" style="border:hidden; font-family:Tahoma;">
    </div>
  </li>
  

  <li>
   <label>Subject :</label>
   	<div class="form_input">
    	<input id="subject" name="subject" class="tip_east" type="text" value="<?php echo $cbc2["subject"]; ?>" title="Make Sure to enter valid entry" style="border:hidden; font-family:Tahoma;">
    </div>
  </li>
  
  

  <li>
   <label>Date</label>
   	<div class="form_input">
    	<input id="univ" name="univ" class="tip_east" type="text" value="<?php echo $cbc2["time"]; ?>" title="Make Sure to enter valid entry" style="border:hidden; font-family:Tahoma;">
    </div>
  </li>
  
  <li><div style="margin:0px 0px 10px 30px">
  
  
  
  
  
  	<textarea name="ques" id="ques" rows="8" cols="60"><?php echo html_entity_decode($cbc2["contant"]); ?></textarea>
    <?php //$basePath = "http://novascotia-inc.ca/eccp/ECCP-BackBone/"; ?>
    <?php $basePath = "http://localhost/xampp/eccp/ECCP-Members/"; ?>
<script type="text/javascript" src="<?php echo $basePath; ?>ckeditor/ckeditor.js?t=A06B"></script>
<script type="text/javascript">
  CKEDITOR.replace( 'ques',
{
	filebrowserBrowseUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	filebrowserWindowWidth : '800',
 	filebrowserWindowHeight : '700',
 	language : 'ar'
});
</script>
  
  </div></li>
          </ul>
				
                


<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Replay This Message" class="button_small whitishBtn">
     	<input type="hidden" name="action" value="update">
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

<?php }else{
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		echo "<script>location.href='login.php'</script>";
} ?>
