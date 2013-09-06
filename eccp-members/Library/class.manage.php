<?php
ini_set('display_errors','0');  

// Check Login 
function login($UID,$Pass){
	if(!empty( $UID )){
		$resultq=mysql_query("SELECT * from `employ` where `EmpID`='$UID' AND `pass`='$Pass' ") or die( mysql_error() );
		
 if(mysql_num_rows($resultq) == 0){?>
	<script language="javascript" type="text/javascript">
	  alert("Sorry this Account was Not Found out in our registry \n Please Enter Correct Account to \n Access Successfully Login ");
	    </script>
        
		<script>history.back();</script>
        
 <?php }else{
 // the login in success case
	    $rowq=mysql_fetch_array($resultq);
  		$UID = $_SESSION["EID"] = $rowq["EmpID"];
  		$EName = $_SESSION["Fname"] = $rowq["Fname"];
		echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
	    /* echo "<script>location.href='admin.php'</script>"; */
	 }
   //return;
  }else{
  	// this was empty
  }
 }// end function
  
########################################################################


function CheckExistDataEmp($table, $FieldName, $FieldVal, $Field3, $Field4, $Field5, $Field6, $Field7, $Field8){
 $Command = mysql_query("select * from $table WHERE `$FieldName` ='$FieldVal' AND `$Field3` ='$Field4' AND `$Field5`= '$Field6' AND `$Field7`= '$Field8'") or die (mysql_error());
  if($flag = mysql_num_rows($Command) > 0){
  return $flag;
  }
}


function CheckExistData($table, $FieldName, $FieldVal, $Field3, $Field4){
  $Command = mysql_query("select * from $table WHERE  `$FieldName` = '$FieldVal' AND `$Field3` = '$Field4' ") or die (mysql_error());
  if($flag = mysql_num_rows($Command) > 0){
  return $flag;
  }
}

########################


function My_Image($ME){
    if (!empty($ME['name'])) {
        $i = time();
        $exe = explode(".", $ME['name']);
        $arr =array("JPEG","JPG","GIF","PNG");;
        if (in_array(strtoupper($exe[1]), $arr)) {
            $filename = $i . "." . $exe[1];
            if(move_uploaded_file($ME['tmp_name'], "../articals/" . $filename)){
			   return $filename;    
            }else{
               return $filename = "NONE";
			exit;
            }
        } else {
			//return "'Please select a jpg, jpeg, gif, or png image to use as thumbnail'";
			return $filename = "NONE";
			//exit;			
        }
    }
 }// End Function


$error="<br><br><br><br><br><br><br><div align='center'><i> Thanks We Handeling this Error You Will Back To Main Page Now</i><br>
<br><img src='images/Dulex-Site.png' width='537' height='88' /></div>
<meta http-equiv='refresh' content='9; url=index.php'>";


function cleantmp() {

$periods = array(
'decade' => 315569260,
'year'   => 31556926,
'month'  => 2629744,
'week'   => 604800,
'day'    => 86400,
'hour'   => 3600,
'minute' => 60,
'second' => 1);


$seconds_old = 604800;
$directory = "Data/temp";

if( !$dirhandle = @opendir($directory) )
	   return;
while( false !== ($filename = readdir($dirhandle)) ) {
	   if( $filename != "." && $filename != ".." ) {
			   $filename = $directory. "/". $filename;
			   if( @filemtime($filename) > (time()-$seconds_old) )
					   @unlink($filename);
	   }
}
}




function freeRTE_Preload($content){
	// Strip newline characters.
	$content = str_replace(chr(10), " ", $content);
	$content = str_replace(chr(13), " ", $content);
	$content = str_replace("'", "\'", $content);
	// Replace single quotes.
	$content = str_replace(chr(146), chr(39), $content);
	// Return the result.
	return $content;
}




function iif($condition, $if_true, $if_false){
    if($condition){
        return $if_true;
    }else{
        return $if_false;
    }
} 


function connect_data ($server,$user_db,$pass_db,$dbname){ 
  global $Connect;
	$Connect=mysql_connect($server,$user_db,$pass_db) or die("<font color='red'>Error db Con</font>");
	mysql_select_db($dbname);
return;
}



function get_data($table,$conn){
	$sql1="select * from $table $conn";
	$rs=mysql_query($sql1) or die(mysql_error());
	$Rest=mysql_fetch_array($rs);
	$count=mysql_num_rows($rs);
return $count;
//return $Rest;

}



function smallimage($name,$newname,$newx,$newy){
	$e=explode(".",$name);
		switch (strtoupper($e[count($e)-1])){
		case "JPEG" :
		$im=imagecreatefromjpeg($name);
	break;

	case "JPG":
		$im=imagecreatefromjpeg($name);
		break;

	case "GIF":
		$im=imagecreatefromgif($name);
		break;

	case "PNG":
		$im=imagecreatefrompng($name);
		break;
} // end switch

$img_s=imagecreatetruecolor($newx,$newy);
$width=imagesx($im);
$heiht=imagesy($im);
imagecopyresampled($img_s,$im,0,0,0,0,$newx,$newy,$width,$heiht);
imagegif($img_s,$newname);
imagedestroy($im);
imagedestroy($img_s);
} // end function


function checkadmin($ID,$dept){
	$sa="select * from `admin` where `ID`='$ID' and $dept='YES'  ";
	$er=mysql_query($sa) or die(mysql_error());
	if(mysql_num_rows($er)!=0){
	return true;
	}else{
	return false;
	}
}




/******************************************************************************** */

function get_uniqid(){
// // $better_token1 = md5(uniqid(rand(), true));
 	$better_token = rand();
 	$EmpId = $better_token;
//	$ID = mysql_query("SELECT `EmpID` FROM `employe` WHERE `EmpID` = CONVERT( _utf8 '$EmpId' USING latin1 ) COLLATE latin1_swedish_ci");
//	 $res = if(mysql_num_rows($ID)>0){
//	  $EmpId ="";
//	 	// continue;
//	 }
//	 
	 return $EmpId;
		}// End get_uniqid() Function.

  $EmpId = get_uniqid();
  
//  echo '<meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />';




function LoadQuestionForm($name){
 switch ($name){
		case "JPEG" :
		$im=imagecreatefromjpeg($name);
	break;

	case "JPG":
		$im=imagecreatefromjpeg($name);
		break;

	case "GIF":
		$im=imagecreatefromgif($name);
		break;

	case "PNG":
		$im=imagecreatefrompng($name);
		break;
} // end switch

} // end function



	
   function generateCodeBig($length) {
       $chars = "abcdefghijklmnopqrstuv$wxyzA&BCDEFGHIJKLMN-OPRQSTUVWXYZ0123456789_";
       $code = "";
       $clen = strlen($chars) - 1;  //a variable with the fixed length of chars correct for the fence post issue
       while (strlen($code) < $length) {
           $code .= $chars[mt_rand(0,$clen)];  //mt_rand's range is inclusive - this is why we need 0 to n-1
       }
       return $code;
   }
    // echo generateCode(); 
	// echo rand(11111, 99999);
	

   function getQustaion($ID){
	   $TheQustaion= "";
	   
	   $GetQTitle   = mysql_query("SELECT * FROM  `questions` WHERE `ID` = '$ID'");
	   $GetQTitleR  = mysql_fetch_array($GetQTitle);
       $TheQustaion = $GetQTitleR["ques"];
	   return html_entity_decode($TheQustaion);
   }

?>