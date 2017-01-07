<?php

use Illuminate\Http\Request;

/**
 * link to named route with return url
 * @param  string $routeName [named route]
 * @param  array $routeParams [route parameters]
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

function flash($title = null, $message = null)
{
    $flash = app('App\Http\Flash');
    if (func_num_args() == 0) {
        return $flash;
    }
    return $flash->message($title, $message);
}

function photosToString($glue, $photos)
{
    $str = '';
    foreach ($photos as $photo) {
        $str .= $photo . ',';
    }
    trim($str, ',');
    return $str;
}