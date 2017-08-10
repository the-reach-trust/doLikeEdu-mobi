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
			if ( $sidebar ) return 'col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-4';
			else return config( 'front.progBodyClass' );
		}
		else return config( 'front.dfltBodyClass' );
	}

	function get_route_class( $route = null ) {
		$route_name = 'home';
		if ( !empty( $route ) ) {
			$route_name = str_replace( '/', '-', ( $route->uri == '/' ) ? 'welcome' : $route->uri );
		}
		$determined_class = 'level-1';
		return 'route-' . $route_name . ' ' . $determined_class; 
	}