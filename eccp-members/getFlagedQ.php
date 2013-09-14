<?php
$uid=$_SESSION["UID"];
$flagedQ=mysql_query("SELECT qid FROM flagedQ WHERE UID=".$_SESSION['UID']);
echo "<ul style='list-style:none'>";
while($row=mysql_fetch_array($flagedQ)){
	echo "<li>".$row[0]."</li>";
}
echo '</ul>';
?>