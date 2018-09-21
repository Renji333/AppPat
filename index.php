<?php get_header(); ?>

<?php get_template_part('toc'); ?>

<div class="main-container">
    <?php get_template_part('loop');?>
    <div class="col-lg-12">
        <?php previous_posts_link();?>
        <?php next_posts_link();?>
    </div>
</div>

<?php get_footer(); ?>