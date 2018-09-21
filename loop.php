<?php

    if(is_home()){

        query_posts( array(
            'category_name'  => 'NLP',
            'posts_per_page' => 15,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
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
                    <li class="puce">
                        <a href="http://preprod-patritheque.harvest/index.php/2018/09/19/plan-pauvrete-vers-la-creation-dun-revenu-universel-dactivite/">Plan pauvreté - Vers la création d'un revenu universel d'activité</a>
                    </li>
                    <li class="puce">
                        <a href="http://preprod-patritheque.harvest/index.php/2018/09/19/travailleurs-independants-creation-dune-allocation-forfaitaire-en-cas-de-cessation-dactivite/">Travailleurs indépendants - Création d'une allocation forfaitaire en cas de cessation d'activité</a>
                    </li>
                    <li class="puce">
                        <a href="http://preprod-patritheque.harvest/index.php/2018/09/19/renovation-energetique-lancement-de-la-campagne-faire/">Rénovation énergétique - Lancement de la campagne "FAIRE"</a>
                    </li>
                    <li class="puce">
                        <a href="http://preprod-patritheque.harvest/index.php/2018/09/19/plus-values-immobilieres-abattement-exceptionnel-en-cas-de-vente-dun-terrain-a-batir-ou-assimile/">Plus-values immobilières - Abattement exceptionnel en cas de vente d'un terrain à bâtir ou assimilé</a>
                    </li>
                    <li class="puce">
                        <a href="http://preprod-patritheque.harvest/index.php/2018/09/19/pea-simplification-des-modalites-de-transfert-de-titres-non-cotes/">PEA - Simplification des modalités de transfert de titres non cotés</a>
                    </li>
                </ul>

            </div>
        </div>

    <?php } else {

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

