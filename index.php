<?php 

$request = [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD'],
    'path' => $_SERVER['PATH_INFO'],
    'useragent' => $_SERVER['HTTP_USER_AGENT'],
];

$headers = getallheaders();

$resolver = match($request['uri']) {
    "/home" => [
        "method" => "GET",
        "class" => HomeController::class,
    ],
};

if(!in_array($request['method'], $resolver['method'])) {
    // Throw an error
}

($resolver['class'])();