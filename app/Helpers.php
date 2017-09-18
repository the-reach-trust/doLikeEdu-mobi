<?php

function get_body_class( $route = null, $sidebar = false ) {
	$defaultClasses = array(
		'route-auth-login',
		'route-auth-register'
	);
	if ( $route ) {
		if ( in_array( trim( get_route_class( $route ) ), $defaultClasses  ) )
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
	return Session::get('levelup_points');
}
function get_dailys_complete()	{ return ( rand( 0, 1 ) == 1 ); }
function get_points() 			{ $points = get_points_object(); return $points->points; }
function get_level()  			{ $points = get_points_object(); return $points->level; }
function get_firstname()		{ return Session::get('levelup_firstname'); }
function get_tokens() 			{ return Session::get('levelup_quiz_completed'); }

function is_topic_page( $topic_id ) {
	return ( array_values(array_slice(explode( '/', Request::path()), -2))[0] != 'category' && $topic_id == array_values(array_slice(explode( '/', Request::path()), -1))[0] );
}

function is_category_page( $category_id ) {
	if ( array_values(array_slice(explode( '/', Request::path()), -2))[0] != 'category'  )
		return ( $category_id == array_values(array_slice(explode( '/', Request::path()), -2))[0] );
	else
		return ( $category_id == array_values(array_slice(explode( '/', Request::path()), -1))[0] );
}