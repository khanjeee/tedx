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
        <!--<meta name="viewport" content="width=device-width, initial-scale=1"> -->
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <link rel="stylesheet" href="<?php echo asset_css('normalize.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset_css('main.css'); ?>">
        <script src="<?php echo asset_js('/vendor/modernizr-2.6.2.min.js'); ?>"></script>
        
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
				<p>How do you feel about what you've just learned?</p>
				<div class="poll-opt">
					<span onclick="javascript:setAnswer('iwta',1);" class="opt1"><img src="<?php echo site_url('assets/images'); ?>/iwta.png" /></span>
					<span onclick="javascript:setAnswer('mohc',2);" class="opt2"><img src="<?php echo site_url('assets/images'); ?>/mohbc.png" /></span>
					<span onclick="javascript:setAnswer('intt',3);" class="opt3"><img src="<?php echo site_url('assets/images'); ?>/inttat.png" /></span>
					<span onclick="javascript:setAnswer('iwlm',4);" class="opt4"><img src="<?php echo site_url('assets/images'); ?>/iwtlm.png" /></span>
				</div>
			
			</div>	
			
			<form action="<?php echo site_url('speaker/profiles/poll'); ?>" method="post" name="form" id="form">
			<input type="hidden" value="<?php echo $aSpeakers[0]->id; ?>" name="speaker_id" />
			<input id="answer" class="answer" type="hidden" value="default" name="answer" />
			<div class="comment">
				<p>Any additional comments? (optional)</p>
				<textarea name="comment" rows="4"></textarea>
				<input type="submit" value="SUBMIT FEEDBACK">
			
			</div>	
			</form>
			
		<!-- Profile Section End -->
		
		
		
		<!-- Side buttons Start -->
			<div class="side-panel">
				<!--a href="<?php //echo site_url('speaker/profiles'); ?>" class="live-btn side-btn">Speakers</a-->
				<a href="<?php echo site_url('speaker/profiles/view').'/'.$aSpeakers[0]->id; ?>" class="live-btn side-btn">Speakers</a>
				<a href="<?php echo site_url('speaker/profiles/live'); ?>" class="live-btn side-btn active">Live</a>				
			</div>

		<!-- Side buttons End -->
		
		

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script>
  
	$(document).ready(function(){
		    $("#form").submit(function(){
		    
		        if($.trim($("#answer").val()) === "default")
		        {
		           alert("No poll option is set, please choose one, then submit feedback.");
		            return false;
		        }
		        else
		        {
		            return true;
		        }
		    });
		});
        </script>
		<script>
		function setAnswer(val,no)
		{
			$('.answer').val(val);
			if(no==1)
			{
				
				$('.opt2').removeClass('active');
				$('.opt3').removeClass('active');
				$('.opt4').removeClass('active');
				$('.opt1').addClass('active');
			}
			if(no==2)
			{
				
				$('.opt1').removeClass('active');
				$('.opt3').removeClass('active');
				$('.opt4').removeClass('active');
				$('.opt2').addClass('active');
			}
			if(no==3)
			{
				
				$('.opt2').removeClass('active');
				$('.opt1').removeClass('active');
				$('.opt4').removeClass('active');
				$('.opt3').addClass('active');
			}
			if(no==4)
			{
				
				$('.opt2').removeClass('active');
				$('.opt3').removeClass('active');
				$('.opt1').removeClass('active');
				$('.opt4').addClass('active');
			}
		}
        </script>
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
    