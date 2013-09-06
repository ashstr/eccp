<?php
 require("Library/config.php");
 	if( !empty($_SESSION["user_admin"]) ){
 	    require("Library/RPC.php"); 
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
        <script type="text/javascript">
		function closeme(){
			close();
			}
		</script>

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
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Question Archive Access - ECCP</h5>
       	  </div>
            <div class="widget_body">
            	<!--Activity Table-->
            	
                
                
<?php                
                
 $QId  = intval($_GET["q"]);
 $exID = intval($_GET["ex"]);
	 $adminID = $_SESSION["user_admin"];

	$checkup = mysql_query("SELECT * FROM  `container` WHERE  `eid` =  $exID	AND  `qid` =  $QId AND `author` = $adminID LIMIT 0 , 1");
	$nums = mysql_num_rows($checkup);
      if($nums == 0){
	   $sql = mysql_query("INSERT INTO `container` (`eid`, `qid`, `author`) VALUES ( '$exID', '$QId', $adminID);");
			if($sql){
				echo "<script>alert('The Add Question Process Done With Success'); onclick='closeme();'</script>"; ?>
				<script>"location.href= history.back();"</script>
		<?php	}else{
			    echo "<script>alert('Error In Add This Question');</script>";  
				echo "<script>location.href= history.back();</script>";  
			} 
			
			
	}else{ echo "<p>This Question Has Been Added Before Please Try Another Question To Add</p>";
	
	 }?>
     
     
     
     <input type="button" value="Cancel"  onclick="closeme();" style="width:100px">

     
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
<?php
 }else{ // unauthorized test
 	require("unauthorized.php");	
	}
	
 }else{
 	include("assay.php");
 } ?>