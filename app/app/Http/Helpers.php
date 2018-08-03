<?php

/**
 * Set current menu item to 'active'
 *
 * @param string The route/path
 * @param string The attribute/value to add to element
 *
 * @return string The attribute/value
 *
 * How to use:
 *
 * set_active([LaravelLocalization::getCurrentLocale() . '/home'])
 *
 */
function set_active($path, $active = 'class=active') {

    return call_user_func_array('Request::is', (array)$path) ? $active : '';

}


/**
 * Remove/strip a URL parameter
 *
 * @param string The URL or $_SERVER['REQUEST_URI']
 * @param string The parameter to remove
 *
 * @return string The new URL path with preexisting parameters
 *
 * How to use:
 *
 * strip_url_parameter($edit_account_href, 'edit')
 *
 */
function strip_url_parameter($url, $param) {

    $url = parse_url($url);
    parse_str($url['query'], $parsed_params);
    unset($parsed_params[$param]);
    $new_params = http_build_query($parsed_params);
    $new_target = $url['path'] . '?' . $new_params;

    return $new_target;

}

?>