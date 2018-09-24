<?php

show_admin_bar( false );
add_theme_support( 'post-thumbnails' );

add_action('init', function(){

    // not the login request?
    if(!isset($_POST['action']) || $_POST['action'] !== 'my_login_action')
        return;

    // see the codex for wp_signon()
    $creds = array(
        'user_login'    => $_POST['id'],
        'user_password' => $_POST['mdp'],
        'remember'      => true
    );

    $user = wp_signon( $creds, false );

    if(is_wp_error($user)){
        wp_die('Login failed. Wrong password or user name?');
    }

    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;

});

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