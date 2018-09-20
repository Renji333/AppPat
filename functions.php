<?php

show_admin_bar( false );

function getAllCategorieSlug($e){

    $ret = '';

    foreach ($e as $item){
        $ret = $ret .' '. $item->slug;
    }

    return $ret;

}

function writeNlpToc($e,$link){

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

    $categories = get_categories(array( 'parent' => $e ));

    foreach ($categories as $c) {

        echo "<li><span>$c->cat_name</span><ul>";

        writeNlpToc($c->term_id,$link);

        echo "</ul></li>";

    }


}