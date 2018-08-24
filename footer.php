        <footer>
            <ul>
                <li>Mentions légales</li>
                <li>|</li>
                <li>Conditions d'utilisation</li>
                <li>
                    <span>
                        <?php
                            if(get_option( 'integrale' )){
                                echo get_option( 'integrale' );
                            }else{
                                echo "Patrithèque Avril 2018";
                            }
                        ?>
                    </span>
                </li>
                <li>
                    <img src="https://www.harvest.fr/wp-content/uploads/2016/09/cropped-logo_Harvest_400x87.png" alt="logo">
                </li>
            </ul>
        </footer>

        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.mmenu.all.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/toc.js"></script>

        <?php if(is_single() && 'post' == get_post_type()) {
            echo "<script type='text/javascript' src='".get_stylesheet_directory_uri()."/js/single.js'></script>";
        }?>

        <?php wp_footer();?>

    </body>
</html>