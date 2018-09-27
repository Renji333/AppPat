<?php

if ( !is_user_logged_in() && home_url().'/' != "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") {

    wp_redirect( home_url());
    exit();

}

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

function insert_posts_views($uid,$pid){
    global $wpdb;

    $rows = $wpdb->get_var("SELECT COUNT(DISTINCT UID) AS c FROM {$wpdb->prefix}posts_views WHERE PID = $pid");

    if( $rows == "0" ){

        $wpdb->insert("{$wpdb->prefix}posts_views", array(
            'UID' => $uid,
            'PID' => $pid,
        ));

    }

}

function getMoreReadsByCat($e){

    global $wpdb;

    $results = $wpdb->get_results("SELECT COUNT(DISTINCT v.UID) AS vues, p.`post_title`, p.`guid` FROM `{$wpdb->prefix}posts` as p, {$wpdb->prefix}posts_views as v, `{$wpdb->prefix}terms` as t, `{$wpdb->prefix}term_relationships` as r  WHERE p.`post_type` = 'post' AND p.`ID` = r.`object_id` AND r.`term_taxonomy_id` IN (SELECT `term_id` FROM `{$wpdb->prefix}terms` WHERE `name` LIKE '%$e%') AND v.PID = p.ID GROUP BY v.PID ORDER BY vues DESC");

    foreach ($results as $item){
        echo "<li class='puce'><a href='$item->guid'>$item->post_title</a></li>";
    }

    return $results;

}

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