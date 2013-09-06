<?php
 include_once("Library/config.php");
 include_once("Library/RPC.php"); 
  	  if( !empty($_SESSION["user_admin"]) ){ ?>
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
    <?php $flage = 3; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php include_once("secondary_nav_inbox.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
<?php include("activity.php");    ?>
        
<!--One_Wrap-->
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">A</span><h5>Archives Of Sent Message - ECCP</h5>
       	  </div>
            <div class="widget_body">
            	<!--Activity Table-->
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>
                        <th width="13%">case</th>
                      <th width="37%">subject </th>
                      <th width="15%">Sent Date</th>
                      <th width="26%">Sent To</th>
                      <th width="9%">Actions</th>
                  </tr>
 <?php 
 	$myid = $_SESSION["user_admin"];
 	$Comm1 = mysql_query("SELECT * FROM `message` where `from` = '$myid' ORDER BY `ID` DESC LIMIT 0, 60 ");
		while( $result = mysql_fetch_array($Comm1)){ ?>
     <tr>
        <td align="center"><?php if($result["read"]=="NO"){?><img src="images/email.gif"><?php }else{?><img src="images/rtg_email.gif"><?php } ?></td>
        <td align="left"><a href="view-message.php?tag=<?php echo $result["ID"]; ?>" target="_self"><span class="green_highlight pj_cat"><?php
			$valv = cleanIt($result["subject"],'NO_HTML');
			str_replace("<p>",' ',$valv);
	  echo  html_entity_decode($valv);
		  ?></span></a></td>
        <td align="center"><?php echo $result["time"]; ?></td>
        <td align="center" style="font-family:Tahoma;"><?php $com02 = mysql_query("SELECT `UID`, `name` FROM `memeber` WHERE `UID` = $result[to] "); $com03 = mysql_fetch_array($com02);
 echo $com03["UID"]."&nbsp; - &nbsp;"; echo $com03["name"]; ?></td>
        <td align="center"><span class="data_actions iconsweet"><a class="tip_north" original-title="Delete This Message" href="delete-question.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>">X</a></span></td>
      </tr>                   
	<?php } ?>
  </table>
		  <div class="action_bar">
                    <!--<a class="button_small whitishBtn" href="#"><span class="iconsweet">l</span>Export This List To Excel Sheet </a>-->
                </div>
            </div>
        </div>
    </div> 

      
      </div>
   </section>
 </div>

</body>
</html>
<?php }else{
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		echo "<script>location.href='login.php'</script>";
} ?>