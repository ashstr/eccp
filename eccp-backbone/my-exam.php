<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <!--Basic Modal Start-->
	<div class="modal hide" id="myModal" >
    <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Inactive Subject</h3>
    </div>
    <div class="modal-body">
              <p>Sorry This Inactive Quiz</p>
              <p>This Exam Was Inactive, Please If You Feel This Was Technical Proplem Please Contact With System Administrator Immediately.</p>
    </div>
    <div class="modal-footer">
    <a data-dismiss="modal" class="bluishBtn button_small" href="#">Close This Message Now.</a>
   
    </div>
    </div>
    <!--Basic Modal End-->
    
    
    
    
    
    
    
<div class="one_wrap">

    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Activity across your course</h5></div>
            <div class="widget_body">
            	<div class="project_sort">
                	<ul class="filter_project">
                       <?php $load = mysql_query("SELECT * FROM  `exam` ");   $nums = mysql_num_rows($load); ?>
                        <li class="segment selected"><a class="incomplete" href="#">Online Examination Subject<span class="count"><?php echo $nums; ?></span></a></li>
                     </ul>
                     <ul class="project_list">
<?php   if($nums>0){
		    while($mfatech = mysql_fetch_array($load)){?>
                        <li data-id="id-7" data-type="incomplete">
                        	<span class="project_badge blue iconsweet">C</span>
                            
       <?php if($mfatech["pending"]==0){ // cheack if the exam is in-active?>
			   <a data-toggle="modal" href="#myModal" class="project_title">
			<?php }else{ ?>
			  <a href="view-exam.php?SESSIONID=<?php echo rand(11111111, 999999999);  echo "&MCV=".generateCodeBig(40); ?>&q=<?php echo $result["ID"]; ?>&es=<?php echo $mfatech["ID"]; ?>&PartID=<?php echo rand(11111111, 999999999); echo generateCodeBig(40); ?>" class="project_title" target="_blank"> <?php  } 
			  
			   echo $mfatech["title"]; ?>
                            <p style="color:#003399; padding-top:4px;">Time : <?php echo $mfatech["exam_period"]; ?>Minutes
                            <br/>Class : <?php echo $mfatech["to"]; ?></p></a>
                            <a href="#" class="assigned_user"><span class="iconsweet">a</span><?php echo $mfatech["author"]; ?></a>                        
                        </li> 
                        <?php } // end while 
							} ?> 
                                                                                         
                                                                                        
                     </ul>
                </div>
            </div>
        </div>

    </div>


