$(function() {

    $('.modal-footer button[type=submit]').on('click', function() {
        var product_desc = $('#description-textarea').val();
        $('#explanation').val(product_desc); 
    });
});