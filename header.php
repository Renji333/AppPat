<!DOCTYPE html>
<html>

<head <?php language_attributes(); ?>>

    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.mmenu.all.css" type="text/css"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font.css" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/toc.css" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/global.css" type="text/css">

    <?php if(is_single() && 'post' == get_post_type()) {
        echo "<link rel='stylesheet' type='text/css' href='".get_stylesheet_directory_uri()."/css/impression.css' media='print'>";
    }?>
    

    <?php wp_head(); ?>

</head>

<body>

    <header>

        <a class="HeaderBlock AppNameTitle" href="<?php bloginfo('home'); ?>">
            <span><?php bloginfo('name'); ?></span>
        </a>

        <div class="HeaderBlock AppLogout" href="<?php bloginfo('home'); ?>">
            <img src="http://citation-celebre.leparisien.fr/images/personnage-fiction/3322.jpg" alt="..." class="UserAvatar"/>
            <span class="UserName">John Doe</span>
            <a href="<?php echo wp_logout_url(); ?>">
                <img src="<?php bloginfo('template_directory'); ?>/img/logout.svg" alt="..." class="LogOutIcon"/>
            </a>
        </div>

        <div class="HeaderBlock AppSearch">
            <form role="search" method="get" class="search-form" action="<?php echo home_url();?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher..." name="s">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Rechercher</button>
                    </span>
                </div><!-- /input-group -->
            </form>
        </div>

    </header>