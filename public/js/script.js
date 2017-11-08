var resizeTimer = null;

( function( $ ) {
	$( document ).ready( function() {
		//activateSelects();
		removeAlerts();
		radioButtonEvents();
		//activateTels();
		//loginFormPreSubmit();
		
	});

	// $( window ).resize( windowRezizeActions );

	function activateSelects() { $( 'select' ).select2( { minimumResultsForSearch: Infinity } ); }
	function activateLabel( label ) { label.addClass( 'active' ).siblings().removeClass( 'active' ); }

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

	function windowRezizeActions() {
		window.clearTimeout( resizeTimer );
		resizeTimer = window.setTimeout( function() {
			
		}, 100 );
	}

	function loginFormPreSubmit() {
		$( '[type="tel"]' ).each( function() {
			$( this ).closest( 'form' ).submit( function() {
				var form = $( this );
				var field = form.find( '[type="tel"]' );
				var code = form.find( '.selected-dial-code' ).html();
				field.val( code + field.val() );
			});
		});
	}

	function radioButtonEvents() {
		$( '[type="radio"]' ).each( function() {
			var field = $( this );
			if ( field.is( ':checked' ) ) activateLabel( field.closest( 'label' ) );
		});

		$( '[type="radio"]' ).click( function() {
			var label = $( this ).closest( 'label' );
			activateLabel( label );
		});
	}	

})( jQuery );