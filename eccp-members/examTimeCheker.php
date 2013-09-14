<?php

$uid = $_SESSION["UID"];
$eid = $_SESSION["eid"];

$local = localtime();
$local =$local[0]+$local[1]*60 +$local[2]*3600;

$UETresult = mysql_query("SELECT starting_time FROM user_exam_time WHERE uid=$uid and eid=$eid");
if (mysql_num_rows($UETresult) != 0) {
	$UETRow = mysql_fetch_array($UETresult);
	$examTime= mysql_query("SELECT exam_period FROM exam WHERE eid=$eid");
	$examTime = mysql_fetch_array($examTime);
	$timeLeft = $examTime[0]*60 + $UETRow[0] - $local;
} else {
	mysql_query("insert into starting_time (uid,eid,starting_time) values ($uid,$eid,$local)");
	$examTime = mysql_query("SELECT exam_period FROM exam WHERE eid=$eid");
	$examTime = mysql_fetch_array($examTime);
	$timeLeft = $examTime[0];
}
 echo $timeLeft;
?>