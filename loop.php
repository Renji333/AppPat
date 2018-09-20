
<?php

    if(!isset($_GET['s'])){

        query_posts( array(
            'category_name'  => 'NLP',
            'posts_per_page' => 10,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        ) );

    }

    if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); if(isset($_GET['s'])){ echo "?s=".htmlspecialchars($_GET['s']); } ?>">
            <article id="<?php the_ID(); ?>" class="container-article <?php echo getAllCategorieSlug(get_the_category());?>">
                <h4 class="post-title">
                    <?php the_title(); ?>
                </h4>
                <span class="post-info">
                    <time datetime="<?php echo get_the_date( 'Y-m-d' ).' '; echo the_time( 'H:i' );?>"><?php the_time('l d F Y'); ?></time>
                </span>
                <?php the_excerpt(); ?>
            </article>
        </a>
    <?php endwhile; ?>
<?php else : ?>
    <p class="nothing">
        Il n'y a pas de Post à afficher !
    </p>
<?php endif; ?>
