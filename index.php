<?php get_header(); ?>

<?php get_template_part('toc'); ?>

<div class="main-container">
    <?php get_template_part('loop'); ?>
    <?php previous_posts_link(); ?>
    <?php next_posts_link(); ?>
</div>

<?php get_footer(); ?>