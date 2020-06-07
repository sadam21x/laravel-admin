$(function() {

    $('.tomboltambahdata').on('click', function() {
        
        $('#modal-form-lable').html('Tambah Kategori Baru');
        $('.modal-footer button[type=submit]').html('TAMBAH');
        $('#name').val('');
    });

    $('.tomboleditdata').on('click', function() {
        
        $('#modal-form-lable').html('Edit Kategori');
        $('.modal-footer button[type=submit]').html('SIMPAN');
        $('.modal-body form').attr('action', '/categories-update');

        const id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/categories-edit';

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
                $('#name').val(data.name);
            }
        });

    });

});