( function( $ ) {
	$( document ).ready( function() {
		$( 'select' ).select2( { minimumResultsForSearch: Infinity } );
		$( "input[type='tel']" ).intlTelInput( {
			initialCountry: 'na',
			onlyCountries: ["za", "na" ],
			utilsScript: "/js/utils.js",
			separateDialCode: true
		});
	});
})( jQuery );