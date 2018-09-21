<?php

show_admin_bar( false );
add_theme_support( 'post-thumbnails' );

function getAllCategorieSlug($e){

    $ret = '';

    foreach ($e as $item){
        $ret = $ret .' '. $item->slug;
    }

    return $ret;

}

function writeNlpToc($e,$link){

    $categories = get_categories(array( 'parent' => $e ));

    if($categories){

        foreach ($categories as $c) {

            echo "<li><span>$c->cat_name</span><ul>";

            writeNlpToc($c->term_id,$link);

            echo "</ul></li>";

        }

    }else{

        $posts = get_posts( array(
            'numberposts'    => 10,
            'category'       => $e
        ) );

        if ( $posts ) {

            foreach ($posts as $p) {

                if($p->guid == $link){
                    $class = " class=' Selected '";
                }else{
                    $class = "";
                }

                echo "<li $class>
                    <a href='".$p->guid."'>".$p->post_title."</a>
                  </li>";

            }

        }

    }

}