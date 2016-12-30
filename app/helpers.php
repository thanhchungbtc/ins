<?php

use Illuminate\Http\Request;

/**
 * link to named route with return url
 * @param  string $routeName   [named route]
 * @param  array  $routeParams [route parameters]
 * @return \Illuminate\Routing\Route|object|string
 */
function link_to_route($routeName, $routeParams = null)
{
	$params = ['returnUrl' => request()->url()];
	if ($routeParams != null) {
		$params = array_merge($routeParams, $params);
	}
	return route($routeName, $params);
}