<nav id="menu" class="toc">

    <!-- actu -->
    <div id="panel-actu">
        <ul>
            <li><a href="#/">Toute l'actualité</a></li>
            <li><a href="#/">Fiscalité</a></li>
            <li><a href="#/">Famille et transmission</a></li>
            <li><a href="#/">Épargne et placements</a></li>
            <li><a href="#/">Retraite prévoyance</a></li>
            <li><a href="#/">Crédits et assurance</a></li>
            <li><a href="#/">Dirigeants</a></li>
        </ul>
    </div>
    <!-- actu -->

    <?php

        global $wpdb;
        echo $wpdb->get_results("SELECT * FROM {$wpdb->prefix}tocs WHERE aides = 'integrale' ")[0]->content;

        ?>

</nav>