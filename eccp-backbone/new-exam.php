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

	$etitle  = cleanIt($_POST["etitle"],'ALL');
	
	if(isset($etitle) && !empty($etitle)){
	
	/*######## Noraml Case ############*/
			$time = $_POST["time"];		
			$author = cleanIt($_POST['author'],'HTML2TXT');	
			$etitle  = cleanIt($_POST["etitle"],'ALL');
			$class  = cleanIt($_POST["class"],'ALL');
			$group  = cleanIt($_POST["group"],'ALL');

	/*######## Add Data To DataBase  ############*/
		   $INSERTME  = mysql_query(
			"INSERT INTO `exam`
				(`title`, 	`exam_period`, `author`, `date`, `to`,	   `group`,   `pending`) VALUES
				('$etitle', '$time', 	   '$author', NOW(), '$class', '$group',  '0');"); 

	/*######## Validate Add Data To DataBase  ############*/
		  if($INSERTME == 1){
			echo "<script>alert('This Process Done With Success');</script>";  ?>
						<script>location.href= "new-exam.php";</script>
						<?php }else{
				echo "<script>alert('Technical. Error');</script>";  ?>
						<script>location.href= "new-exam.php";</script>
						<?php  } 
						
	/*######## Error Case ############*/
		}else{
		echo "<script>alert('Technical. Error');</script>";  ?>
				<script>location.href= "new-exam.php";</script>
				<?php  } 
	}else{ ?>

        
<!--One_Wrap-->
  <form action="<?=$_SERVER['PHP_SELF']?>?action=listme" name="newexam" id="newexam" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">

    
    
  <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>New Exam </h5>
        </div>
  <div class="widget_body">
            	<!--Activity Table-->
<ul class="form_fields_container">
  
  <li>
   <label>Set Course</label>
   	<div class="form_input">
    	<select name="class" id="class"  onChange="document.newexam.submit();">
    	<option value="nons">Select Course</option>
         <?php $co01 = mysql_query("select * from `subject` where `parent_cat` = '0' ");
		 	   while($co02 = mysql_fetch_array($co01)){ ?>
        	    <option value="<?php echo $co02["ID"]; ?>" <?php if($_POST["class"]==$co02["ID"]){ echo "selected"; } ?>><?php echo $co02["title"]; ?></option>
         <?php } ?>
        </select>
    </div>
  </li>

<?php if($_REQUEST["action"]=="listme"){ // echo $_POST["class"];?>  
  <li>
   <label>Set Group</label>
   	<div class="form_input">
     <select name="group" id="group">
      <option value="nons">Select Group</option>
         <?php $co01 = mysql_query("select * from `groups` where `courseid` = '$_POST[class]' ");
		 	   while($co02 = mysql_fetch_array($co01)){ ?>
        		<option value="<?php echo $co02["ID"]; ?>"><?php echo $co02["UnConID"]; ?></option>
         <?php } ?>
        </select>
    </div>
  </li>
       	<input type="hidden" name="action" value="update">

<?php } ?>  


  <li>
   <label>Exam Title</label>
   	<div class="form_input">
    	<input id="etitle" name="etitle" class="tip_east" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>
  

  <li>
   <label>By Author</label>
   	<div class="form_input">
    	<input id="author" name="author" class="tip_east" type="text" value="<?php echo $_SESSION["user_admin_name"]; ?>" title="" readonly>
    </div>
  </li>
  
  <li>
   <label>Exam Time</label>
   	<div class="form_input">
    	<select name="time" id="time">
        	<option value="10"   > 10 Minutes</option>
        	<option value="20"   > 20 Minutes</option>
        	<option value="30"   > 30 Minutes</option>
        	<option value="45"   > 45 Minutes</option>
        	<option value="60"   > 1 Hours</option>
        	<option value="90"   > 1.5 Hours</option>
        	<option value="120"  > 2 Hours</option>
        	<option value="150"  > 2.5 Hours</option>
        	<option value="180"  > 3 Hours</option>
        	<option value="360"  > 6 Hours</option>
        	<option value="720"  > 12 Hours</option>
        	<option value="1440"  > 1 Days</option>
        	<option value="2880" > 2 Days</option>
        	<option value="4320" > 3 Days</option>
        	<option value="5760" > 4 Days</option>
        	<option value="7200" > 5 Days</option>
        	<option value="8640" > 6 Days</option>
        	<option value="10080" > 7 Days</option>
        </select>
    </div>
  </li>
<!--  
  <li>
   <label>Exam Pass</label>
   	<div class="form_input">
    	<input id="class" name="class" class="tip_east" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>
  
  <li>
   <label>Exam Title</label>
   	<div class="form_input">
    	<input id="class" name="class" class="tip_east" type="text" value="" title="Make Sure to enter valid entry">
    </div>
  </li>-->
  
  
  
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
   <input name="Update" type="submit" value="Record New Exam" class="button_small whitishBtn">

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
 	require("assay.php");
 } ?>