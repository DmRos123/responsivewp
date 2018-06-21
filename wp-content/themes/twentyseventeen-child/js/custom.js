$(document).ready(function(){
    $('#submit').click(function(){
        var chemotypes = [];        
        $('.get_value').each(function(){
            if($(this).is(":checked")  ){
                 chemotypes.push($(this).val() );   
            }
        });
        chemotypes = chemotypes.toString();
        $.ajax({
            url: ajaxurl,
            method:"POST",
           data:{

                'chemotypes': chemotypes,
            },
            error: function( response) {
                console.log(response);
            },
            success:function(data){
                $('.result').html(data);
            }
        });
    });
});

