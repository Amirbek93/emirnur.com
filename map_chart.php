<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['1 sola oylik', 'dollar'],
                ['yanvar',     8000],
                ['fevral',      15000],
                ['mart',       25000],
                ['aprel', 7000],
                ['may',    12000],
                ['iyun',  13000],
                ['iyul',    0]
            ]);

            var options = {
                title: 'yillik ish haqqi Activities',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</body>
</html>