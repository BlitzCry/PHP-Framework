<?php 

try {
    
require_once $_SERVER['DOCUMENT_ROOT'] . '/Http/Controllers/HomeController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Http\Controllers\LoginController.php';

$request = [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD'],
    'path' => $_SERVER['PATH_INFO'],
    'useragent' => $_SERVER['HTTP_USER_AGENT'],
];

$headers = getallheaders();

$resolver = match($request['uri']) {
    "/home" => [
        "method" => ["GET"],
        "class" => HomeController::class,
    ],
    "/login" => [
        "method" => ["POST"],
        "class" => LoginController::class,
    ],
    default => [
        'method' => null,
        'class' => null,
    ],
};

if(!in_array($request['method'], $resolver['method'])) {
    // Throw an error
    echo "Error thrown";

    return;
}


    echo (new $resolver['class'])();
} catch (\Throwable $th) {
    echo $th;
}
