jQuery(document).ready(function($) {

    var currentId = parseInt($(".mm-listitem_selected").find('a').attr("page-htm-id"));

    if(currentId != 0) {

        $("#seq_prev").parent().css("display", "inline-block");

        $("#seq_prev").parent().click(function () {
            var prev = currentId - 1;
            window.location.href = $("a[page-htm-id='" + prev + "']").attr('href');
            return false;
        });

    }

    var next = currentId + 1;

    if($("a[page-htm-id='"+next+"']").attr("href") != undefined){

        $("#seq_next").parent().css("display","inline-block");

        $("#seq_next").parent().click(function () {
            window.location.href = $("a[page-htm-id='"+next+"']").attr('href');
            return false;
        });

    }

    var rhhlTerms = getCookie("rhhl");

    MakeHHL();

    // Print Article
    $("i#printBtn").click(function () {
        window.print();
    });

    // Surlignage
    $('#tintBtn').click(function () {

        if (rhhlTerms) {
            rhhlTerms = false;
            setCookie("rhhl", rhhlTerms,365);
        } else {
            rhhlTerms = true;
            setCookie("rhhl", rhhlTerms,365);
        }

        MakeHHL();

        return false;

    });

    // fonction qui récupère les paramètres de recherche dans l'url et surlignera ces termes dans la page.
    function MakeHHL() {

        var s = getParam('query');

        if (rhhlTerms) {

            if (s && s != "") {

                if (s.indexOf('"') != -1) {
                    var tab = s.split('"'), ret = [];
                    tab.forEach(function (txt) {
                        if (txt != "") {
                            ret.push($.trim(txt));
                        }
                    });
                    $("#currentPost").markRegExp(new RegExp(ret.join("|"), 'gmi'));
                } else {
                    $("#currentPost").mark(s);
                }

            }

            $('#tintBtn').css('color',"#efa612");

        } else {

            $("#currentPost").unmark();
            $('#tintBtn').css('color',"#0065A5");

        }

    }

});