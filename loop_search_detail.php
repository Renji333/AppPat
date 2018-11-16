<h4 class="searchTermsAlert">Résultats de recherche pour '<?php echo htmlspecialchars(str_replace('\\','',$_GET['s']));?>' :</h4>

<?php

    $drapNlp = true;
    $cat = "NLP";
    $catFiltre = "";
    $title = "Actualités";

    if(isset($_GET['all']) && $_GET['all'] == 'nlp' || $_GET['all'] == 'pat'){

        if($_GET['all'] == 'pat'){

            $drapNlp = false;
            $cat = "PAT";
            $title = "Patrithèque";

        }

    }

    if(isset($_GET['categorie_id'])){

        $catFiltre = intval($_GET['categorie_id']);

    }

    echo "<h2 class='etiquetteSearch'>".$title."</h2>";

    // Récupération des paramètres, critères pour les posts à afficher.
    $args = array('posts_per_page' => 15, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1, 's' => str_replace("&quot;",'"',htmlspecialchars($_GET['s'])));

    if($catFiltre != ""){
        $args['cat']  = $catFiltre;
    } else {
        $args['category_name']  = $cat;
    }

    // Récupération des posts
    query_posts($args);

    if (have_posts()) :
        while (have_posts()) : the_post(); ?>

            <div class="col-lg-12">
                <a href="<?php the_permalink(); if(isset($_GET['s'])){ echo "?query=". htmlspecialchars(str_replace('\\','',$_GET['s']));  } ?>">
                    <article id="<?php the_ID(); ?>" class="container-article searchLoop <?php /* Récupération & Affichage des catégories */ echo getAllCategorieSlug(get_the_category()) ;?>">
                        <h4 class="post-title">
                            <?php the_title(); ?>
                        </h4>

                        <?php

                            if($drapNlp){ ?>

                                <span class="post-info">
                                    <time datetime="<?php echo get_the_date( 'Y-m-d' ).' '; echo the_time( 'H:i' );?>">Article du <?php the_time('l d F Y'); ?></time>
                                </span>

                            <?php } else {

                                $title = get_the_title();
                                $excerpt = get_the_excerpt();
                                cleanExcerpt($title,$excerpt);

                            }

                        ?>

                </a>
            </div>

        <?php endwhile; ?>

        <div class="col-lg-9 suiv-prec">
            <?php pressPagination($pages ='', $range = 2) ;?>
        </div>

    <?php else : ?>

        <p class="nothing">
            Il n'y a pas de Post à afficher !
        </p>

    <?php endif;