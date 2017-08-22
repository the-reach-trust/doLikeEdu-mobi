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
		if ( $sidebar ) return 'col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-11 col-lg-offset-1';
		else return config( 'front.progBodyClass' );
	}
	else return config( 'front.dfltBodyClass' );
}

function get_route_class( $route = null ) {
	// Defaults
	$route_name = 'not-identified';
	$determined_class = '';
	$progressive = '';

	// Array of unauthenticated pages
	$no_auth_pages = array( '/', 'auth/login', 'auth/register' );

	if ( !empty( $route ) ) {
		$route_name = str_replace( '/', '-', ( $route->uri == '/' ) ? 'welcome' : $route->uri );

		// If we're not looking at unauthenticated pages
		if ( !in_array( $route->uri, $no_auth_pages ) ) {			
			$determined_class = 'level-' . get_user_level();
		}
	}

	
	if ( config( 'front.progressiveDesktop' ) && Session::has('levelup_authentication') ) $progressive = 'desktop';
	
	return 'route-' . $route_name . ' ' . $determined_class . ' ' . $progressive; 
}

function get_user_level() {
	$points = Session::get('levelup_points');
	if ( $points && property_exists( $points, 'level' ) ) return $points->level;
	else return "1";
}

function get_points_object() {
	return (object) array(
		'points' => 0,
		'tokens' => 1,
		'level' => 1
	);
}
function get_dailys_complete()	{ return ( rand( 0, 1 ) == 1 ); }
function get_points() 			{ $points = get_points_object(); return $points->points; }
function get_tokens() 			{ $points = get_points_object(); return $points->tokens; }
function get_level()  			{ $points = get_points_object(); return $points->level; }