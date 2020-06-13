$(function() {

    // Tambah data
    $('.tomboltambahdata').on('click', function() {
        $('#modal-form-lable').html('Tambah Produk Baru');
        $('.modal-footer button[type=submit]').html('TAMBAH');
        $('.modal-body form').attr('action', '/products');

        $('#category_id').val('');
        $('#name').val('');
        $('#price').val('');
        $('#stock').val('');
        $('#description-textarea').html('');
    });

    // Edit data
    $('.tomboleditdata').on('click', function() {
        $('#modal-form-lable').html('Edit Produk');
        $('.modal-footer button[type=submit]').html('SIMPAN');
        $('.modal-body form').attr('action', '/products-update');

        const id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/products-edit';

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
                $('#price').val(data.price);
                $('#stock').val(data.stock);
                $('#description-textarea').html(data.explanation);
            }
        });
    });
});