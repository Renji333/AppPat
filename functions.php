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
        wp_die('Login failed. Wrong password or user name ?');
    }

    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;

});

function getCurrentLink(){
	return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function getCurrentLinkWithoutParams(){
	return explode("?",set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ))[0];
}

function cleanExcerpt($title,$excerpt){
    $title = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", str_replace("–","-",$title))));
    $excerpt = trim($excerpt);
    $str = preg_replace("/$title Résumé/mi", "", $excerpt);
    $str = preg_replace("/$title /mi", "", $str);
    $str = str_replace("$title Résumé", "", $str);
    $str = str_replace("$title", "", $str);
    echo "<p>$str</p>";
}

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

    $date = date('Y-m-d H:i:s',time()-(14*86400));

    $results = $wpdb->get_results("SELECT COUNT(DISTINCT v.UID) AS vues, p.`post_title`, p.`guid` FROM `{$wpdb->prefix}posts` as p, {$wpdb->prefix}posts_views as v, `{$wpdb->prefix}terms` as t, `{$wpdb->prefix}term_relationships` as r  WHERE p.post_date <= '$date' AND p.`post_type` = 'post' AND p.`ID` = r.`object_id` AND r.`term_taxonomy_id` IN (SELECT `term_id` FROM `{$wpdb->prefix}terms` WHERE `name` LIKE '%$e%') AND v.PID = p.ID GROUP BY v.PID ORDER BY vues DESC LIMIT 0,5");

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

function makeFiltrePat($e,$home,$s){

    $categories = get_categories(array( 'parent' => $e ));
    $count = 0 ;

    if($categories){

        foreach ($categories as $c) {

            $select = "";

            if(isset($_GET['categorie_id'])){

                if(intval($_GET['categorie_id']) == $c->term_id){
                    $select = "selected";
                }

            }

            echo "<option data-id-option='$count' value='".$home.'?s='.$s.'&all=pat&categorie_id='.$c->term_id."' ".$select.">".$c->cat_name."</option>";

            $sub_categories = get_categories(array( 'parent' => $c->term_id ));

            if($sub_categories){
                makeFiltrePat($c->term_id,$home,$s);
            }

            $count += 1 ;

        }

    }

}

function pressPagination($pages = '', $range = 2)
{
    global $paged;
    $showitems= ($range * 2)+1;
 
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
                   $pages = 1;
        }
    }
 
    if(1 != $pages)
    {
        echo "<div class='pagination'>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
         
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }
 
        if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
           if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
           echo "</div>";
       }
 
}