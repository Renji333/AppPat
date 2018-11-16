<?php $current_link = getCurrentLink();?>

<?php

    if ( !is_user_logged_in() ) {

        // Affichage de la vue de login, si l'utilisateur n'est pas connecté.
        get_template_part('login');

    } else { ?>

<?php get_header(); ?>

<?php get_template_part('toc'); ?>

<div class="main-container">

    <?php

        // Affichage de la vue de détail d'une recherche.
        if(isset($_GET['s']) && isset($_GET['all']) && $_GET['all'] == 'nlp' || $_GET['all'] == 'pat'){
            get_template_part('loop_search_detail');
        } else if(isset($_GET['s'])){
            // Affichage de la vue de recherche.
            get_template_part('loop_search');
        } else{
	        // Affichage de la boucle des derniers articles pour la page home.
            get_template_part('loop');
        }

        ?>

</div>

<?php get_footer(); ?>

<?php } ?>
