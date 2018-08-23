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
                    '<a href="#panel-actu"><img src="../img/actualites.svg" width="25"><br /><span>Actualités</span></a>',
                    '<a href="#panel-fiscalite"><img src="img/fiscalite.svg" width="25"><br /><span>Fiscalité</span></a>',
                    '<a href="#panel-famille"><img src="img/famille.svg" width="30"><br /><span>Famille et transmission</span></a>',
                    '<a href="#panel-epargne"><img src="img/epargne.svg" width="25"><br /><span>Épargne et placements</span></a>',
                    '<a href="#panel-retraite"><img src="img/retraite.svg" width="23"><br /><span>Retraite et prévoyance</span></a>',
                    '<a href="#panel-credits"><img src="img/credits.svg" width="25"><br /><span>Crédits et assurance</span></a>',
                    '<a href="#panel-dirigeants"><img src="img/dirigeants.svg" width="22"><br /><span>Dirigeants</span></a>',
                    '<a href="#panel-dossiers"><img src="img/dossiers.svg" width="25"><br /><span>Dossiers</span></a>',
                    '<a href="#panel-outils"><img src="img/outils.svg" width="22"><br /><span>Outils</span></a>'
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