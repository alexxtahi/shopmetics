$(document).ready(function(){
    $('#cartBtn').click(function(){
        
        var prod_id = $(this).closest('.prod_cont').find('.prod_id').val();
        var prod_qt = $(this).closest('.prod_cont').find('.prod_qt').val();
     
        
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
            success: function(response){
             alert(response.status)
            },
            error: function(jqXHR, status, err){
                alert(jqXHR.responseText);
            }
        });

        
    });
});


$('.btn-destroy').click(function (e){
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


})
