<?php include_once("Library/config.php");
		if( !empty($_SESSION["user_admin"]) ){
			if(checkadmin($_SESSION["user_admin"],"allow_add_exam")){
			   require("Library/cleanIt.php");  ?>
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
    <?php $flage = 5; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php include_once("secondary_nav_question.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="update"){


	$time = $_POST["time"];
	$author = $_POST["author"];
	$etitle = $_POST["etitle"];
	$class  = cleanIt($_POST["class"],'ALL');
	$group  = cleanIt($_POST["group"],'ALL');

   $INSERTME  = mysql_query(
   	"INSERT INTO `exam`
		(`title`, `exam_period`,`author`, `date`, `to`,`group`,`pending`) VALUES
		('$etitle', '$time', '$author', NOW(), '$class', '$group', '1');"); 

  if($INSERTME == 1){
	echo "<script>alert('This Process Done With Success');</script>";  ?>
				<script>location.href= "new-exam.php";</script>
				<?php }else{
		echo "<script>alert('Technical. Error');</script>";  ?>
				<script>location.href= "new-exam.php";</script>
				<?php  } 






		}else{
		$eID 			= intval($_GET["point"]);
		$GetData  		= mysql_query("SELECT * FROM `exam` where `ID` = '$eID' ORDER BY `ID` DESC  LIMIT 0 , 1");
		$GetFeatchData  = mysql_fetch_array($GetData); ?>
        
<!--One_Wrap-->
  <form action="<?=$_SERVER['PHP_SELF']?>?action=listme" name="newexam" id="newexam" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">

    
    
  <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>View Exam </h5>
        </div>
  <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">
  
  <li>
   <label>Exam Title</label>
   	<div class="form_input">
    	<input id="etitle" name="etitle" class="tip_east" type="text"  value="<?php echo $GetFeatchData["title"]; ?>" title="">
    </div>
  </li>
  

  <li>
   <label>By Author</label>
   	<div class="form_input">
    	<input id="author" name="author" class="tip_east" type="text"  value="<?php echo $GetFeatchData["author"]; ?>" title="" readonly>
    </div>
  </li>
  
  <li>
   <label>Course</label>
   	<div class="form_input">
    	<select name="class" id="class" disabled>
    	<option value="nons">Select Course</option>
         <?php $A1 = mysql_query("select * from `subject` where `parent_cat` = '0' ");
		 	   while($A2 = mysql_fetch_array($A1)){ ?>
        	    <option value="<?php echo $co02["ID"]; ?>" <?php if($GetFeatchData["to"] == $A2["ID"]){ echo "selected"; } ?>><?php echo $A2["title"]; ?></option>
         <?php } ?>
        </select>
    </div>
  </li>

<?php if($GetFeatchData["title"]){ // echo $_POST["class"];?>  
  <li>
   <label>Group</label>
   	<div class="form_input">
     <select name="group" id="group" disabled>
      <option value="nons">Select Group</option>
         <?php $B1 = mysql_query("select * from `groups` where `courseid` = '$GetFeatchData[to]' ");
		 	   while($B2 = mysql_fetch_array($B1)){ ?>
        		<option value="" <?php if($GetFeatchData["group"] == $B2["ID"]){ echo " selected"; } ?>><?php echo $B2["ID"]; ?></option>
         <?php } ?>
        </select>
    </div>
  </li>
       	<input type="hidden" name="action" value="update">

<?php } ?>  

  <li>
   <label>Exam Time</label>
   	<div class="form_input">
    	<select name="time" id="time" disabled>
        	<option value=""> <?php echo $GetFeatchData["exam_period"]; ?> Minutes</option>
        </select>
    </div>
  </li>

              
 </ul>




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
 	require("assay.php");
 } ?>