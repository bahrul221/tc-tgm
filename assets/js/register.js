( function( $ ) {
    $( document ).ready( function() {
        if ( $().validate ) {
            $( "#form_register" ).validate( {
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    conf_password: {
                        equalTo: "#reg_password"
                    }
                },
                invalidHandler: function( event, validator ) { //display error alert on form submit              
                },
                highlight: function( element ) { // hightlight error inputs
                    $( element ).closest( '.form-group' ).addClass( 'has-error' ); // set error class to the control group
                },
                unhighlight: function( element ) { // revert the change done by hightlight
                    $( element ).closest( '.form-group' ).removeClass( 'has-error' ); // set error class to the control group
                },
                success: function( label ) {
                    label.closest( '.form-group' ).removeClass( 'has-error' ); // set success class to the control group
                },
                errorPlacement: function( error, element ) {
                    var input_group = element.parent( ".input-group" );
                    error.insertAfter( input_group );

                },
            } );
        }
    } );
}( jQuery ) );
    