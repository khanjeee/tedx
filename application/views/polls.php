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
        <script src="<?php echo asset_js('jquery.min.js'); ?>"></script>
       	<script src="<?php echo asset_js('highcharts.js'); ?>"></script>
		<script src="<?php echo asset_js('exporting.js'); ?>"></script>
       
        
        <script src="<?php echo asset_js('/vendor/modernizr-2.6.2.min.js'); ?>"></script>
        

        <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                chart: {
                    type: 'column',
                    alignTicks: false
                },
                title: {
                    text: ''
                },
                colors: ['#ff0000'],
                subtitle: {
                    text: ''
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: 0 ,
                        style: {
                            fontSize: '10px',
                            fontFamily: 'Verdana, sans-serif'
                            
                        }
                    }
                    
                },
                
                	yAxis: [{
                        title: {
                            text: null
                        },
                        labels: {
                            enabled: false
                        },
                        gridLineWidth: 0
                    }, {
                        title: {
                            text: ''
                        },
                        opposite: true
                    }],
                legend: {
                    enabled: false
                },
                exporting: {
                    enabled: false
           },
                tooltip: {
                	enabled: false,
                   // pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>'
                },
                series: [{
                    name: '',
                    data: <?php echo $aPolls; ?>,
                    dataLabels: {
                        enabled: true,
                        rotation: 0,
                        color: '#FFFFFF',
                        align: 'center',
                        y: 28,
                        style: {
                            fontSize: '10px',
                            fontFamily: 'Verdana, sans-serif',
                            textShadow: '0 0 3px black'
                        }
                    }
                }]
            });
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
				<a href="<?php echo site_url('speaker/profiles/view').'/'.$aSpeakers[0]->id; ?>">
					<img class="person-pic" src="<?php echo site_url('assets/images/profilepic').'/'.$aSpeakers[0]->image; ?>" />
				</a>
			</header>
			
			<div class="poll">
				<p>Here is what others think  ?</p>
				<div id="container" style="min-width: 500px; height: 400px; margin: 0 auto"></div>
			
			</div>	
			
			
			<div class="comment">
				
				<input type="submit" value="FEEDBACK SUBMITTED">
			
			</div>	
			
			
		<!-- Profile Section End -->
		
		
		
		<!-- Side buttons Start -->
			<div class="side-panel">
				<a href="<?php echo site_url('speaker/profiles'); ?>" class="live-btn side-btn">Speakers</a>
				<a onclick="javascript:check_if_polled();" href="#" class="live-btn side-btn">Live</a>				
			</div>

		<!-- Side buttons End -->
		
		
        
    </body>
    <script>
   function  check_if_polled()
   {
	   var polled = "<?php echo $polled; ?>";
	   if(polled.length > 0)
	   {
		   alert('You have already submitted your feedback');

		}
	   else
		{
		   window.location.assign("<?php echo site_url('speaker/profiles/live'); ?>"); 
		}
	   return  false;
	   
	}
    
    </script>
</html>
    