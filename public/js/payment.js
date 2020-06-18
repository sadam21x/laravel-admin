$(function(){
    // Metode pembayaran
    $('#payment_method').change(function(){

        var pym = $('#payment_method').val();

        if (pym == 'ovo')
        {
            $('#ifYes').attr('style', 'display: block;');
            $('#card_number').attr('placeholder', 'OVO phone number . .').attr('type', 'number');
        }
        else if (pym == 'gopay')
        {
            $('#ifYes').attr('style', 'display: block;');
            $('#card_number').attr('placeholder', 'Gopay phone number . .').attr('type', 'number');
        }
        else if (pym == 'debit_card')
        {
            $('#ifYes').attr('style', 'display: block;');
            $('#card_number').attr('placeholder', 'Card number . .');
        }
        else if (pym == 'cash')
        {
            $('#ifYes').attr('style', 'display: none;');
        }
    });

    // Total bayar
    $('.table_item > tbody:last-child').on('change', function() {
        var price_total = $('#price_total').val();
        var jumlah_product = $('.table_item tr').length;
        console.log(jumlah_product);
    });
});