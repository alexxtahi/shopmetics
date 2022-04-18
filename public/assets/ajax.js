
$(document).ready(function () { // ajouter un produit au panier
    $('#cartBtn').click(function () {

        var prod_id = $(this).closest('.prod_cont').find('.prod_id').val();
        var prod_qt = $(this).closest('.prod_cont').find('.prod_qt').val();
        alert(prod_id)


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/test",
            data: {
                'prod_id': prod_id,
                'prod_qt': prod_qt,
            },
            dataType: 'json',
            success: function (response) {
                alert(response.status)
            },
            error: function (jqXHR, status, err) {
                alert(jqXHR.responseText);
            }
        });
    });


});



/*$('.btn-destroy').click(function (e){
    e.preventDefault() ;

    var prod_id = $(this).closest('.prod_general').find('.qt-dest').val();
    alert(prod_id) ;


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/destroy-product",
        data: {
            'prod_id': prod_id,
        },
        dataType: 'json',
        success: function(response){
         alert(response.status) ;
        },
        error: function(jqXHR, status, err){
            alert(jqXHR.responseText);
        }
    });


});*/

$(document).ready(function () {

    $('.incr').click(function (e) { // incrémenter la valeur de la quantité et mettre à jour
        e.preventDefault();

        var inc_value = $(this).closest('.prod_general').find('.prod_qt').val();
        var value = parseInt(inc_value, 10);


        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.prod_general').find('.prod_qt').val(value);
        }

    });

    $('.decr').click(function (e) { // décrémenter la valeur de la quantité et mettre à jour
        e.preventDefault();

        var dec_value = $(this).closest('.prod_general').find('.prod_qt').val();
        var value = parseInt(dec_value, 10);


        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.prod_general').find('.prod_qt').val(value);
        }

    });



});


// ! Fonction pour gérer la mise à jour de la quantité des articles du panier

$(document).ready(function () {

    $('.change_qt').click(function (e) {

        e.preventDefault();

        var $prod_id = $(this).closest('.prod_general').find('.qt-dest').val();
        var $prod_qt = $(this).closest('.prod_general').find('.prod_qt').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/quantite/update",
            data: {
                'prod_id': $prod_id,
                'prod_qt': $prod_qt,
            },
            dataType: 'json',
            success: function (response) {
                // alert(response.status); // affiche le statut de la requête Ajax (réussite ou échec)
                window.location.reload();
                //$('#refresh-cart').load(location.href + "#refresh-cart") ;
            },
            error: function (jqXHR, status, err) {
                alert(jqXHR.responseText);
            }
        });

    });

});

// Ajouter un produit directement au panier
$(document).ready(function () {

    $('.prod_id2').click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.prod_general2').find('.prod_id2').val();
        var prod_qt = 1;
        alert(prod_id)



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/test",
            data: {
                'prod_id': prod_id,
                'prod_qt': prod_qt,
            },
            dataType: 'json',
            success: function (response) {
                alert(response.status)
            },
            error: function (jqXHR, status, err) {
                alert(jqXHR.responseText);
            }
        });
    });


});



// ! Fonction pour gérer les moyen de paiement en ligne






