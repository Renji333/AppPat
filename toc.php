<nav id="menu" class="toc">

    <!-- actu -->
    <div id="panel-actu">
        <ul>

            <?php

                $current_url  = getCurrentLink();

                if(home_url()."/" == $current_url){
                    $class = " class=' Selected '";
                }else{
                    $class = "";
                }

            ?>

            <li class="mm-listitem <?php echo $class;?>"><a href="http://preprod-patritheque.harvest/">Toute l'actualité</a></li>

            <?php

                global $wp;
                $tags = term_exists( "NLP", 'category' );
                writeNlpToc($tags['term_id'],$current_url);

                ?>

        </ul>
    </div>
    <!-- actu -->

    <?php

        global $wpdb;

        if($current_url != home_url()."/"){
            echo str_replace('<li><a href="'.$current_url, '<li class=" Selected "><a href="'.$current_url ,$wpdb->get_results("SELECT * FROM {$wpdb->prefix}tocs WHERE aides = 'integrale' ")[0]->content);
        }else{
            echo $wpdb->get_results("SELECT * FROM {$wpdb->prefix}tocs WHERE aides = 'integrale' ")[0]->content;
        }

        ?>

</nav>