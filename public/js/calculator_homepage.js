$(document).ready(function () {

    $body = $("body");
    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); },

    });

    $('#js-currency-src-selector').on("change",function (e) {
        e.preventDefault();
        updateExchange('js-currency-src-input','js-currency-src-selector','js-currency-tgt-input','js-currency-tgt-selector');
    });

    $('#js-currency-src-input').on("change",function (e) {
        $("select#js-currency-src-selector").change();
    });

    $('#js-currency-tgt-selector').on("change",function (e) {
        $("select#js-currency-src-selector").change();
    });

    $('#js-currency-tgt-input').on("change",function (e) {
        updateExchange('js-currency-tgt-input','js-currency-tgt-selector','js-currency-src-input','js-currency-src-selector');
    });


    function updateExchange(src_input, src_select, tgt_input, tgt_select) {
        $('.alert').hide();

        var from_currency = $('#'+src_select+' option:selected').val();
        var to_currency = $('#'+tgt_select+' option:selected').val();

        if(from_currency != to_currency) {
            $.ajax({
                method: 'POST',
                url: $('#exchange_url').val(),
                data: {
                    'from_currency': from_currency,
                    'to_currency': to_currency,
                    'quantity': $('#' + src_input).val()
                },
            }).done(function (data) {
                $('#' + tgt_input).val(data.value);
                $('#exchange_text_src').html($('#' + src_input).val() + ' ' + $('#' + src_select + ' option:selected').text() + ' equals');
                $('#exchange_text_tgt').html($('#' + tgt_input).val() + ' ' + $('#' + tgt_select + ' option:selected').text());
            })
        }else{
            $('#alert_txt').html("Please choose the different currency to convert!!");
            $('.alert').show();
          }
    }


    $(function () {
        $('#js-currency-tgt-selector').trigger('change');
    });

});