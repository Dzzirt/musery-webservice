function slideTo(menuItem) {
    var underline = $(".underline");
    var menu = $(".menu");

    var leftMenuOffset = menu.offset().left;
    underline.css("transform", "translate(" + (menuItem.offset().left - leftMenuOffset).toString() + "px, -0.1em)");
}

function updateUnderlineWidthTo(menuItem) {
    var underline = $(".underline");
    underline.css("width", menuItem.width());
}

$(document).ready(function () {
    var songs = $(".songs p");
    var charts = $(".charts p");
    var users = $(".users p");

    $(".nav_button").click(function () {
        var current = $(this);
        $(".underline").css("transition-duration", "0.3s");


        if (current.hasClass("songs")) {
            slideTo(songs);
            updateUnderlineWidthTo(songs);
        } else if (current.hasClass("charts")) {
            slideTo(charts);
            updateUnderlineWidthTo(charts);
        } else if (current.hasClass("users")) {
            slideTo(users);
            updateUnderlineWidthTo(users);
        }
    });


});

$(window).resize(function () {
    var songs = $(".songs p");
    $(".underline").css("transition-duration", "0s");
    slideTo(songs);
    updateUnderlineWidthTo(songs);
});