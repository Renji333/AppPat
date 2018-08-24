$("nav#menu").find('li a[href="'+window.location.href+'"]').parent().addClass("Selected");

$("i#printBtn").click(function(){
    window.print();
});