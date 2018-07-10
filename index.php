<?php

require 'vendor/autoload.php';

if ( ! isset($_GET['template']) ) {
	print 'missing param template';
	http_response_code(500);
	exit();
}

if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) {
	http_response_code(500);
	exit();
}

$payload = file_get_contents("php://input");

if ( empty($payload) ) {
	$payload = "{}";
}

$data = json_decode($payload, true);

if ( JSON_ERROR_NONE != json_last_error() ) {
	print json_last_error_msg();
	http_response_code(500);
	exit();
}

$loader = new Twig_Loader_Filesystem('/templates');
$twig = new Twig_Environment($loader, [
	'debug' => true,
	'cache' => false,
	'strict_variables' => true
]);

try {
	$content = $twig->render($_GET['template'], $data);
} catch (Exception $e) {
	print $e->getMessage();
	http_response_code(500);
	exit();
}

print $content;
http_response_code(200);
