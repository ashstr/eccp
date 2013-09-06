<?php
 require("Library/config.php");
 	if( !empty($_SESSION["user_admin"]) ){
	 	  if(checkadmin($_SESSION["user_admin"],"allow_new_course")){ ?>
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
	   		include("action-new-subsubject.php");
		}else{ ?>

        
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">

    
    
  <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>New Subject Access</h5>
        </div>
  <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">
  <li>
   <label>Sub-Subject Title</label>
   	<div class="form_input">
    	<input id="ssub" name="ssub" class="tip_east" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>
  
  
<li>
   <label>Parent Of</label>
     <div class="form_input">
     <select name='cat' id="cat" dir="ltr" size="16" style="width:600px">
<?php
		 $Sql = mysql_query("select * from `subject` where `parent_cat` = '0' ");
		   while ($Row = mysql_fetch_array($Sql)){
			  $ID_main=$Row["ID"];
				echo"<option value='".$Row["ID"]."' >".$Row["title"];
				$Sql2 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
				$Result2 = mysql_query($Sql2);
				
				
				
while ($Row2 = mysql_fetch_array($Result2)){
	$ID_main=$Row2["ID"];
		echo "<option value='$Row2[ID]' >$Row[title] : $Row2[title]";
		$Sql3 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
		 $Result3 = mysql_query($Sql3);

		while ($Row3 = mysql_fetch_array($Result3)){
		$ID_main=$Row3["ID"];
				echo "<option value='$Row3[ID]' >$Row[title] : $Row2[title] : $Row3[title]";
				$Sql4 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
			$Result4 = mysql_query($Sql4);
		
			while ($Row4 = mysql_fetch_array($Result4)){
				$ID_main=$Row4["ID"];
				echo "<option value='$Row4[ID]' >$Row[title] : $Row2[title] : $Row3[title] : $Row4[title]";
				$Sql5 = "select * from `subject`  where `parent_cat` ='$ID_main' ";
				$Result5 = mysql_query($Sql5);
		
			  while ($Row5 = mysql_fetch_array($Result5)){
				  $ID_main=$Row5["ID"];
				  echo "<option value='$Row5[ID]' >$Row[title] : $Row2[title] : $Row3[title] : $Row4[title] : $Row5[title]";
				  $Sql6 = "select * from `subject` where `parent_cat` ='$ID_main' ";
				  $Result6 = mysql_query($Sql6);
		
				while ($Row6 = mysql_fetch_array($Result6)){
					   $ID_main=$Row6["ID"];
					  echo "<option value='$Row6[ID]' >$Row[title] : $Row2[title] : $Row3[title] : $Row4[title] : $Row5[title] : $Row6[title]";
					  $Sql6 = "select * from `subject`  where `parent_cat` ='$ID_main' ";
					  $Result6 = mysql_query($Sql6);

				   while ($Row7 = mysql_fetch_array($Result6)){
						  $ID_main=$Row7["ID"];
						  echo "<option value='$Row7[ID]' >$Row[title] : $Row2[title] : $Row3[title] : $Row4[title] : $Row5[title] : $Row6[title] : $Row7[title]";
	}// End While
  }// End While
}
}
}
 }
 } ?>
    </select>
     </div>
  </li>



  
  
  
    <!--<li>
   <label>Photo Cover</label>
     <div class="form_input">
      <div align="right"><input type="file" name="picG" id="picG"></div>
    </div>
  </li>-->                    


              
          </ul>
				
                


<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Record New Subject Now" class="button_small whitishBtn">
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
<?php
 }else{ // unauthorized test
 	require("unauthorized.php");	
	}
	
 }else{
 	include("assay.php");
 } ?>