$(document).ready(function(){
    $('#submit').click(function(){
        var insert = [];        
        $('.get_value').each(function(){
            if($(this).is(":checked")  ){
                 insert.push($(this).val() );   
            }
        });
        insert = insert.toString();
        $.ajax({
            url: ajax_call.ajaxurl,
            method:"POST",
           data:{
                'action': 'my_action_callback',
                'insert': insert,
            },
            success:function(data){
                $('.result').html(data);
            }
        });
    });
});

//Confused from here.