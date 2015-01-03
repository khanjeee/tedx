<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>TEDX  Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('css/reset.css')?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/text.css')?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/grid.css')?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/layout.css')?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/nav.css')?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('/assets/grocery_crud/themes/flexigrid/css/flexigrid.css')?>" media="screen" />
    
    <!-- <link rel="stylesheet" type="text/css" href="<?php //echo site_url('/css/flexigrid.css')?>" media="screen" /> -->
    
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/ie6.css')?>" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/ie.css')?>" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->

    <script src="<?php echo site_url('/js/jquery-1.8.2.min.js')?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo site_url('/js/jquery-ui/jquery.ui.core.min.js')?>"></script>
    <script src="<?php echo site_url('/js/jquery-ui/jquery.ui.widget.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo site_url('/js/jquery-ui/jquery.ui.accordion.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo site_url('/js/jquery-ui/jquery.effects.core.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo site_url('/js/jquery-ui/jquery.effects.slide.min.js')?>" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script src="<?php echo site_url('/js/setup.js')?>" type="text/javascript"></script>
   
</head>
<body>

<div class="container_12">
    <div class="grid_12 header-repeat">
        <div id="branding">
            <div class="floatleft">
                <img src="<?php //echo site_url('/img/kmdc_logo.png')?>" alt="Logo" /></div>
            <div class="floatright">
                <div class="floatleft">
                    <img src="<?php echo site_url('/img/img-profile.jpg')?>" alt="Profile Pic" /></div>
                <div class="floatleft marginleft10">
                    <ul class="inline-ul floatleft">
                        <li>Hello Admin</li>
                        <li><a href="<?php echo site_url('authenticate/logout') ?>">Logout</a></li>
                    </ul>
                    <br />
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
    <div class="clear">

    </div>
    <div class="grid_12">
        <ul class="nav main">
            <li class="ic-dashboard"><a href="<?php echo site_url('admin/dashboard') ?>"><span>Dashboard</span></a> </li>
            <li class="ic-gallery"><a href="<?php echo site_url('admin/speakers/view') ?>"><span>Speakers</span></a></li>
           
		    </ul>
    </div>
    <div class="clear">
    </div>
 
    <div class="grid_12 content">
        <div class="box" style="margin-left: 0px">
            <div class="block">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
    
</div>
<div class="clear">
</div>
<div id="site_info">
    <p>
        Copyright <a href="/">Tedx</a>. All Rights Reserved.
    </p>
</div>
</body>
</html>



