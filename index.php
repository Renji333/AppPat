<?php $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>

<?php

    if ( !is_user_logged_in() ) {

        get_template_part('login');

    } else { ?>

<?php get_header(); ?>

<?php get_template_part('toc'); ?>

<div class="main-container">

    <?php

        if(isset($_GET['s']) && isset($_GET['all']) && $_GET['all'] == 'nlp' || $_GET['all'] == 'pat'){
            get_template_part('loop_search_detail');
        } else if(isset($_GET['s'])){
            get_template_part('loop_search');
        } else{
            get_template_part('loop');
        }

        ?>

</div>

<?php get_footer(); ?>

<?php } ?>
