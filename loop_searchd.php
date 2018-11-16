<h4 class="searchTermsAlert">Résultats de recherche pour '<?php echo htmlspecialchars(str_replace('\\','',$_GET['s']));?>' :</h4>

<?php

    // Ici, se trouvent les tableaux, utilisés pour la boucle "for". Et cela, pour afficher du texte ou récupérer des slugs. Comme "PAT" pour la catégorie "Patrithèque".
    $texts = array(array('Actualités','d\'actualités','NLP','nlp'),array('Patrithèque','Patrithèque','PAT','pat'));
    $textsTest = array(array('Actualités','d\'actualités','NLP','nlp'),array('Patrithèque','Patrithèque','integrale','integrale'));

    // cette variable sert, à garder en mémoire des filtres qui ont déjà servi dans la boucle foreach ci-dessous.
    $keepcat = "";

    for ($i = 0 ; $i < 2 ; $i++){

        echo "<h2 class='etiquetteSearch'>".$texts[$i][0]."</h2>";

	    // Récupération des posts si il y a des filtres.
        if(isset($_GET['filtre']) && htmlspecialchars($_GET['filtre']) != "all"){

            $filtres = explode(",",htmlspecialchars($_GET['filtre']));
            $drap = true;

            // Pour chaque filtres, nous allons récupérer des posts correspondant.
            foreach ($filtres as $f){

                $category = get_category((int) $f );
	            $parent = get_cat_ID($textsTest[$i][2]);

                if( $category->category_parent == $parent && $drap){

                    query_posts( array(
                        'cat'  => $category->term_id,
                        'posts_per_page' => 5,
                        'paged' => 1,
                        's' => str_replace("&quot;",'"',htmlspecialchars($_GET['s'])),
                    ));

	                $keepcat = $category->term_id;
                    $drap = false;

                }else if($drap){

                    query_posts( array(
                        'category_name'  => "null",
                        'posts_per_page' => 5,
                        'paged' => 1,
                        's' => str_replace("&quot;",'"',htmlspecialchars($_GET['s'])),
                    ));

                }

            }

        }else{

	        // Récupération des posts sans filtre.
            query_posts( array(
                'category_name'  => $texts[$i][2],
                'posts_per_page' => 5,
                'paged' => 1,
                's' => str_replace("&quot;",'"',htmlspecialchars($_GET['s'])),
            ));

        }

        if (have_posts()) :
            while (have_posts()) : the_post(); ?>

                <div class="col-lg-12">
                    <a href="<?php the_permalink(); if(isset($_GET['s'])){ echo "?query=". htmlspecialchars(str_replace('\\','',$_GET['s'])); } ?>">
                        <article id="<?php the_ID(); ?>" class="container-article searchLoop <?php /* Récupération & Affichage des catégories */ echo getAllCategorieSlug(get_the_category()) ;?>">
                            <h4 class="post-title">
                                <?php the_title(); ?>
                            </h4>

                            <?php

                                // Si il s'agit de la partie Newsletter, on affiche la date
                                if($i == 0){ ?>

                                    <span class="post-info">
                                        <time datetime="<?php echo get_the_date( 'Y-m-d' ).' '; echo the_time( 'H:i' );?>">Article du <?php the_time('l d F Y'); ?></time>
                                    </span>

                                <?php } else {
                                    // Sinon, on affiche le résumé.
                                    $title = get_the_title();
                                    $excerpt = get_the_excerpt();
                                    cleanExcerpt($title,$excerpt);

                                } ?>
                    </a>
                </div>

            <?php endwhile; ?>

	        <?php

                if(isset($_GET['s'])){

                    $urlDetailParams = "?s=". htmlspecialchars(str_replace('\\','',$_GET['s']))."&all=".$texts[$i][3];

	                if($keepcat != ""){
		                $urlDetailParams = $urlDetailParams."&categorie_id=".$keepcat;
                    }

                }

            ?>

            <div class="col-lg-12 allResults">
                <a href="<?php echo $urlDetailParams;?>" class="allResults">
                    Afficher tous les résultats <?php echo $texts[$i][1];?>
                </a>
            </div>

        <?php else : ?>

            <p class="nothing">
                Il n'y a pas de Post à afficher !
            </p>

        <?php endif;

    }?>
