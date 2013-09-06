<?php include_once("Library/config.php"); ?>
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
	
<?php 
 $URL_ID = intval($_GET["T"]);
 
 if($_REQUEST["action"]=="delete"){ ?>
 
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Delete Access - ECCP</h5></div>
			 <?php 
			 if(mysql_query(" delete from `official_vacation` where `ID` = '$URL_ID' ") or die(mysql_error()) ){
			 	echo "<strong>Your Request Has Been Done With Success <br/><br/> * This Member Hase Been Deleted From our Record, And you Can Not Undo this action.</strong>";
			 	}
				

	   	   ?>
          </div>
        </div>
        
        
<?php }else{  ?>


<!--One_Wrap-->
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
        	<h5>Delete Access From Archive - ECCP </h5>
       	  </div>
  <form name="product" id="product" class="" method="post" enctype="multipart/form-data">

<div class="widget_body">
            	<!--Activity Table-->
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>
                        <th align="left"> Confirmation Message</th>
                  </tr>
 <?php 
 	$URL_ID = intval($_GET["T"]);

	$GetlastUID  = mysql_query("SELECT * FROM `official_vacation` WHERE `ID`= $URL_ID ORDER BY `ID` DESC LIMIT 0 , 1");
	  while( $result = mysql_fetch_array($GetlastUID)){ ?>
     <tr>
       <td align="left">
       <span style="font-style:normal; font-size:14px; font-weight:600; color: #FF0000; ">
       You Will Delete This Information, Please Be Sure After Deleted You Can Not Undo</span><br/><br/><br/>
       Title : <?php echo $result["title"]; ?><br/><br/>
       Description : <?php echo $result["dic"]; ?><br/><br/>
       Date : <?php echo $result["date"]; ?><br/><br/>
       
       </td>
     </tr>
                        


    <?php } ?>         
  </table>
  
	<div class="action_bar">
        <!--<a class="button_small whitishBtn" href="#"><span class="iconsweet">l</span>Export This List To Excel Sheet </a>-->
        <input name="Update" type="submit" value="Im Understand This, Delete Now" class="button_small whitishBtn">
        <input type="hidden" name="action" value="delete">
        <!--<input type="hidden" name="ProdID" value="<?php echo $Psuperid; ?>">-->
	</div>
            </div>
            
  </form>
        </div>
    </div> 
    <?php } ?>         
      
      </div>
   </section>
 </div>

</body>
</html>