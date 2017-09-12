$(document).ready(function() {

    $('#form-amazon').submit(function(e){

        e.preventDefault();

        var form = $('#form-amazon');

        if ($('#form-amazon input[name="asinProduct"]').val() != '') {
            $.ajax({
                url: "amazon",
                type: "GET",
                dataType: "json",
                data: form.serialize(),
                success: function (data) {
                    if (!data.error) {
                        $('#asinModal').modal('hide');
                        $('.info-hide').show();
                        $('#loadProductInfo').show();

                        $('#idProduct').html(data.id);
                        $('#idProductInput').val(data.id);

                        $('#asinProduct').html(data.asin);
                        $('#asinProductInput').val(data.asin);

                        $('#titleProduct').html(data.title);
                        $('#titleProductInput').val(data.title);

                        $('#priceProduct').html(data.itemPrice.price + ' ' + data.itemPrice.currencyCode);
                        $('#priceProductInput').val(data.itemPrice.price);
                        $('#currencyCodeProductInput').val(data.itemPrice.currencyCode);

                        $('#pictureProduct').attr('src', data.image);
                        $('#pictureProductInput').val(data.image);

                        $('#eanProduct').html(data.ean);
                        $('#eanProductInput').val(data.ean);

                        $('#brandProduct').html(data.brand);
                        $('#brandProductInput').val(data.brand);

                        $('#asinProduct').attr('val', '');
                        $('#form-amazon input[name="asinProduct"]').val('');
                    }
                    else {
                        alert(data.error);
                    }

                },
                error: function (error) {
                    alert('JSON Error');
                }
            });
        }
        else
        {
            alert('Please, enter ASIN!');
        }
    });
});