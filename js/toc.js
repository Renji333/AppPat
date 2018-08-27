$(function() {
    $('nav#menu').mmenu({
        setSelected	: true,
        counters	: true,
        sidebar		: {
            collapsed		: {
                use 			: '(min-width: 450px)',
                size			: 40,
                hideNavbar		: false
            },
            expanded		: 800
        },
        navbar: {
            title: "Actualités",
        },

        navbars		: [
            {
                type		: 'tabs',
                content		: [
                    '<a href="#panel-actu"><img src="http://localhost:8282/wordpress/wp-content/themes/AppPat/img/actualites.svg" width="25"><span>Actualités</span></a>',
                    '<a href="#panel-fiscalite"><img src="http://localhost:8282/wordpress/wp-content/themes/AppPat/img/fiscalite.svg" width="25"><span>Fiscalité</span></a>',
                    '<a href="#panel-famille"><img src="http://localhost:8282/wordpress/wp-content/themes/AppPat/img/famille.svg" width="30"><span>Famille et transmission</span></a>',
                    '<a href="#panel-epargne"><img src="http://localhost:8282/wordpress/wp-content/themes/AppPat/img//epargne.svg" width="25"><span>Épargne et placements</span></a>',
                    '<a href="#panel-retraite"><img src="http://localhost:8282/wordpress/wp-content/themes/AppPat/img/retraite.svg" width="23"><span>Retraite et prévoyance</span></a>',
                    '<a href="#panel-credits"><img src="http://localhost:8282/wordpress/wp-content/themes/AppPat/img/credits.svg" width="25"><span>Crédits et assurance</span></a>',
                    '<a href="#panel-dirigeants"><img src="http://localhost:8282/wordpress/wp-content/themes/AppPat/img/dirigeants.svg" width="22"><span>Dirigeants</span></a>',
                    '<a href="#panel-dossiers"><img src="http://localhost:8282/wordpress/wp-content/themes/AppPat/img/dossiers.svg" width="25"><span>Dossiers</span></a>',
                    '<a href="#panel-outils"><img src="http://localhost:8282/wordpress/wp-content/themes/AppPat/img/outils.svg" width="22"><span>Outils</span></a>'
                ]
            }
        ]
    });

});

$(document).ready(function () {
    $('#panel-actu>.mm-navbar>.mm-navbar__title').wrapInner('<span class="icoActualite"></span>');
    $('#panel-fiscalite>.mm-navbar>.mm-navbar__title').text('Fiscalité').wrapInner('<span class="icoFiscalite"></span>');
    $('#panel-famille>.mm-navbar>.mm-navbar__title').text( 'Famille et transmission').wrapInner('<span class="icoFamille"></span>');
    $('#panel-epargne>.mm-navbar>.mm-navbar__title').text( 'Épargne et placements').wrapInner('<span class="icoEpargne"></span>');
    $('#panel-retraite>.mm-navbar>.mm-navbar__title').text( 'Retraite et prévoyance').wrapInner('<span class="icoRetraite"></span>');
    $('#panel-credits>.mm-navbar>.mm-navbar__title').text( 'Crédits et assurance').wrapInner('<span class="icoCredits"></span>');
    $('#panel-dirigeants>.mm-navbar>.mm-navbar__title').text( 'Dirigeants').wrapInner('<span class="icoDirigeants"></span>');
    $('#panel-dossiers>.mm-navbar>.mm-navbar__title').text( 'Dossiers').wrapInner('<span class="icoDossiers"></span>');
    $('#panel-outils>.mm-navbar>.mm-navbar__title').text( 'Outils').wrapInner('<span class="icoOutils"></span>');
});