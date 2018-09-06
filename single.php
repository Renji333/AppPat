<?php get_header(); ?>
<?php get_template_part('toc'); ?>

    <div class="main-container container-fluid">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <article id="currentPost" class="post <?php echo getAllCategorieSlug(get_the_category());?>">

                    <div class="actionsIcons">

                        <i id="tintBtn" class="fa fa-paint-brush" aria-hidden="true"></i>
                        <i id="printBtn" class="fa fa-print" aria-hidden="true"></i>
                        <?php previous_post_link('%link', '<i class="fa fa-chevron-left" aria-hidden="true"></i>' ); ?>
                        <?php next_post_link( '%link', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' ); ?>

                    </div>

                    <h1 class="post-title"><?php the_title(); ?></h1>

                    <p class="post-info">
                        <?php the_date(); ?>
                    </p>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                </article>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>