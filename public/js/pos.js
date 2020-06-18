const { update } = require("lodash");

$(function () {

    $('.tombolTambahProduct').on('click', function () {
        var table = $('.table_item');
        const id = $('#product').val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/pos-tambah-product';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {
                id: id
            },
            dataType: 'json',
            success: function (data) {
                $('.table_item > tbody:last-child').append(
                    '<tr>' +
                    '<td><h5 id="id_product">' + data.id + '</h5></td>' +
                    '<td><h5 id="nama_product">' + data.name + '</h5></td>' +
                    '<td><input type="number" id="qty" name="qty" value="1"></td>' +
                    '<td><input type="text" readonly class="form-control-plaintext" id="price_product" value="' + data.price + '"></td>' +
                    '<td><input type="number" id="discount" name="discount" value="0"></td>' +
                    '<td><h5 id="total_price">' + data.price + '</h5></td>' +
                    // '<td><input class="form-control" readonly id="total_price" val="' + data.price + '"></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm buttonremoveproduct">Remove</button></td>' +
                    '</tr>');

                
                // $(document).on('change', '#qty', function () {
                //     var total_harga = $(this).val() * $(this).closest('tr').find('#price_product').val();
                //     console.log(total_harga);
                // });


            }

        });

        $('.buttonremoveproduct').on('click', function () {
            $(this).closest('tr').remove();
            return false;
        });

    });

    $('#qty').change(function() {
        update_quantity(this);
    });

    function recalculate_cart()
    {
        var subtotal = 0;

        $('.table_item').each(function() {
            subtotal += parseFloat($(this).children('tr').text());
        });
    }

});
