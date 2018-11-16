$(function() {
    $('nav#menu').mmenu({

        lazySubmenus: {
            load : true,
        },
        setSelected	: true,
        sidebar		: {
            expanded		: 800
        },
        navbar: {
            title: "Actualités",
        },
        navbars		: [
            {
                type		: 'tabs',
                content		: [
                    '<a href="#panel-actu"><img src="http://preprod-patritheque.harvest/wp-content/themes/AppPatTheme/img/actualites.svg" width="25"><span>Actualités</span></a>',
                    '<a href="#panel-fiscalite"><img src="http://preprod-patritheque.harvest/wp-content/themes/AppPatTheme/img/fiscalite.svg" width="25"><span>Fiscalité</span></a>',
                    '<a href="#panel-epargne"><img src="http://preprod-patritheque.harvest/wp-content/themes/AppPatTheme/img/placements.svg" width="25"><span>Placements</span></a>',
                    '<a href="#panel-immobilier"><img src="http://preprod-patritheque.harvest/wp-content/themes/AppPatTheme/img/immobilier.svg" width="25"><span>Immobilier</span></a>',
                    '<a href="#panel-famille"><img src="http://preprod-patritheque.harvest/wp-content/themes/AppPatTheme/img/famille.svg" width="30"><span>Famille et transmission</span></a>',
                    '<a href="#panel-retraite"><img src="http://preprod-patritheque.harvest/wp-content/themes/AppPatTheme/img/retraite.svg" width="23"><span>Retraite et prévoyance</span></a>',
                    '<a href="#panel-dirigeants"><img src="http://preprod-patritheque.harvest/wp-content/themes/AppPatTheme/img/dirigeants.svg" width="22"><span>Dirigeants</span></a>',
                    '<a href="#panel-outils"><img src="http://preprod-patritheque.harvest/wp-content/themes/AppPatTheme/img/outils.svg" width="22"><span>Outils</span></a>'
                ]
            }
        ]
    });

});

$(document).ready(function () {
    $('#panel-actu>.mm-navbar>.mm-navbar__title').wrapInner('<span class="icoActualite"></span>');
    $('#panel-fiscalite>.mm-navbar>.mm-navbar__title').text('Fiscalité').wrapInner('<span class="icoFiscalite"></span>');
    $('#panel-epargne>.mm-navbar>.mm-navbar__title').text( 'Placements').wrapInner('<span class="icoPlacements"></span>');
    $('#panel-immobilier>.mm-navbar>.mm-navbar__title').text( 'Immobilier').wrapInner('<span class="icoImmobilier"></span>');
    $('#panel-famille>.mm-navbar>.mm-navbar__title').text( 'Famille et transmission').wrapInner('<span class="icoFamille"></span>');
    $('#panel-retraite>.mm-navbar>.mm-navbar__title').text( 'Retraite et prévoyance').wrapInner('<span class="icoRetraite"></span>');
    $('#panel-dirigeants>.mm-navbar>.mm-navbar__title').text( 'Dirigeants').wrapInner('<span class="icoDirigeants"></span>');
    $('#panel-outils>.mm-navbar>.mm-navbar__title').text( 'Outils').wrapInner('<span class="icoOutils"></span>');
});