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
        <script src="<?php echo asset_js('/vendor/modernizr-2.6.2.min.js'); ?>"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Profile Section -->
        <ul class="profile">
			
			<!-- Single Profile Section Start -->
			 <?php if($aSpeakers)
					 {
					 	foreach($aSpeakers as $data): ?>
					 	
					 	<li class="single-profile">
							<a href="<?php echo site_url('speaker/profiles/view').'/'.$data->id; ?>" class="Profile-box">
								<img class="profile-pic" src="<?php echo site_url('assets/images/profilepic').'/'.$data->image; ?>" />
								<p class="profile-name"><?php echo $data->name; ?></p>
							</a>
						</li>
					 	
				<?php   endforeach; 
					 } else { ?>
						 <li class="single-profile">
							<a href="profile.html" class="Profile-box">
								<img class="profile-pic" src="<?php echo site_url('assets/images/profilepic'); ?>/no-img.jpg" />
								<p class="profile-name">John Doe</p>
							</a>
						</li>
						 
					 <?php 	} ?>
			
			
			<!-- Single Profile Section End -->
		</ul>
		
		
		
		
		<!-- Side buttons Start -->
			<div class="side-panel">
				<a href="<?php echo site_url('speaker/profiles'); ?>" class="live-btn side-btn">Speakers</a>
				<a href="<?php echo site_url('speaker/profiles/live'); ?>" class="live-btn side-btn">Live</a>				
			</div>

		<!-- Side buttons End -->
		
		

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
