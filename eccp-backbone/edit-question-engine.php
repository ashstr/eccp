<?php 
  $author = $_SESSION["user_admin"];
	
    if(isset($_REQUEST["Mistake"]) && !empty( $_REQUEST["Mistake"]) ){
	 
	 
  
  	 /* ###### Help & tips ######  */
	  $tips         =  cleanIt($_POST["wyswig"],'HTML2TXT');
  //  echo $QID; exit;
	  $INSERT_tips  =  mysql_query("UPDATE `mc_so` SET `tips` = '$tips' WHERE `flag` = '2' AND `qid` = '$QID' ");

  }else{
  	 echo "Error Load E-03";
  	/* echo "Error Update Help & tips Case "; */
  }

  if($INSERT_tips == 1){
	echo "<script>alert('This Process Done With Success');</script>";  ?>
           <div class="widget_body">
             <h5 style="margin:10px 10px 60px 10px; font-size:14px;" align="center">Your Question Was Add Successfully</h5>
             
             <center><img src="images/colorbox/loading.gif" />
             </center>
             <br /><br /><br /><br />
           </div>
         <?php  } ?>