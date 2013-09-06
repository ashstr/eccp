<?php
	require("Library/config.php");
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
	   		//include("action-new-member.php");
		}else{  ?>
        
<!--One_Wrap-->
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Lecture Schedule Archive - ECCP</h5></div>
            <div class="widget_body">
            	<!--Activity Table-->
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>
                        <th width="6%">Group ID</th>
                      <th width="23%">Lecture Date</th>
                      <th width="24%">Lecture Topics </th>
                        <th width="22%">Lecture Instructor</th>
                        <th width="14%">Lecture Duration</th>
                      <th width="11%">Actions</th>
                  </tr>
 <?php 
  $GroID11 = cleanIt($_GET['GroID'],'ALL');	
  $GroID   = intval($GroID11);

  $CourID1 = cleanIt($_GET['CourID'],'ALL');	
  $CourID  = intval($CourID1);

 	$lecture11 = mysql_query("SELECT * FROM `lecture` where `GID` = '$GroID' AND `CID` = '$CourID' ORDER BY `ID` DESC LIMIT 0, 60 ");
	
		while( $result = mysql_fetch_array($lecture11)){
		$GUnCID   = mysql_query("select * from `groups` where `ID` = '$result[GID]' ");
		$GUnCID2  = mysql_fetch_assoc($GUnCID);

		$InstName  = mysql_query("select * from `teacher` where `ID` = '$result[instructor]' ");
		$InstName2 = mysql_fetch_assoc($InstName);
		?>
     <tr>
        <td align="center"><?php echo $GUnCID2["UnConID"]; ?></td>
        <td align="center">
        	<a href="lecture-view.php?valve=<?php echo $result["ID"]; ?>" style="font-family:Tahoma;" target="_blank"><?php echo $result["date"]; ?></a></td>
        <td align="center"><?php echo $result["topic"]; ?></td>
        <td align="center"><a href="#"><?php echo $InstName2["name"]; ?></a></td>
        <td align="center"><?php echo $result["duration"]; ?></td>
        <td align="center">
        	<span class="data_actions iconsweet">                      
            <a class="tip_north" original-title="Delete This" href="delete-lecture.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>"> X </a>
             <a class="tip_north" original-title="View Full Information" href="lecture-view.php?valve=<?php echo $result["ID"]; ?>" target="_blank">}</a>
             <a class="tip_north" original-title="Edit This Information" href="edit-lecture.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>">C</a>
             </span></td>
      </tr>                   
	<?php } ?>
  </table>
  
				<!--<div class="action_bar">
                    <a class="button_small whitishBtn" href="#"><span class="iconsweet">l</span>Export This List To Excel Sheet </a>
                </div>-->
                
                
            </div>
        </div>
    </div> 
    <?php } ?>         
      
      </div>
   </section>
 </div>

</body>
</html>