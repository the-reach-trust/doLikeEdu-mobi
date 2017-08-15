<?php

function get_body_class( $route = null, $sidebar = false ) {
	$defaultClasses = array(
		'route-auth-login',
		'route-auth-register'
	);
	if ( $route ) {
		if ( in_array( get_route_class( $route ), $defaultClasses  ) )
			return config( 'front.dfltBodyClass' );
	}

	if ( config( 'front.progressiveDesktop' ) ) {
		if ( $sidebar ) return 'col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-7 col-lg-offset-4';
		else return config( 'front.progBodyClass' );
	}
	else return config( 'front.dfltBodyClass' );
}

function get_route_class( $route = null ) {
	// Defaults
	$route_name = 'not-identified';
	$determined_class = '';

	// Array of unauthenticated pages
	$no_auth_pages = array( '/', 'auth/login', 'auth/register' );

	if ( !empty( $route ) ) {
		$route_name = str_replace( '/', '-', ( $route->uri == '/' ) ? 'welcome' : $route->uri );

		// If we're not looking at unauthenticated pages
		if ( !in_array( $route->uri, $no_auth_pages ) ) {			
			$determined_class = 'level-' . get_user_level();
		}
	}		
	
	return 'route-' . $route_name . ' ' . $determined_class; 
}

function get_user_level() {
	$points = Session::get('levelup_points');
	if ( $points && property_exists( $points, 'level' ) ) return $points->level;
	else return "1";
}