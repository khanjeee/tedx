<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <link rel="stylesheet" href="<?php echo asset_css('normalize.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset_css('main.css'); ?>">
       <link rel="stylesheet" href="<?php echo asset_js('amcharts/style.css');?>" type="text/css">
        
        <script src="<?php echo asset_js('/vendor/modernizr-2.6.2.min.js'); ?>"></script>
        <script src="<?php echo asset_js('amcharts/amcharts.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset_js('amcharts/serial.js');?>" type="text/javascript"></script>

        <script type="text/javascript">
            var chart;

            var chartData = <?php echo $aPolls;  ?>;

           // console.log(chartData);

            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "answer";
                chart.startDuration = 1;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 0;
                categoryAxis.gridPosition = "start";

                // value
                // in case you don't want to change default settings of value axis,
                // you don't need to create it, as one value axis is created automatically.

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "votes";
                graph.balloonText = "<b>[[value]]</b>";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 0.8;
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "top-right";

                chart.write("chartdiv");
            });
        </script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Profile Section Start -->
			<header>
				<div class="person-detail">
					<h2 class="name"><?php echo $aSpeakers[0]->name; ?></h2>
					<span class="title"><?php echo $aSpeakers[0]->title; ?></span>
				</div>
				<img class="person-pic" src="<?php echo site_url('assets/images/profilepic').'/'.$aSpeakers[0]->image; ?>" />
			</header>
			
			<div class="poll">
				<p>Here is what others think  ?</p>
				<div id="chartdiv"  class="poll-opt" style="width: 100%; height: 400px;"></div>
			
			</div>	
			
			
			<div class="comment">
				
				<input type="submit" value="FEEDBACK SUBMITTED">
			
			</div>	
			
			
		<!-- Profile Section End -->
		
		
		
		<!-- Side buttons Start -->
			<div class="side-panel">
				<a href="<?php echo site_url('speaker/profiles'); ?>" class="live-btn side-btn">Speakers</a>
				<a href="<?php echo site_url('speaker/profiles/live'); ?>" class="live-btn side-btn">Live</a>				
			</div>

		<!-- Side buttons End -->
		
		
        
    </body>
</html>
    