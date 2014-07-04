( function( $ ){
    // BLOG NAME & DESCRIPTION    
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '#site-title a' ).html( to );
        } );
    } );
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '#site-description' ).html( to );
        } );
    } );
        
    // COLORS        
    wp.customize('body_color',function( value ) {
        value.bind(function(to) {
            $('body').css('color', to ? to : '' );
        });
    });   
                    
    wp.customize('menu_color',function( value ) {
        value.bind(function(to) {
            $('.main-menu nav a').css('color', to ? to : '' );
        });
    });      

	wp.customize('menu_background',function( value ) {
        value.bind(function(to) {
            $('.main-menu').css('background-color', to ? to : '' );
        });
    });      	
	
    wp.customize('footer_background',function( value ) {
        value.bind(function(to) {
            $('footer').css('background-color', to ? to : '' );			
        });
    });
    
               
    //STATIC TEXT    
    wp.customize( 'copyright_text', function( value ) {
        value.bind( function( to ) {
            $( 'footer' ).html( to );
        } );
    } );
    
  
} )( jQuery );