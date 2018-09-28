<?php $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>

<?php

    if ( !is_user_logged_in() ) {

        get_template_part('login');

    } else { ?>

<?php get_header(); ?>

<?php get_template_part('toc'); ?>

<div class="main-container">
    <?php get_template_part('loop');?>
    <div class="col-lg-9 suiv-prec">
    <?php if( $current_link != home_url().'/'){ ?>
            <?php pressPagination($pages ='', $range = 2) ;?>
    <?php } else { ?>
            <a href="?type=all" class="bubble">
                Voir toutes les actualités
            </a>
    <?php } ?>
    </div>
</div>

<?php get_footer(); ?>

<?php } ?>
