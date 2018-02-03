"use strict";

!function() {
    function n() {
        $("#responsive-nav ul").toggleClass("active"), $("#menu-opener").toggleClass("glyphicon-menu-hamburger");
    }
    function e() {
        var n = o();
        n && !s && (s = !0, t()), !n && s && (s = !1, a());
    }
    function t() {
        $("#sticky-navigation").addClass("fixed").removeClass("absolute"), $("#navigation").slideUp("fast"), 
        $("#sticky-navigation").slideDown("fast");
    }
    function a() {
        $("#sticky-navigation").removeClass("fixed").addClass("absolute"), $("#navigation").slideDown("fast"), 
        $("#sticky-navigation").slideUp("fast");
    }
    function i(n) {
        $.ajax({
            url: n.attr("action"),
            method: "POST",
            data: n.formObject(),
            dataType: "json",
            success: function() {
                document.getElementById("contact-form").reset(), swal("Mensaje Enviado!", "Te contactaremos lo más pronto", "success");
            }
        });
    }
    function o() {
        var n = $("#mensaje").height();
        return $(window).scrollTop() > $(window).height() - 3 * n;
    }
    var s = !1, c = 0;
    $("#contact-form").on("submit", function(n) {
        return n.preventDefault(), i($(this)), !1;
    }), $("#description").removeClass("hidden"), $("#sticky-navigation").removeClass("hidden"), 
    $("#sticky-navigation").slideUp(0), e(), function() {
        var n = new Date().getHours();
        (n < 6 || n > 17) && $("#is-open .text").html("Cerrado Ahora <br> Abierto de 8.00am a 6:00pm");
    }(), $("#menu-opener").click(n), $(".menu-link").click(n), setInterval(function() {
        c < 5 ? c++ : c = 0, $("#gallery .inner").css({
            left: "-" + 100 * c + "%"
        });
    }, 4e3), $(window).scroll(e);
}();