//jquery-ui-tooltips


(function($){
  
  $( ".tooltip" ).tooltip({
  });
  $( "#hide-option" ).tooltip({
  });
  $( document ).tooltip({
    track: true
  });

})(jQuery);



// Getter
//var content = jQuery( ".tooltip" ).tooltip( "option", "content" );
 
// Setter
jQuery( ".tooltip" ).tooltip( "option", "content", "This is so cool!  How about something new?" );

// Getter
//var show = jQuery( ".tooltip" ).tooltip( "option", "show" );
 
 //Setter
jQuery( ".tooltip" ).tooltip( "option", "show", { effect: "slideDown", duration: 400 } );
jQuery( "#hide-option" ).tooltip( "option", "content", "This is new content." );

