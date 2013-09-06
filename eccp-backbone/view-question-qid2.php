<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<ul class="form_fields_container">


  <li>
   <label>Author ID</label>
     <div class="form_input">
    	<input id="author" name="author" class="in_submitted" type="text" value="<?php echo $_SESSION["user_admin"]; ?>" title="" readonly="readonly">
     </div>
  </li>                    


<li>
   <label>Select Course</label>
     <div class="form_input">
     <select name='sec' id="sec" dir="ltr" size="16" style="width:600px">
<?php
		 $Sql = mysql_query("select * from `subject` where `parent_cat` = '0' ");
		   while ($Row = mysql_fetch_array($Sql)){
			  $ID_main=$Row["ID"];
				echo"<option value='".$Row["ID"]."' >".$Row["title"];
				$Sql2 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
				$Result2 = mysql_query($Sql2);
				
				
				
while ($Row2 = mysql_fetch_array($Result2)){
	$ID_main=$Row2["ID"];
		echo "<option value='$Row2[ID]' >$Row[title] : $Row2[title]";
		$Sql3 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
		 $Result3 = mysql_query($Sql3);

		while ($Row3 = mysql_fetch_array($Result3)){
	  $ID_main=$Row3["ID"];
				echo "<option value='$Row3[ID]' >$Row[title] : $Row2[title] : $Row3[title]";
				$Sql4 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
				$Result4 = mysql_query($Sql4);
		
			while ($Row4 = mysql_fetch_array($Result4)){
				$ID_main=$Row4["ID"];
				echo "<option value='$Row4[ID]' >$Row[title] : $Row2[title] : $Row3[title] : $Row4[title]";
				$Sql5 = "select * from `subject`  where `parent_cat` ='$ID_main' ";
				$Result5 = mysql_query($Sql5);
		
			  while ($Row5 = mysql_fetch_array($Result5)){
				  $ID_main=$Row5["ID"];
				  echo "<option value='$Row5[ID]' >$Row[title] : $Row2[title] : $Row3[title] : $Row4[title] : $Row5[title]";
				  $Sql6 = "select * from `subject` where `parent_cat` ='$ID_main' ";
				  $Result6 = mysql_query($Sql6);
		
				while ($Row6 = mysql_fetch_array($Result6)){
					   $ID_main=$Row6["ID"];
					  echo "<option value='$Row6[ID]' >$Row[title] : $Row2[title] : $Row3[title] : $Row4[title] : $Row5[title] : $Row6[title]";
					  $Sql7 = "select * from `subject`  where `parent_cat` ='$ID_main' ";
					  $Result7 = mysql_query($Sql7);

				   while ($Row7 = mysql_fetch_array($Result7)){
						  $ID_main=$Row7["ID"];
						  echo "<option value='$Row7[ID]' >$Row[title] : $Row2[title] : $Row3[title] : $Row4[title] : $Row5[title] : $Row6[title] : $Row7[title]";
	}// End While
  }// End While
}
}
}
}
 } ?>
    </select>
     </div>
  </li>
  
   <li>
         <label><center>Enter Question Here</center></label>

 <div style="margin:30px 10px 10px 10px;">
	<textarea name="ques" id="ques" rows="8" cols="60"><div align="right">اضغط على ايقونة صورة ثم اختار تصفح</div></textarea>
    <?php //$basePath = "http://novascotia-inc.ca/eccp/ECCP-BackBone/"; ?>
<script type="text/javascript" src="<?php echo $domain_site; ?>ckeditor/ckeditor.js?t=A06B"></script>
<script type="text/javascript">
  CKEDITOR.replace( 'ques',
{
	filebrowserBrowseUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo $domain_site; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	filebrowserWindowWidth : '800',
 	filebrowserWindowHeight : '700',
 	language : 'ar'
});
</script>
         </div>
</li>

  <li>
   <label>Right Answer</label>
     <div class="form_input">
    	<input id="correct" name="correct" class="in_submitted" type="text" value="" title="Make sure to enter right answer">
     </div>
  </li>                                        
 
  <li>
     	 <div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">C</span><h5>Answer Assurance</h5></div>
            <div class="widget_body">
                <div id="container">
                	<textarea  id="wyswig" name="input"></textarea>
                </div>
            </div>
        </div>
    </div>
  </li>                    

 
<?php

  if(isset($_GET["nums"]) && !empty($_GET["nums"]) ){
	  
   $NumVal = intval($_GET["nums"]);
  
   for($initiator=2; $initiator <= $NumVal; $initiator++){ ?> 
      <li>
       <label>Choices <?php echo $initiator; ?></label>
        <div class="form_input">
            <input id="op<?php echo $initiator; ?>" name="op<?php echo $initiator; ?>" class="in_error"  type="text" value="" title="Make Sure to enter valid entry">
        </div>
      </li>
     <?php } 
	 
	 
	 } ?> 

  
  <li>
   <label>Tips & Help</label>
     <div class="form_input">
     <textarea name="tips" id="tips" cols="10" rows="5"  class="tip_east"></textarea>
     </div>
  </li>                    

          </ul>