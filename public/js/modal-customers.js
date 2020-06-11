$(function() {

    // Tambah data
    $('.tomboltambahdata').on('click', function() {
        $('#modal-form-lable').html('Tambah Pelanggan Baru');
        $('.modal-footer button[type=submit]').html('TAMBAH');
        $('.modal-body form').attr('action', '/customers');

        $('#first_name').val('');
        $('#last_name').val('');
        $('#phone').val('');
        $('#email').val('');
        $('#street').val('');
        $('#zip_code').val('');
    });

    // Edit data
    $('.tomboleditdata').on('click', function() {
        $('#modal-form-lable').html('Edit Pelanggan');
        $('.modal-footer button[type=submit]').html('SIMPAN');
        $('.modal-body form').attr('action', '/customers-update');

        const id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/customers-edit';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {id : id},
            dataType: 'json',
            success: function(data){
                $('#id').val(data.id);
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#street').val(data.street);
                $('#zip_code').val(data.zip_code);
            }
        });
    });
});