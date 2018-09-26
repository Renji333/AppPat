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

            if(home_url()."/?categorie=".$c->term_id == $link){
                $class = " class=' Selected '";
            }else{
                $class = "";
            }

            echo "<li $class><a href='".home_url()."?categorie=".$c->term_id."'>".$c->cat_name."</a></li>";

        }

    }

}