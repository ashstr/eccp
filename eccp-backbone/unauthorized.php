<?php
  include_once("Library/config.php"); 
	if( !empty($_SESSION["user_admin"]) ){ ?>
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
<meta charset="UTF-8"></head>
<body>
<!--Header-->
<!--Dreamworks Container-->
<div id="dreamworks_container">
  <div class="error_pages error_full_page"> <span class="iconsweet">s</span>
    <h1>Unauthorized Area</h1>
    <p> Stop Trying To Access This Section<br />
      This Forbidden Area For You ... </p>
    <a href="./index.php" class="redishBtn button_small" style="margin:5px;">Back to Home Page</a> </div>
</div>
</body>
</html>
<?php
  }else{
 	include("assay.php");
 } ?>