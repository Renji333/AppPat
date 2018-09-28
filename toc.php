<nav id="menu" class="toc">

    <!-- actu -->
    <div id="panel-actu">
        <ul>

            <?php

                if(home_url()."/" == set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] )){
                    $class = " class=' Selected '";
                }else{
                    $class = "";
                }

            ?>

            <li class="mm-listitem <?php echo $class;?>"><a href="http://preprod-patritheque.harvest/">Toute l'actualité</a></li>

            <?php

                    global $wp;
                    $current_url  = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );

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