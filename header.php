<!DOCTYPE html>
<html lang="en">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()  ?>/includes/ie.css" />
    <![endif]-->
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body <?php body_class(); ?>>

<header>

<!-- mobile trigram menu -->
<?php echo do_shortcode( '[responsive-menu menu="main-menu"]' ); ?>

<h1 id="logo"><?php bloginfo('name'); ?><span>&nbsp;&nbsp;&nbsp;SAG/AFTRA</span></h1>
<h2 id="sublogo"><span><?= bloginfo('description'); ?></span></h2>
<h2 id="slogan"><span>Strong, Smart & Sassy&#8230;</span> Sprinkled with a Little Sweetness</h2>
<nav>
    <div class="container">
        <!-- columns should be the immediate child of a .row -->
        <div class="row">
            <div class="seven column">
                <!-- desktop tablet menu -->
                <?php wp_nav_menu(array('theme_location'=>'main-menu','container_class'=>'main-menu')); ?>
            </div>
        </div>
    </div>
</nav>
</header>