<?php  include("Library/config.php");
		if( !empty($_SESSION["UID"]) ){ 
		 include("Library/RPC.php"); ?>

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
	
<?php if($_REQUEST["action"]=="send"){
		if( $_REQUEST["to"] == $_SESSION["UID"]){
				echo "<script>alert('Error You Cannot Sent Message To Your Self - Please Enter Valid Member ID - Note This Case Will Reported To Admin Email');</script>";  ?>
				<script>location.href= "compose-message.php";</script>
<?php	}else if( !empty($_REQUEST["to"]) ){
		
		$me = $_SESSION["UID"];
		
		$to    	 = cleanIt($_POST["to"],'ALL');
		$subject    = cleanIt($_POST["subject"],'NO_HTML');
		$cont       = cleanIt($_POST["cont"],'HTML2TXT');

		$new_message =mysql_query("
			INSERT INTO `message`
				(`from`, `to`,  `time`,   `subject`,   `contant`,  `flag`, `read`) VALUES
				($me,    '$to', NOW(),  '$subject',  '$cont',    '1',    'NO');" );		?>
 <div class="one_wrap">

         <div class="widget">
        	<div class="widget_title"><span class="iconsweet">C</span>
              <h5>Message Center</h5>
            </div>
            <div class="widget_body">
            	<!--Activity Table-->
                <ul class="form_fields_container"><li>
                   <label>Server Response :</label>
                    <div align="left"><br/> &nbsp;&nbsp;
                        Your Message Was Sent Successfully&nbsp;&nbsp;&nbsp; [
              <em>Thank you for using our message communication center</em> ]
                    </div>
                  </li>
              </ul>
     </div>
   </div>
  </div> 
   
   
   
   
   		<?php	}else{
				echo "<script>alert('Error In To Field /n Please Enter This Information In Correct Case');</script>";  ?>
				<script>location.href= "compose-message.php";</script>
	    <?php  }
		}else{ ?>
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">
    
    
         <div class="widget">
        	<div class="widget_title"><span class="iconsweet">C</span>
              <h5>Writing New Message</h5>
            </div>
            <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container"><li>
   <label>From :</label>
   	<div class="form_input">
    	<input id="from" name="from" class="tip_east" type="text" value="<?php echo $_SESSION["my_name"]; ?>" title="Make Sure to enter valid entry" style="font-family:Tahoma;" readonly="readonly">
    </div>
  </li>
  

  <li>
   <label>Subject :</label>
   	<div class="form_input">
    	<input id="subject" name="subject" class="tip_east" type="text" value="" title="Make Sure to enter valid entry" style="font-family:Tahoma;">
    </div>
  </li>
  
  

  <li>
   <label>To Member</label>
   	<div class="form_input">
    	<input id="to" name="to" class="tip_east" type="text" value="" title="Make Sure to enter valid entry" style="font-family:Tahoma;">
    </div>
  </li>
  
  <li>
   	<div style="margin:10px 10px 10px 10px">
  	<textarea name="cont" id="cont" rows="8" cols="60"></textarea>
    <?php //$basePath = "http://novascotia-inc.ca/eccp/ECCP-BackBone/"; ?>
    <?php $basePath = "http://localhost/xampp/eccp/ECCP-Members/"; ?>
<script type="text/javascript" src="<?php echo $basePath; ?>ckeditor/ckeditor.js?t=A06B"></script>
<script type="text/javascript">
  CKEDITOR.replace( 'cont',
{
	filebrowserBrowseUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo $basePath; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	filebrowserWindowWidth : '800',
 	filebrowserWindowHeight : '700',
 	language : 'en'
});
</script>

		       </div>
    		  </li>
          </ul>
				
                


<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Send Message" class="button_small whitishBtn">
     	<input type="hidden" name="action" value="send">
     	<!--<input type="hidden" name="ProdID" value="<?php //echo $Psuperid; ?>">
    <a class="button_small whitishBtn" href=""><span class="iconsweet">l</span>Export Table</a>-->
   </div>
  </div>

    
    
     </div><!-- End of widget _body Div -->
 </div>
 
  
 </div> 
   </form>
    

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
