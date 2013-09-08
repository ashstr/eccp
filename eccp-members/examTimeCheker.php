<?php
include_once ("Library/config.php");

$uid = $_SESSION['UID'];
$eid = intval($_GET["eid"]);
$currentTime = new DateTime();

$UETresult = mysqli_query("SELECT starting_time FROM user_exam_time WHERE uid=$uid and eid=$eid");
if (mysqli_num_rows($result)) {
	$UETRow = mysqli_fetch_array($UETresult);
	$examTimeResult = mysqli_query("SELECT exam_period FROM exam WHERE eid=$eid");
	$examTimeResultRow = mysqli_fetch_array($examTimeResult);
	$timeLeft = $examTimeResultRow[0] + $UETRow[0] - $currentTime;
	echo $timeLeft;
} else {
	mysqli_query("insert into starting_time (uid,eid,starting_time) values ($uid,$eid,$currentTime)");
	$examTimeResult = mysqli_query("SELECT exam_period FROM exam WHERE eid=$eid");
	$examTimeResultRow = mysqli_fetch_array($examTimeResult);
	echo $examTimeResultRow[0];
}
?>