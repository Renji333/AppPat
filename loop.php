<?php

    $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if($current_link == home_url().'/'){

        query_posts( array(
            'category_name'  => 'NLP',
            'posts_per_page' => 5,
            'paged' => 1,
        ) );

        $i = 0;

        ?>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php

                if($i == 0){
                    echo '<div class="col-lg-12">';
                    $classArticle = "container-article container-article-focus ";
                } elseif ($i == 1){
                    echo '<div class="col-lg-9">';
                    $classArticle = "container-article ";
                }

                ?>

                <a href="<?php the_permalink(); if(isset($_GET['s'])){ echo "?s=".htmlspecialchars($_GET['s']); } ?>">
                    <article id="<?php the_ID(); ?>" class="<?php echo $classArticle.' '.getAllCategorieSlug(get_the_category());?>">

                        <?php if($i == 0){

                            echo '<span class="titleFocus">Focus</span>'; ?>

                            <img class='focus' src='<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium');?>'/>

                        <?php }?>

                        <h4 class="post-title">
                            <?php the_title(); ?>
                        </h4>
                        <span class="post-info">
                            <time datetime="<?php echo get_the_date( 'Y-m-d' ).' '; echo the_time( 'H:i' );?>"><?php the_time('l d F Y'); ?></time>
                        </span>
                        <?php the_excerpt(); ?>
                    </article>
                </a>

                <?php

                if($i == 0 ){
                    echo "</div>";
                }

                $i = $i + 1 ;?>

            <?php endwhile; echo "</div>"; ?>
        <?php else : ?>
            <p class="nothing">
                Il n'y a pas de Post à afficher !
            </p>
        <?php endif; ?>

        <div class="col-lg-3">
            <div class="container-widget">
                <span class="etiquette">Dossier d'actualité</span>
                <a href="http://preprod-patritheque.harvest" class="blueBubble">
                    Projet de loi de finances 2018
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="container-widget">
                <span class="etiquette">Articles les plus lus</span>

                <ul class="ul">
                    <?php getMoreReadsByCat("NLP");?>
                </ul>

            </div>
        </div>

    <?php } else {


        if(isset($_GET['type']) && $_GET['type'] != null){

            query_posts( array(
                'category_name'  => 'NLP',
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                'posts_per_page' => 15,
            ));

        } else if(isset($_GET['categorie']) && $_GET['categorie'] != null){

            query_posts( array(
                'cat'  => intval($_GET['categorie']),
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                'posts_per_page' => 15,
            ));

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

    <?php } ?>

