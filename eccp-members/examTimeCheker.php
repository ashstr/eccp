<?php
phpinfo();
// $UETresult = mysql_query("SELECT starting_time FROM user_exam_time WHERE uid=$uid and eid=$eid");
// echo "<script>alert(".mysql_num_rows($UETresult).")</script>";
// if (mysql_num_rows($UETresult)!=0) {
	// $UETRow = mysql_fetch_array($UETresult);
	// $examTimeResult = mysql_query("SELECT exam_period FROM exam WHERE eid=$eid");
	// $examTimeResultRow = mysql_fetch_array($examTimeResult);
	// // $timeLeft = $examTimeResultRow[0] + $UETRow[0] - $currentTime;	
// } else {
	// echo "<script>alert('$currentTime')</script>";
	// mysql_query("insert into starting_time (uid,eid,starting_time) values ($uid,$eid,$currentTime)");
	// echo "<script>alert('after insert')</script>";
	// $examTimeResult = mysql_query("SELECT exam_period FROM exam WHERE eid=$eid");
	// $examTimeResultRow = mysql_fetch_array($examTimeResult);
	// $timeLeft=$examTimeResultRow[0];
	// echo "<script>alert(".$timeLeft.")</script>";
// 	
// }
// echo $timeLeft;
?>