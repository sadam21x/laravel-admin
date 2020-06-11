$(function () {
    // Kabupaten/kota
    $('#state').on('change', function () {
        const id = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/customers-city';

        $.ajax({
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {id : id},
            dataType: 'json',
            success: function(data){
                $('#city').empty();

                $.each(data, function (id, name) {
                    // $('#city').append(new Option(name, id));
                    $('#city').append(new Option(name, name));
                });
            }
        });
    });
});
