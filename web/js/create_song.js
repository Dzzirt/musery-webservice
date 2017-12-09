$(document).ready(function () {
    $(".bem-modal-header__button_ok").click(function () {
        uploadFile();
    })
});

function uploadFile() {
    var blobFile = $('.image-upload')[0].files[0];
    var formData = new FormData(document.getElementById("create_song_form"));

    formData.append("thumbnail", blobFile);

    $rating = 0;
    for (let i = 1; i <= 5; i++) {
        if ($(".star" + i + " label").css("color") === "rgb(255, 215, 0)") {
            $rating++;
        }
    }

    formData.append("rating", $rating);

    $.ajax({
        url: "admin/new_song",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            // .. do something
        },
        error: function (jqXHR, textStatus, errorMessage) {
            console.log(errorMessage); // Optional
        }
    });
}