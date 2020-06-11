$(function() {

    $('.tomboldetail').on('click', function() {
        const id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/customers-detail';

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
                $('#detail-name').html(data.first_name + ' ' + data.last_name);
                $('#detail-phone').html(data.phone);
                $('#detail-email').html(data.email);
                $('#detail-street').html(data.street);
                $('#detail-city').html(data.city);
                $('#detail-state').html(data.state);
                $('#detail-zip').html(data.zip_code);
            }
        });

    });

});