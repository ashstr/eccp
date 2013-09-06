<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="XML/Contents/Style.css" type="text/css" />
<script language="JavaScript" src="XML/JSClass/FusionCharts.js"></script>

<div id="chartdiv" align="center">FusionCharts.</div>
      <script type="text/javascript">
		   var chart = new FusionCharts("XML/Charts/FCF_Column3D.swf", "ChartId", "650", "365", "#F7F7E9");
		   chart.setDataURL("XML/Data/Column3D.xml");		   
		   chart.render("chartdiv");
		</script>