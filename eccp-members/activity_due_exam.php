<?php include_once("Library/config.php"); 
	if( !empty($_SESSION["UID"]) ){	   
		$NovaUIDValus = $_SESSION["UID"]; 	 // This User ID
		$examID9      = intval($_GET["es"]);  // Exam ID
		$query=mysql_query("SELECT COUNT( AID ) FROM QandA WHERE UID =  '$NovaUIDValus' AND exID ='$examID9'");
		$res = mysql_fetch_array ($query);
		$ans=$res[0];
	}
?> 

<div id="activity_stats">
        	<h3 style="vertical-align:baseline;">Exam States</h3>
            <div class="activity_column"> 
            	<span class="iconsweet">H</span>
                <span class="big_txt rd_txt"><?php echo $QnumsR; ?></span>Total Quetions &nbsp;&nbsp;

            	<span class="iconsweet">=</span> <span class="big_txt gr_txt"><?php echo $ans; ?></span>Answered
                
                </div>

<div class="activity_column">
             	
                <span class="iconsweet">S</span> Total Exam Time
					<?php
					if($day != 0){
						?><span class="big_txt rd_txt"><?php echo $day . "</span> Day's";
						}

						if($hour != 0){
						?><span class="big_txt rd_txt"><?php echo ",&nbsp;" . $hour . "</span> Hour's";
						}

						if($minute != 0){
 ?>
                        <span class="big_txt rd_txt"><?php echo ",&nbsp;" . $minute; ?></span> Minute's
					   <?php } ?>

            	<input name="Update" type="submit" value="Submit Exam" class="button_small redishBtn" align="right" style="margin-left:60px;">

			</div> 
          </div>

<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<div class="content_pad">
    <div id="progressbarWrapper" style="height:30px;" >
        <div id="progressbar"  style="height:100%;"></div>
    </div>
</div>
<script>
$( "#progressbar" ).progressbar({
	value: 59
});
$( "#progressbar" ).css({background: '#FFF000'});
</script>-->