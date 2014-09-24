<?php

/* Author: Pedro A. Hortas
 * Email: pah@ucodev.org
 * Date: 24/09/2014
 */

$__controller = null;
$__function = null;
$__args = null;
$__args_list = '';

/* Get request URI */
$__uri = explode('/', $_SERVER['REQUEST_URI']);

$__a_koffset = array_search('index.php', $__uri);
$__a_count = count($__uri) - ($__a_koffset + 1);

/* Extract controller */
if (($__a_count >= 1) && $__uri[$__a_koffset + 1]) {
	$__controller = strtolower($__uri[$__a_koffset + 1]);

	if (!preg_match('/^[a-z0-9_]+$/', $__controller)) {
		die('Controller name contains invalid characters.');
		header('HTTP/1.1 403 Forbidden');
	}
}

/* Extract function */
if (($__a_count >= 2) && $__uri[$__a_koffset + 2]) {
	$__function = strtolower($__uri[$__a_koffset + 2]);

	if (!preg_match('/^[a-z0-9_]+$/', $__function)) {
		die('Function name contains invalid characters.');
		header('HTTP/1.1 403 Forbidden');
	}
}

/* Extract args */
if (($__a_count >= 3) && $__uri[$__a_koffset + 3]) {
	$__args = array_slice($__uri, $__a_koffset + 3);

	foreach ($__args as $__arg)
		$__args_list .= '\'' . str_replace('\'', '\\\'', $__arg) . '\',';

	$__args_list = rtrim($__args_list, ',');
}

/* Load core controllers */
include('core/uweb.php');

/* Load requested controller, if any */
if ($__controller) {
	include('controllers/' . $__controller . '.php');

	eval('$__r_ = new UW_' . ucfirst($__controller) . ';');

	/* Call requested function, if any */
	if (!$__function)
		$__function = 'index';

	eval('$__r_->' . $__function . '(' . $__args_list . ');');
} else {
	echo('No controller defined in the request. Nothing to process.<br />');
}


