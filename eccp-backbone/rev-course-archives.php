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
<!--
<link rel="stylesheet" href="./js/cl_editor/jquery.cleditor.css" />
<link rel="stylesheet" href="./uploadify/uploadify.css" /> 	-->
<link rel="stylesheet" href="./css/jquery.ui.all.css" />
<!-- <link rel="stylesheet" href="./css/fullcalendar.css" /> 	-->
<link rel="stylesheet" href="./css/bootstrap.css" />
<link rel="stylesheet" href="./js/fancybox/jquery.fancybox-1.3.4.css" />
<link rel="stylesheet" href="./css/highlight.css" />
<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<script type="text/javascript" src="./js/jquery.min.js"> </script>
<script type="text/javascript" src="./js/jquery.quicksand.js"> </script>
<!--<script type="text/javascript" src="./js/jquery.easing.1.3.js"> </script>
<script type="text/javascript" src="./js/jquery.tipsy.js"> </script>

<script type="text/javascript" src="./js/jquery.autogrowtextarea.js"></script>
<script type="text/javascript" src="./js/form_elements.js"></script>
<script type="text/javascript" src="./js/jquery.ui.core.js"></script>
<script type="text/javascript" src="./js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="./js/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="./js/gcal.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>-->
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
	
<?php if($_REQUEST["action"]=="delete"){

	$del1 = mysql_query("SELECT  `ID` FROM  `subject` WHERE  `parent_cat` =".$_POST["cat"]);
	if(mysql_num_rows($del1) != 0){
		echo "<script>alert('This Process Cannot Done Success Please Deleted The Sub-Subject First');</script>"; ?>
		      <script>location.href= "sub-subject-archives.php";</script> <?php
    }else{

		$action = mysql_query("delete from `subject` where `ID` = ".$_POST["cat"]);
		  if($action){
			echo "<script>alert('This Process Done Success');</script>"; ?>
				  <script>location.href= "sub-subject-archives.php";</script><?php
	  }else{
			echo "<script>alert('This Process Cannot Done Success Error Deleted XE03');</script>"; ?>
				  <script>location.href= "sub-subject-archives.php";</script><?php
		 }
		 
		 		 
		  }
	}else{  ?>        
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">

    
    
     
     <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
        	<h5>Revision Course Archive - ECCP</h5>
        	</div>
            <div class="widget_body">
            	<!--Activity Table-->
            	<table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
        <tr>
            <th width="7%">ID</th>
            <th width="80%" align="left">Course Title</th>
            <!--<th width="44%">Date</th>-->
            </tr>
<?php
 $Sql = mysql_query("select * from `subject` where `parent_cat` = '0' and `flag` = 'REV' ");
   while ($Row = mysql_fetch_array($Sql)){
	  $ID_main=$Row["ID"]; ?>
		<tr>
		  <td align="center"><?php echo $Row["ID"]; ?></td>
		  <td align="left">
          	<a href="rev-course-archives-step-two.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $Row["ID"]; ?>" style="font-family:Tahoma; font-weight:bold;"><?php echo $Row["title"]; ?></a></td>
		  <!--<td align="left"><?php echo $Row["date"]; ?></td>-->
		  </tr>
		<?php 
   }// End While	?>
 </table>
    </div>
        </div>
 </div>

  
   </form>
 </div>    



    <?php } ?>         
      
      </div>
<!--   </section>
 </div>-->

</body>
</html>