$(document).ready(function()
{
    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
        $(".bem-modal-body__image-preview").css("background-image", "url(../avatar-placeholder.png)")
        for (var i = 1; i <= 5; i++) {
            $(".reset .star" + i + " label").css("color", "#ddd");
        }
    });
});