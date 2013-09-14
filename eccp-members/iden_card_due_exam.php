<script src="js/countdown.js"></script>
<!--	<script src="js/info2.js"></script>-->
<?php include("examTimeCheker.php"); ?>
<?php
	//$timezone = "Asia/Riyadh";
	//if(function_exists('date_default_timezone_set')) { date_default_timezone_set('GMT+3'); }else{ "No"; }

	//echo date('d-m-Y H:i:s');
	//date_default_timezone_set('GMT+1');
	
	$myIdS = $_SESSION["UID"];
	
	// $_SESSION["hours"] = date("g")+2;
 // $_SESSION["hours"];
	// $_SESSION["minute"] = date("i");
 // $_SESSION["minute"];
	// $_SESSION["second"] = date("s");
 // $_SESSION["second"];
 
 
  switch ($Times){
    case "30" :
	$rangeHi="hour";	$width  = "188";	$height = "55";
	$day = "0";	$hour  = "0";	$minute  = "30";
	break;
		
	case "45":
		$rangeHi="hour";	$width  = "188";	$height = "55";
		$day = "0"; 		 $hour  = "0";	   $minute  = "45";
		break;

	case "60":
		/*$rangeHi="hour";	$width  = "188";	$height = "55";
		$day     = "0";	 $hour    = "2";	 $minute  = "60";
		break;*/

		$rangeHi="day";	$width  = "188";	$height = "15";
		$day     = "1";	$hour    = "23";	$minute  = "59";
		break;

	case "90":
		$rangeHi="hour";	$width  = "188";	$height = "55";
		$day = "0";		 $hour   = "1"; 	  $minute  = "30";
		break;

	case "120":
		$rangeHi="hour";	$width  = "188";	$height = "55";
		$day = "0";		 $hour  = "2";	   $minute  = "0";
		break;

	case "150":
		$rangeHi ="hour";	  $width  = "188";	$height  = "55";
		$day	 = "0";	    $hour   = "2"; 	  $minute  = "30";
		break;

	case "180":
		$rangeHi="hour";	$width  = "188";	$height = "55";

		$day = "0";	$hour  = "3";	$minute  = "0";
		break;

	case "360":
		$rangeHi="hour";	$width  = "188";	$height = "55";

		$day = "0";	$hour  = "6";	$minute  = "0";
		break;


	case "720":
		$rangeHi="hour";	$width  = "188";	$height = "55";
		$day = "0";		$hour  = "12";		$minute  = "0";
		break;


	case "1440":
		$rangeHi="day";	$width  = "188";	$height = "15";
		$day     = "1";	$hour    = "0";	$minute  = "0";
		break;



	case "2880":
		$rangeHi="day";	$width  = "188";	$height = "15";
		$day     = "2";	$hour    = "0";	$minute  = "0";
		break;


	case "4320":
		$rangeHi="day";	$width  = "188";	$height = "15";
		$day     = "3";	$hour    = "0";	$minute  = "0";
		break;


	case "5760":
		$rangeHi="day";	$width  = "188";	$height = "15";
		$day     = "4";	$hour    = "0";	$minute  = "0";
		break;


	case "7200":
		$rangeHi="day";	$width  = "188";	$height = "15";
		$day     = "5";	$hour    = "0";	$minute  = "0";
		break;


	case "8640":
		$rangeHi="day";	$width  = "188";	$height = "15";
		$day     = "6";	$hour    = "0";	$minute  = "0";
		break;


	case "10080":
		$rangeHi="day";	$width  = "188";	$height = "15";
		$day     = "7";	$hour    = "0";	$minute  = "0";
		break;
		
  	} // end switch 
  //echo $hour; ?>

 
<dl class="user_info_eXAM">
	<dt><a href="#">
  <img src="./uploaded/mem-profile/avatar.png" alt="" width="79" height="105" /></a></dt>
  <dd> <a class="welcome_user_eXAM" href="#">Welcome,  <strong><?php echo $_SESSION["my_name"]; ?></strong></a>

<script>
	
  var myCountdown1 = new Countdown( {
			 width    : <?php echo $width; ?>,      // Defaults to 200 x 30 pixels, you can specify a custom size here
			 width   : <?php echo $width; ?>,       //
			// inline	 	: true,     // If inline, text will wrap around object, otherwise this countdown object will consume the entire "line"
			   style   	: "flip", // flip / boring boring whatever (only "flip" uses image/animation)
			   time: parseInt(<?php echo $timeLeft ?>), 

			  rangeHi  : "<?php echo $rangeHi; ?>",   // The highest unit of time to display
			  year : <?php echo date("Y"); ?>,
			  month : <?php echo date("n"); ?>,
			  day : <?php echo $day; ?>,
			  hour : <?php echo $hour; ?>,
			  ampm : "<?php echo date("a"); ?>",
			  minute : <?php echo $minute; ?>,
			  second : 0 // < - no comma on last item!!
   	}
			);
			setTimeout(function(){
				//##############################################
				//##############################################
				//##############################################
				//####Enter The Function Name Here (Calling)####
				//##############################################
				//##############################################
			},myCountdown1.af.time*1000);
			
			 </script> </dd>
</dl>
<br/>
 <?php // date("g")+1; ?>