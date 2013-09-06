<script type="text/javascript">
<!--

var currentTime = new Date()
var month = currentTime.getMonth() + 1
var day = currentTime.getDate()
var year = currentTime.getFullYear()

var weekdays = new Array(7);
weekdays[0] = "Sunday";
weekdays[1] = "Monday";
weekdays[2] = "Tuesday";
weekdays[3] = "Wednesday";
weekdays[4] = "Thursday";
weekdays[5] = "Friday";
weekdays[6] = "Saturday";

var current_date = new Date();
	weekday_value = current_date.getDay();

document.write("' "+weekdays[weekday_value]+" '"+"&nbsp;"+ day + "/" + month + "/" + year)

//-->
</script>