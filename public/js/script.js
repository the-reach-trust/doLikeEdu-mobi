( function( $ ) {
	$( document ).ready( function() {
		activateSelects();
		activateTels();
		removeAlerts();		
	});

	function activateSelects() {
		$( 'select' ).select2( { minimumResultsForSearch: Infinity } );
	}

	function activateTels() {
		$( "input[type='tel']" ).intlTelInput( {
			initialCountry: 'na',
			onlyCountries: ["za", "na" ],
			utilsScript: "/js/utils.js",
			separateDialCode: true
		});
	}

	function removeAlerts() {
		var removeAlertsInSecs = 5;
		window.setTimeout( function() {
			$( '.alert' ).animate({
				right: '-100%'
			}, 1000, function() {
				$( this ).remove();
			});
		}, removeAlertsInSecs * 1000 );
	}

})( jQuery );