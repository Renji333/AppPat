<h4 class="searchTermsAlert">Résultats de recherche pour '<?php echo htmlspecialchars(str_replace('\\','',$_GET['s']));?>' :</h4>

<?php

    $texts = array(array('Actualités','d\'actualités','NLP','nlp'),array('Patrithèque','Patrithèque','PAT','pat'));

    for ($i = 0 ; $i < 2 ; $i++){

        echo "<h2 class='etiquetteSearch'>".$texts[$i][0]."</h2>";

        query_posts( array(
            'category_name'  => $texts[$i][2],
            'posts_per_page' => 5,
            'paged' => 1,
            's' => str_replace("&quot;",'"',htmlspecialchars($_GET['s'])),
        ));

        if (have_posts()) :
            while (have_posts()) : the_post(); ?>

                <div class="col-lg-12">
                    <a href="<?php the_permalink(); if(isset($_GET['s'])){ echo "?query=". htmlspecialchars(str_replace('\\','',$_GET['s'])); } ?>">
                        <article id="<?php the_ID(); ?>" class="container-article searchLoop <?php echo getAllCategorieSlug(get_the_category()) ;?>">
                            <h4 class="post-title">
                                <?php the_title(); ?>
                            </h4>

                            <?php

                                if($i == 0){ ?>

                                    <span class="post-info">
                                        <time datetime="<?php echo get_the_date( 'Y-m-d' ).' '; echo the_time( 'H:i' );?>">Article du <?php the_time('l d F Y'); ?></time>
                                    </span>

                                <?php } else {

                                    $title = get_the_title();
                                    $excerpt = get_the_excerpt();
                                    cleanExcerpt($title,$excerpt);

                                } ?>
                    </a>
                </div>

            <?php endwhile; ?>

            <div class="col-lg-12 allResults">
                <a href="<?php if(isset($_GET['s'])){ echo "?s=". htmlspecialchars(str_replace('\\','',$_GET['s']))."&all=".$texts[$i][3]; } ?>" class="allResults">
                    Afficher tous les résultats <?php echo $texts[$i][1];?>
                </a>
            </div>

        <?php else : ?>

            <p class="nothing">
                Il n'y a pas de Post à afficher !
            </p>

        <?php endif;

    }?>
