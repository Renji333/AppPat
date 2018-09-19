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

                        <?php

                            the_content();

                            global $wpdb;
                            $results = $wpdb->get_results("SELECT n.title, p.guid,p.post_title FROM {$wpdb->prefix}posts p, {$wpdb->prefix}post_to_nlp_links n WHERE p.ID = n.idPostForLink and idPost = ".get_the_ID());
                            $resultsPat = $wpdb->get_results("SELECT n.title, p.guid,p.post_title FROM {$wpdb->prefix}posts p, {$wpdb->prefix}post_to_pat_links n WHERE p.ID = n.idPostForLink and idPost = ".get_the_ID());

                            if($results != null || $resultsPat != null){

                                echo "<h2>Pour en savoir plus :</h2>";

                                if($results != null){

                                    echo "<h4>Actualités :</h4>";

                                    foreach ($results as $result)
                                    {
                                        if($result->title == '' || $result->title == null){
                                            $result->title = $result->post_title;
                                        }
                                        echo '<li><a href="'.$result->guid.'">'.$result->title.'</a></li>';
                                    }

                                }

                                if($resultsPat != null){

                                    echo "<h4>Patrithèque :</h4>";

                                    foreach ($resultsPat as $result)
                                    {
                                        if($result->title == '' || $result->title == null){
                                            $result->title = $result->post_title;
                                        }
                                        echo '<li><a href="'.$result->guid.'">'.$result->title.'</a></li>';
                                    }

                                }

                            }



                            ?>

                    </div>

                </article>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>