$(document).ready(function () {
    fixListPosition();
});

$(window).resize(function () {
    fixListPosition();
});

function fixListPosition() {
    var songList = $(".song_list");
    var toolbar = $(".toolbar");

    songList.css("transform", "translate(0, " + toolbar.height() + "px)");
}