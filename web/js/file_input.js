

function initImageUpload(box) {

    let uploadField = $('.bem-button_theme_upload');

    console.log("initImageUpload");

    uploadField.change(function (e) {
            console.log("getFile");
            let file = e.target.files[0];
            checkType(file);
        }
    );

    function previewImage(file){
        console.log(file);
        let thumb = $('.bem-modal-body__image-preview'),
            reader = new FileReader();

        reader.onload = function() {
            thumb.css("backgroundImage", 'url(' + reader.result + ')');
        };
        reader.readAsDataURL(file);
        thumb.className += ' js--no-default';
    }

    function checkType(file){
        let imageType = /image.*/;
        if (!file.type.match(imageType)) {
            throw 'Datei ist kein Bild';
        } else if (!file){
            throw 'Kein Bild gewählt';
        } else {
            previewImage(file);
        }
    }

}

$(document).ready(function () {
    let box = $('.bem-modal-body__cover');
    let uploadOptions = $('.bem-button');
    initImageUpload(box);

    box.hover(function () {
        console.log("in");
        uploadOptions.removeClass("fadeout").addClass("fadein");
    }, function () {
        console.log("out");
        uploadOptions.removeClass("fadein").addClass("fadeout");
    });


});