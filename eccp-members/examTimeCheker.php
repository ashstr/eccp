<?php
include_once("Library/config.php"); 

$uid=$_SESSION['UID'];
$eid=intval($_GET["eid"]);
$currentTime=new DateTime();

$result=mysqli_query("SELECT starting_time FROM user_exam_time WHERE uid=$uid and eid=$eid");
if(mysqli_num_rows($result)){
	$resultRow=mysqli_fetch_array($result);
	$examTimeResult=mysqli_query("SELECT exam_period FROM exam WHERE eid=$eid");
	$examTimeResultRow=$examTimeResult($$examTimeResult);
}

?>