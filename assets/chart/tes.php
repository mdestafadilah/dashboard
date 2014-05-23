<html>
<head>
<title>My First chart using FusionWidgets</title>
        <script type="text/javascript" src="FusionCharts.js">
        </script>
</head>
<body>
        <div id="chartContainer">FusionWidgets will load here!</div>
        <script type="text/javascript"><!--
                var myChart = new FusionCharts( "AngularGauge.swf", "myChartId", "400", "200", "0", "1" );
                myChart.setXMLUrl("Data.php");
                myChart.render("chartContainer");
        // -->
        </script>
</body> 
</html>