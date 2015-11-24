( function( $ ) {

    // sidebar
    $( document ).ready( function() {

        $( "#sidebar_nav .nav-toggle" ).click( function() {
            var nav_toggle = $( this );
            $( this ).next( ".sub-nav" ).slideToggle( 200, function() {
                $( this ).parent( '.nav-item' ).toggleClass( "open" );
            } );
        } );

        $( "#toggle_sidebar_left" ).click( function() {
            $( "body" ).addClass( "open-sidebar-left" );
        } );
        $( "#sidebar_overlay" ).click( function() {
            $( "body" ).removeClass( "open-sidebar-left" );
        } );

    } );


}( jQuery ) );