jQuery(document).ready(function($) {

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

    function MakeHHL() {

        var s = getParam('s');

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