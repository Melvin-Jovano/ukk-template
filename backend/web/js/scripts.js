/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);

document.onkeyup = function (e) {
    if (e.ctrlKey && e.which == 66) {
        $("#search-input").contentEditable = true;
        $("#search-input").focus();
    }
};

$("#search-form").on('submit', (event) => {
    event.preventDefault();
    let formData = new FormData;
    formData.append("name", $("#search-input").val());
    formData.append("level", $("#user-level").val());
    $.ajax({
        url: "/action/get-shortcut",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: (data) => {
            if (!data) {
                alert("Terjadi Kesalahan");
            }
        }
    });
});

// $("#userDropdown").click(() => {
//     $("#dropdown-user").slideToggle();
// });