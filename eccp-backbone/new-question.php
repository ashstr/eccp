<?php include_once("Library/config.php");
 if( !empty($_SESSION["user_admin"]) ){ ?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php echo $site_title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">

<!--Stylesheets-->

<script type="text/javascript" src="tinymce/tinymce.min.js"></script>



<script>
tinymce.init({
    selector: "textarea#ques",
    theme: "modern",

    height: 400,
    plugins: [
	    
         "jbimages advlist autolink lists link image charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor autosave"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image jbimages | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ],
	// ===========================================
// SET RELATIVE_URLS to FALSE (This is required for images to display properly)
// ===========================================
relative_urls: false

 });
 
 
 
 tinymce.init({
    selector: "textarea#Explanation",
    theme: "modern",

    height: 300,
    plugins: [
	    
         "jbimages advlist autolink lists link image charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor autosave"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image jbimages | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ],
	// ===========================================
// SET RELATIVE_URLS to FALSE (This is required for images to display properly)
// ===========================================
relative_urls: false

 }); 
</script>




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
<script type="text/javascript" src="./js/highcharts.js"> </script>
<script type="text/javascript" src="./js/exporting.js"> </script>
<script type="text/javascript" src="./js/jquery.quicksand.js"> </script>
<script type="text/javascript" src="./js/jquery.easing.1.3.js"> </script>
<script type="text/javascript" src="./js/jquery.tipsy.js"> </script>
<script type="text/javascript" src="./js/cl_editor/jquery.cleditor.min.js"> </script>
<script type="text/javascript" src="./uploadify/swfobject.js"></script>
<script type="text/javascript" src="./uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" src="./js/jquery.autogrowtextarea.js"></script>
<script type="text/javascript" src="./js/form_elements.js"></script>
<script type="text/javascript" src="./js/jquery.ui.core.js"></script>
<script type="text/javascript" src="./js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="./js/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="./js/jquery.ui.slider.js"></script>
<script type="text/javascript" src="./js/jquery.ui.progressbar.js"></script>
<script type="text/javascript" src="./js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="./js/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="./js/fullcalendar.js"></script>
<script type="text/javascript" src="./js/gcal.js"></script>
<script type="text/javascript" src="./js/bootstrap-modal.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./js/highlight.js"></script>
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
 		  if(isset($_POST["QID"]) && !empty($_POST["QID"])){
	   			$QID = intval($_POST["QID"]);	
				
				if( empty($_POST["sec"]) ){
			  		echo "<script>alert('Error-Select Section-ERROR[301]');</script>";  ?>
			 		<script>location.href= "new-question.php";</script><?php
			      }else{
	  			    include("action_q".$QID.".php"); 
			       }
				   
				   
		}else{
				echo "<script>alert('Technical. Error-Q303');</script>";  ?>
				<script>location.href= "new-question.php";</script>
 <?php  }
    }else{  ?>    
<!-- Drop list part -->                     
<form name="selects" id="selects" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET["qid"]; if( !empty($_GET["nums"]) ){ echo "&nums=".$_GET["nums"];} ?>" method="get" enctype="multipart/form-data">

    <div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title">
            	<span class="iconsweet">?</span>
            	<h5>Select Question Type From Drop-Down List</h5>
          </div>
            <div class="widget_body">
                <ul class="form_fields_container">



   
   

                	<li>
                	  <label>Question Type</label>
                      <div class="form_input">
 <select name="qid" id="qid" onChange="document.selects.submit();">
   <option>Please Select Question Type</option>
  <?php
    $count=1;
    if(isset($_GET["qid"]) && !empty($_GET["qid"])){
	   $qid = intval($_GET["qid"]);	
	 }

	$GetCommand = mysql_query("SELECT * FROM `question-type`");
      while($fetch = mysql_fetch_array($GetCommand)){?>
   
   <option value="<?php echo $fetch["ID"]; ?>" <?php if ( $qid == $fetch["ID"]) print "selected"; ?>><?php echo $fetch["title"]; ?></option>
   <?php
      $count=+1;
	 } ?>
</select>
          </div>
</li>
 
 

<!-- Number Of Option -->
<?php 
  if(isset($_GET["qid"]) && !empty($_GET["qid"]) ){
   if(intval($_GET["qid"]) == "2"){ ?>
 <li>
  <label>Number Of Option</label>
    <div class="form_input">
      <select name="nums" id="nums" onChange="document.selects.submit();">
        <?php for($i =1; $i<=6; $i++){?>
           <option value="<?php echo $i; ?>" <?php if ( $i == intval($_GET["nums"]) ) print "selected='selected'"; ?>><?php echo $i; ?></option>
           <?php } ?>
        </select>
 </div>
</li>
<?php } } ?>

                      
    </ul>
</div>
</div>
</div> 

</form> <!-- end Drop list part -->                     
    
    
    
    



<?php
  if(isset($_GET["qid"]) && !empty($_GET["qid"]) ){ ?>

<div class="one_wrap">
     <div class="widget">
        	<div class="widget_title"><span class="iconsweet">8</span>
              <h5>Question Description</h5>
            </div>
            <div class="widget_body">
                <ul class="form_fields_container">
<li>
   <label>Question Description </label>
     <div class="form_input">
   <?php
   	 $description1 = mysql_query("SELECT * FROM `question-type` WHERE `ID` = $qid ");
   	 $description2 = mysql_fetch_array($description1);  ?>
     <textarea name="about" id="about" cols="" rows="5" class="auto" readonly style="font-size:14px; color:#0066CC;"><?php echo $description2["disc"]; ?></textarea>
     </div>
  </li>
    </ul>
          </div>
        </div>
    
    </div>
    





    
    
    
    



    
    
<!--One_Wrap-->
 <div class="one_wrap">
  <form name="team" id="team" class="" action="<?php echo $_SERVER['PHP_SELF']; ?>?QUE=<?php echo $_GET["qid"]; ?>" method="post" enctype="multipart/form-data">
<?php
  if(isset($_GET["qid"]) && !empty($_GET["qid"])){
   $qID = intval($_GET["qid"]);
   }else{
   		$qID = 1;
	 }  ?>

     <div class="widget">
        	<div class="widget_title"><span class="iconsweet">8</span>
              <h5>Enter Your Question</h5>
            </div>
            <div class="widget_body">
            	<!--Activity Table-->
   	 <?php include("qid".$qID.".php"); ?>





 <!--Summit Table-->   
<div class="widget_body">
  <div class="action_bar" align="center">
   <input name="Update" type="submit" value="Insert This Now" class="button_small bluishBtn">
     	<input type="hidden" name="action" value="update">
     	<input type="hidden" name="QID"    value="<?=$qID;?>">
     	<?php
		   if(isset($_GET["nums"]) && !empty( $_GET["nums"]) ){ ?>
               <input type="hidden" name="nums" value="<?php echo $_GET["nums"];?>">
		  <?php }else{?>
          	   <input type="hidden" name="nums" value="1">
		  <?php } ?>
  </div>
 </div>
          </div><!-- End of widget _body Div -->
        </div>
     </form>
    </div> <!--<div class="widget">-->
    <?php } 
	
	
	}?>         
<!--</div>
</section>
</div>
-->
</body>
</html>
 <?php }else{
		@session_start();
		@session_destroy();

		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		echo "<script>location.href='login.php'</script>";
  } ?>
