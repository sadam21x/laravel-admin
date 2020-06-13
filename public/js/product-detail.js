$(function() {

    $('.tomboldetail').on('click', function() {
        const id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/products-detail';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {id : id},
            dataType: 'json',
            success: function(data){
                $('#detail-id').html(data.id);
                $('#detail-category').html(data.category_id);
                $('#detail-name').html(data.name);
                $('#detail-price').html(data.price);
                $('#detail-stock').html(data.stock);
                $('#detail-explanation').html(data.explanation);
            }
        });

    });

});