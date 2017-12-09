$(document).ready(function () {
    var startColor = "#ddd";
    var selectedCount = 0;

    function changeStarsColor(count) {
        var classes = $(this).attr("class").toString();
        var starNumber = classes.charAt(classes.length - 1);
        for (var i = 1; i <= count; i++) {
            $(".star" + i + " label").css("color", "#FFD700");
        }
    }

    var rating = $(".rating");

    rating.hover(
        function () {
            var classes = $(this).attr("class").toString();
            changeStarsColor.call(this, classes.charAt(classes.length - 1));
        },
        function () {
            for (var i = 1; i <= 5; i++) {
                $(".star" + i + " label").css("color", startColor);
            }
            changeStarsColor.call(this, selectedCount);
        }
    );

    rating.click(function () {
        var classes = $(this).attr("class").toString();
        selectedCount = classes.charAt(classes.length - 1);
    });
});