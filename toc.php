<nav id="menu" class="toc">

    <!-- actu -->
    <div id="panel-actu">
        <ul>

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
        echo str_replace("<li><a href='".$current_url, "<li class=' mm-listitem_selected '><a href='$current_url'" ,$wpdb->get_results("SELECT * FROM {$wpdb->prefix}tocs WHERE aides = 'integrale' ")[0]->content); ?>

</nav>