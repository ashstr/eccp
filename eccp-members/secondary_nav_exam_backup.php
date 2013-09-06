<nav id="secondary_nav"> 
<?php include("iden_card_due_exam.php"); ?>
 <ul>
 <?php // load qustaion in Left Side
	
	 while($Get0F2 = mysql_fetch_array($Get0F1) ){
	  
	  $GetQTitle   = mysql_query("SELECT * FROM  `questions` WHERE `ID` = '$Get0F2[qid]' ");
	  $GetQTitleR  = mysql_fetch_array($GetQTitle); ?>
     
	  <li><?php echo $GetQTitleR["ID"]; ?> - 
       <a href="view-exam.php?q=<?php echo $GetQTitleR["ID"]; ?>&es=<?php echo $examID9; ?>"
       class="project_title" target="_self"><span class="iconsweet">!</span>
       
       <!--<a href="view-exam.php?SESSIONID=<?php ///echo rand(11111111, 999999999);  echo "&shortlivedNumber=ECCP2013New&MCV=".generateCodeBig(60); ?> &q=<?php //echo $GetQTitleR["ID"]; ?>&es=<?php //echo $exaMId; ?>&PartID=<?php //echo rand(11111111, 999999999); echo generateCodeBig(40); ?>"
       class="project_title" target="_self"><span class="iconsweet">!</span>-->
	   <?php
	   		$position=25; // Define how many character you want to display.
	   		echo substr(strip_tags(html_entity_decode($GetQTitleR["ques"]) ), 0, $position); ?>
       </a>
      </li>
        
   <?php } 
   
   
   
   ?>
 </ul>
</nav>