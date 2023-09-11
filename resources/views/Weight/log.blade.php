<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>graph</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>graph</h1>
        <canvas id="myChart"></canvas>
        	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
       <script>
           var ctx = document.getElementById("myChart");
           var myChart = new Chart(ctx, {
        		type: "line",
        		data : {
        		    //labalsの中に日付を送ればx軸に表示される
        			labels: '日付',
        			datasets: [
        			    {
        			        label: "体重の遷移",
        			        //dataに配列で数値を入れるとグラフが完成する
        			        data:  [50,60,70,],
        			        borderColor: "rgba(255,0,0,1)",
        			        backgroundColor: "rgba(0,0,0,0)",
        			    }
        			]
        		},
        		options: {},
           });
       </script>
    </body>
</html>