<nav id="menu" class="toc" style="margin-top: 80px;">

    <!-- actu -->
    <div id="panel-actu">
        <ul>

            <?php

                // Récupération de l'url en cours
                $current_url  = getCurrentLink();

                // Vérification si l'url en cours est la racine du site.
                if(home_url()."/" == $current_url){
                    $class = " class=' Selected '";
                }else{
                    $class = "";
                }

            ?>

            <li class="mm-listitem <?php echo $class;?>"><a href="http://preprod-patritheque.harvest/">Toute l'actualité</a></li>

            <?php

                global $wp;
                // Récupération des catégories de Newsletters
                $tags = term_exists( "NLP", 'category' );
                // Ecriture du sommaire des articles de newsletter
                writeNlpToc($tags['term_id'],$current_url);

                ?>

        </ul>
    </div>
    <!-- actu -->

    <?php

        global $wpdb;

        if($current_url != home_url()."/"){
            // Récupération & Ecriture du sommaire de la Patrithèque. Et cela, en verifiant qu'elle page du sommaire est sélectionnée.
            echo str_replace('<li><a href="'.$current_url, '<li class=" Selected "><a href="'.$current_url ,$wpdb->get_results("SELECT * FROM {$wpdb->prefix}tocs WHERE aides = 'integrale' ")[0]->content);
        }else{
            // Récupération & Ecriture du sommaire pour la Patrithèque.
            echo $wpdb->get_results("SELECT * FROM {$wpdb->prefix}tocs WHERE aides = 'integrale' ")[0]->content;
        }

        ?>

</nav>