<?php
include_once("Library/config.php");  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>ECCP - VirtualOffice - NovaScotia-Inc.ca</title>
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
<script type="text/javascript" src="./js/highcharts.js"> </script>
<script type="text/javascript" src="./js/exporting.js"> </script>
<script type="text/javascript" src="./js/jquery.quicksand.js"> </script>
<script type="text/javascript" src="./js/jquery.easing.1.3.js"> </script>
<script type="text/javascript" src="./js/jquery.tipsy.js"> </script>
<script type="text/javascript" src="./js/cl_editor/jquery.cleditor.min.js"> </script>

<!-- <script type="text/javascript" src="./uploadify/swfobject.js"></script>
     <script type="text/javascript" src="./uploadify/jquery.uploadify.v2.1.4.min.js"></script>
     <script type="text/javascript" src="./js/jquery.autogrowtextarea.js"></script> -->

<script type="text/javascript" src="./js/form_elements.js"></script>
<!--<script type="text/javascript" src="./js/jquery.ui.core.js"></script>
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
--><script type="text/javascript" src="./js/highlight.js"></script>
<script type="text/javascript" src="./js/main.js"> </script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-image: url(images/Neuron2s.jpg);
}
-->
</style></head>


<body id="login_container">
<p>str</p>
<!--Dreamworks Container-->
<div id="dreamworks_container">
  <div id="login">
<?php if($_REQUEST["action"]=="login"){ 
		
 if(!empty($_POST["user_name"])){
   $sa=mysql_query("select * from `memeber` where `UID`='$_POST[user_name]' and `Upass`='$_POST[password]'") or die(mysql_error());
     if(mysql_num_rows($sa)>0){
	
	   $ro=mysql_fetch_array($sa);
			$_SESSION["UID"] 	  = $ro["UID"];
			$_SESSION["path"] 	 = $ro["path"];
			$_SESSION["my_name"]  = $ro["name"];

		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
		echo "<script>location.href='index.php'</script>";
  }else{ echo "This User Not Accessible"; }
 }
		
		}else{ ?>
    	<center><img src="images/big_logo.png" /></center>
<form action="" method="post"  enctype="application/x-www-form-urlencoded">
  <div class="input_box"> <span class="iconsweet">a</span>
    <input placeholder="User ID" name="user_name" type="text" id="user_name" value="<?php echo $_SESSION["user_admin_name"]; ?>"></div>
            <div class="input_box"> <span class="iconsweet">y</span>
                <input placeholder="Password" name="password" type="password" id="password">
            </div>
            <div class="input_box"> <span class="iconsweet">^</span>
                <input placeholder="Your IP : [ <?php echo $_SERVER['REMOTE_ADDR']; ?> ]" name="password2" type="password" id="password2">
            </div>
          <div> <a class="forgot_password" href="#">Have you forgotten your password?</a> <input name="" type="submit" value="Login"></div>
        <input type="hidden" name="action" value="login">
       </form>
    <?php } ?>
  </div>

</div>

</body>
</html>