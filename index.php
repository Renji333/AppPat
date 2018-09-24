<?php $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>

<?php

    if ( !is_user_logged_in() ) {

        get_template_part('login');

    } else { ?>

<?php get_header(); ?>

<?php get_template_part('toc'); ?>

<div class="main-container">
    <?php get_template_part('loop');?>
    <?php if( $current_link != home_url().'/'){ ?>
        <div class="col-lg-12" style="margin-bottom: 20px;text-align: center;">
            <?php previous_posts_link();?>
            <?php next_posts_link();?>
        </div>
    <?php } else { ?>
        <div class="col-lg-9" style="margin-bottom: 20px;text-align: center;">
            <a href="?type=all" class="blueBubble" style="display: inline !important;">
                Voir toutes les actualités
            </a>
        </div>
    <?php } ?>
</div>

<?php get_footer(); ?>

<?php } ?>
