<?php
 include("Library/config.php");
   if( !empty($_SESSION["user_admin"]) ){ 
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

<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      
function checkform(searchs){
	if(document.searchs.uid.value==""){
		alert('Member Id not Find Please Add Only Number Entery');
		return false;
	}
}
//-->
</script>

<meta charset="UTF-8"></head>
<body>
<!--Container-->
<div id="dreamworks_container">
    <!--Primary Navigation Start -->
    <?php $flage = 1; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php include_once("secondary_nav_main.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="send"){
		if( !empty($_REQUEST["uid"]) ){
	 	
	$NovaVamlue = cleanIt($_POST["uid"],'ALL');
	
 	$Comm1 = mysql_query("SELECT * FROM `memeber` where `UID` = '$NovaVamlue' ") or die(mysql_error());
        
		if(mysql_num_rows($Comm1) >0){ 
		 $result = mysql_fetch_array($Comm1); 		?>
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Search For Member Access - ECCP</h5></div>
            <div class="widget_body">
            	<!--Activity Table-->
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>
                        <th width="8%">ID</th>
                        <th width="13%">NAME</th>
                        <th width="13%">University </th>
                        <th width="23%">Email</th>
                        <th width="20%">Mobile Number</th>
                        <th width="13%">Actions</th>
                  </tr>

     <tr>
        <td align="center"><?php echo $result["UID"]; ?></td>
        <td align="center"><a href="#" style="font-family:Tahoma;"><?php echo $result["name"]; ?></a></td>
        <td align="center"><span class="green_highlight pj_cat"><?php echo $result["univ"]; ?></span></td>
        <td align="center"><a href="#"><?php echo $result["email"]; ?></a></td>
        <td align="center"><?php echo $result["mobile"]; ?></td>
        <td align="center">
        	<span class="data_actions iconsweet">
            	<a class="tip_north" original-title="View Full Member Information" href="view-member-data.php?valve=<?php echo $result["ID"]; ?>" target="_blank">a</a>
                <a class="tip_north" original-title="Edit Member Information" href="#">C</a>
                <a class="tip_north" original-title="Delete This Member Profile" href="delete-member.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>">X</a>
                <a class="tip_north" original-title="Course Controller" href="Course-Controller.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>">Q</a>
           </span>
       </td>
      </tr>                   

  </table>
				<div class="action_bar">
                   <!-- <a class="button_small whitishBtn" href="#"><span class="iconsweet">l</span>Export This List To Excel Sheet </a>-->
                </div>
            </div>
        </div>
    </div> 
   
<?php }else{ echo "<script>alert('No User Was Find By This ID ');</script>";  ?>
			<script>location.href= "Search-Member.php";</script>  <?php }// end of check query database



	}else{
				echo "<script>alert('Sorry No User Id Was Enter In Field /n Please You Must Enter This Information In Correct Case');</script>";  ?>
				<script>location.href= "Search-Member.php";</script>
	    <?php  } // end of check  if( !empty($_REQUEST["to"]) )
		
		
		}else{// show normal case here  ?>

<!--One_Wrap-->
  <form name="searchs" id="searchs" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">
    
    
    
    
         <div class="widget">
        	<div class="widget_title"><span class="iconsweet">C</span>
              <h5>Search For Member Access - ECCP</h5>
            </div>
            <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">
  
  <li>
   <label>Member ID :</label>
   	<div class="form_input">
    	<input id="uid" name="uid" class="tip_east" type="text" value="" title="Make Sure to enter valid entry" style="font-family:Tahoma;" onKeyPress="return isNumberKey(event)">
    </div>
  </li>
  
          </ul>
				
                


<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Start Search" class="button_small whitishBtn" onClick="return checkform(this);" >
     	<input type="hidden" name="action" value="send">
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
