<?php 
 include("Library/cleanIt.php");
	$author = $_SESSION["user_admin"];
	
  if(isset($_REQUEST["nums"]) && !empty( $_REQUEST["nums"]) ){ // IF 001 // Number Of Options Will Be Showing
	 $loops = intval($_REQUEST["nums"]);


  		$ques  = cleanIt($_POST["ques"],'HTML2TXT');
		$cat   = cleanIt($_POST["sec"],'NO_HTML'); // this the course ID Will Be add to links 
		
	 	$question    =  mysql_query(" INSERT INTO `questions` (`ques`,`cat`, `date`, `pending`) VALUES ('$ques','$cat', NOW(), '0'); "); 

		// Get Last ID For Last Question Insert
		 $GelLastID   =  mysql_query("SELECT * FROM `questions` ORDER BY `ID` DESC LIMIT 0 , 1 ");
		 $GetlastIDF  =  mysql_fetch_array($GelLastID);
		 $LQID = $GetlastIDF["ID"];


		 /* #####  Answer Assurance (Explanation)  #######  */
		  $ans_exp         = cleanIt($_POST["Explanation"],'HTML2TXT');
		  $ans_expSQL	  =  mysql_query("INSERT INTO `mc_so` (`qid`, `option`, `flag`) VALUES ('$LQID', '$ans_exp', '4')");
		
		 /* #####  Correct Answer #######  */
		  $correct         = cleanIt($_POST["correct"],'ALL');
		  $INSERT_correct  =  mysql_query("INSERT INTO `mc_so` (`qid`, `option`, `flag`) VALUES ('$LQID', '$correct', '3')");
		
  	 	/* ###### Help & tips ######  */
		  $tips         =  cleanIt($_POST["tips"],'NO_HTML');
		  $INSERT_tips  =  mysql_query("INSERT INTO `mc_so` (`qid`, `tips`, `flag`) VALUES ('$LQID', '$tips', '2')");

 	/* ###### Option Wrong Answer ######  */
  	for($m=1; $m<=$loops; $m++){
	$new = $_POST["op".$m];
	 if(!empty($new)){
		  $new  = cleanIt($new,'ALL');
		   $INSERTME = mysql_query("INSERT INTO `mc_so` (`qid`, `option`, `flag`) VALUES ('$LQID', '$new', '1');");
		}// Enf IF Condition.
	} // End FOR.
			
// End IF 001
    }

  if($question == 1){
	echo "<script>alert('This Process Done With Success');</script>";  ?>
        <div class="one_wrap fl_left">
          <div class="widget">
           <div class="widget_title">
             <span class="iconsweet">8</span><h5>Result</h5>
           </div>
           
           <div class="widget_body">
             <h5 style="margin:10px 10px 60px 10px; font-size:14px;" align="center">Your Question Was Add Successfully</h5>
             
             <center><img src="images/UIHub_dll_37.png" /></center>
             <br /><br /><br /><br />
           </div>
            </div>
        </div> <?php  } ?>