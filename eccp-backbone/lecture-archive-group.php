<?php
 require("Library/config.php");
 	if( !empty($_SESSION["user_admin"]) ){
 	    require("Library/cleanIt.php"); 
	 	  if(checkadmin($_SESSION["user_admin"],"allow_add_exam")){ ?>

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
	   		//include("");
		}else{  ?>
        
<!--One_Wrap-->
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
        	<h5>Lecture Schedule Archive - ECCP</h5>
        	</div>
            <div class="widget_body">
            	<!--Activity Table-->
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>
                        <th width="6%">ID</th>
                      <th width="14%" align="left"><label>Group Type</label></th>
                      <th width="43%"><label>Course Name</label></th>
                      <th width="27%">Duration</th>
                        <th width="10%">Actions</th>
                  </tr>
 <?php 
 $cleanHTML03 = cleanIt($_GET['T'],'NO_HTML');	
 $CourID = intval($cleanHTML03);

 $Comm1  = mysql_query("select * from `groups` where `courseid` = '$CourID'  LIMIT 0, 90 ");

		while( $result = mysql_fetch_array($Comm1)){
		
		if($result["type"] == "1"){ $type = "Attending Gruop";}else{ $type = "Online Gruop"; }

			$C001 = mysql_query("SELECT * FROM `teacher` where `ID` = $result[inst]");
			$C002 = mysql_fetch_array($C001);
			
			$C003 = mysql_query("SELECT * FROM `subject` where `ID` = $result[courseid]");
			$C004 = mysql_fetch_array($C003); ?>
     
     <tr>
        <td align="center"><?php echo $result["UnConID"]; // Group ID ?></td>
        <td align="center"><a href="#"><span class="green_highlight pj_cat"><?php echo $type; ?></span></a></td>
        <td align="center"><span class="green_highlight pj_cat"><?php echo $C004["title"]; ?></span></td>
        <td align="center" valign="middle"><?php echo "Month :&nbsp;".$result["month"]." - Days :&nbsp;".$result["days"]; ?>&nbsp;</td>
        <!--<td align="center"><?php echo $C002["name"]; ?></td>-->
        <td align="center" valign="middle">
        	<span class="data_actions iconsweet">
            <a class="tip_north" original-title="View Lecture Schedule For This Group" href="lecture-archive.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&GroID=<?php echo $result["ID"]; ?>&CourID=<?php echo $CourID; ?>">R</a>
              <a class="tip_north" original-title="View This Information" href="view-group.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>">}</a></span>
       </td>
     </tr>                   
	<?php } ?>
    
  </table>
    </div>
        </div>
    </div> 
    <?php } ?>         
      
      </div>
   </section>
 </div>

</body>
</html>
<?php
 }else{ // unauthorized test
 	require("unauthorized.php");	
	}
	
 }else{
 	include("assay.php");
 } ?>