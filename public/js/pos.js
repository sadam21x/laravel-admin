$(function () {

    /*
    Mencegah submit form via tombol enter
     */
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
    });

    /*
    Menampilkan list produk berdasarkan kategori yang dipilih
    */
    $('#categories').on('change', function() {
        var id_category = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/pos-kategori-product';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {id : id_category},
            dataType: 'json',
            success: function(data){
                console.log(data);
                $('#product').empty();

                $.each(data, function (id, name) {
                    $('#product').append(new Option(name, id));
                });
            }
        });

    });

    /*
    Menambahkan produk yang dipilih ke list trannsaksi (tabel)
    */
   var i = -1;
    $('.tombolTambahProduct').on('click', function () {
        var table = $('.table_item');
        const id = $('#product').val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/pos-tambah-product';
        i = i + 1;

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
                    '<tr class="product-row">' +
                    '<td class="product-id"><input type="text" readonly class="form-control-plaintext text-center" name="product_id[]" id="product_id_'+ i +'" value="' + data.id + '"></td>' +
                    // '<td class="product-name"><input type="text" readonly class="form-control-plaintext text-center" id="product_name_'+ i +'" name="product_name_'+ i +'" value="' + data.name + '"></td>' +
                    '<td class="product-name"><input type="text" readonly class="form-control-plaintext text-center" id="product_name_'+ i +'" name="product_name[]" value="' + data.name + '"></td>' +
                    '<td class="product-qty"><input type="number" min="1" id="product_qty_'+ i +'" name="product_qty[]" value="1"></td>' +
                    '<td class="product-price"><input type="number" readonly class="form-control-plaintext text-center" id="product_price_'+ i +'" name="product_price[]" value="' + data.price + '"></td>' +
                    '<td class="product-discount"><input type="number" min="0" max="100" id="product_discount_'+ i +'" name="product_discount[]" value="0"></td>' +
                    '<td class="product-final-price"><input type="number" readonly class="form-control-plaintext text-center" id="product_final_price_'+ i +'" name="product_final_price[]" value="' + data.price + '"></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm buttonremoveproduct">Remove</button></td>' +
                    '</tr>');

                    recalculateCart();

                    // trigger function update qty dan harga total
                    $('.product-qty input').on('change', function () {
                        var parent = $(this).parent().parent();
                        updateQty(this, parent);
                    });

                    // trigger function discount product
                    $('.product-discount input').on('change', function(){
                        var parent = $(this).parent().parent();
                        updateDiscount(this, parent);
                    });

                    // trigger function hapus product
                    $('.buttonremoveproduct').on('click', function() {
                        var parent = $(this).parent().parent();
                        removeProduct(parent);
                    });


                    // function kalkulasi ulang total keranjang belanja

                    function recalculateCart()
                    {
                        var total_price = 0;
                        var total_product = 0;

                        $('.product-final-price').each(function(){
                            var x = parseFloat( $(this).children().val() );
                            total_price += x;
                        });

                        $('.product-qty').each(function(){
                            var x = parseFloat( $(this).children().val() );
                            total_product += x;
                        });

                        $('#total_payment').val(total_price);
                        $('#total_item').val(total_product);

                    }

                    // function update qty dan harga total
                    function updateQty(qtyInput, parent)
                    {
                        var qty = $(qtyInput).val();
                        var price = $(parent).children('.product-price').children().val();
                        var final_price = qty * price;

                        $(parent).children('.product-final-price').children().val(final_price);

                        recalculateCart();
                    }

                    // function update discount dan harga
                    function updateDiscount(discountInput, parent)
                    {
                        var discount = $(discountInput).val();
                        var before_disc = $(parent).children('.product-final-price').children().val();
                        var price_disc = before_disc * discount / 100;
                        var after_disc = before_disc - price_disc; 

                        $(parent).children('.product-final-price').children().val(after_disc);

                        recalculateCart();
                    }

                    // function hapus product
                    function removeProduct(parent)
                    {
                        $(parent).remove();
                        recalculateCart();
                    }
            }

        });

    });

});
