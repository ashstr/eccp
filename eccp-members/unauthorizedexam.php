<?php
  include_once("Library/config.php"); 
	if( !empty($_SESSION["UID"]) ){ ?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php echo $site_title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<!--Stylesheets-->
<link rel="stylesheet" href="./css/main.css" />
<link rel="stylesheet" href="./css/typography.css" />
<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<script type="text/javascript" src="./js/jquery.min.js"> </script>
<script type="text/javascript" src="./js/main.js"> </script>
<script type="text/javascript">
        		function closeme(){
					close();
					}
			</script>
<meta charset="UTF-8"></head>
<body>
<!--Header-->
<!--Dreamworks Container-->
<div id="dreamworks_container">
  <div class="error_pages error_full_page"> <span class="iconsweet">s</span>
    <h1>Sorry, This Unauthorized Exam</h1>
    <p> Stop Trying To Access This Exam. Our Record Mention You Are Not Allow To Open It Again <br />
      This Forbidden Exam For You ... </p>
    <input type="button" value="Done, Close This Hint"  onclick="closeme();"  class="button_small bluishBtn fl_center" style="margin:50px;">
  </div>
</div>
</body>
</html>
<?php
  }else{
 	include("assay.php");
 } ?>