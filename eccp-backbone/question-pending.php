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
    	<?php $flage = 5; include("primary_nav.php"); ?>
     <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php include_once("secondary_nav_question.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){
	   		//include("action-new-member.php");
		}else{  ?>
        
<!--One_Wrap-->
 <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Question Archive Access - ECCP</h5>
       	  </div>
            <div class="widget_body">
            	<!--Activity Table-->
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                    <tr>
                        <th width="6%">ID</th>
                      <th width="10%">Course</th>
                        <th width="37%">Question </th>
                        <th width="15%">add date</th>
                      <th width="10%">author</th>
                      <th width="7%">status</th>
                      <th width="15%">Actions</th>
                  </tr>
 <?php 
 	$Comm1 = mysql_query("SELECT * FROM `questions` WHERE `pending` = 0 ORDER BY `ID` DESC LIMIT 0, 50 ");
		while( $result = mysql_fetch_array($Comm1)){ ?>
     <tr>
        <td align="center"><?php echo $result["ID"]; ?></td>
        <td align="left"><?php
			$com02 = mysql_query("SELECT `title` FROM `subject` WHERE `ID` = $result[cat] ");
			$com03 = mysql_fetch_array($com02);
			$res =  strtoupper($com03["title"]);
			if(empty($res)){ echo "<em><strong>Undefined</strong></em>"; }else{ echo htmlentities($res);}
			
			  ?></td>
        <td align="left"><?php
			$valv = cleanIt($result["ques"],'NO_HTML');
			$valv = strip_tags($valv);
			str_replace("<p>",' ',$valv);
	  echo  html_entity_decode(strip_tags($valv));
		  ?></td>
        <td align="center"><span class="green_highlight pj_cat" ><?php echo $result["date"]; ?></span></td>
        <td align="center"><?php if($result["author"]== ""){ echo "Not Define"; }else{ echo $result["author"]; } ?></td>
        <td align="center"><a href="#"><?php if($result["pending"]!=0){ echo "Active"; }else{ echo "<span style='color:#FF0000'><strong>INACTIVE</strong></span>";} ?></a></td>
        <td align="center">
          <span class="data_actions iconsweet">
        	<a class="tip_north" original-title="Approve This Valid Question" href="valid-question.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>">=</a>
        	<a class="tip_north" original-title="View Full Question" href="#">}</a>
            <a class="tip_north" original-title="Edit" href="edit-question.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>">l</a>
            <a class="tip_north" original-title="Delete This Question" href="delete-question.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $result["ID"]; ?>">X</a>
         </span></td>
      </tr>                   
	<?php } ?>
  </table>
<div class="action_bar">
                    <!--<a class="button_small whitishBtn" href="#"><span class="iconsweet">l</span>Export This List To Excel Sheet </a>-->
                </div>
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