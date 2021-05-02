<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

//"require": {
////        "php": "^7.3|^8.0",
//    "php": "^7.2.5|^8.0",
//        "artem-schander/l5-modular": "^2.1",
//        "fideloper/proxy": "^4.4",
//        "fruitcake/laravel-cors": "^2.0",
//        "guzzlehttp/guzzle": "^7.0.1",
////        "laravel/framework": "^8.12",
//        "laravel/framework": "^7.29",
//        "laravel/tinker": "^2.5",
////        "laravel/ui": "^3.2",
//        "laravel/ui": "^2.0",
//        "yajra/laravel-datatables": "1.5"
//    },
/*
|--------------------------------------------------------------------------
| Check If Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is maintenance / demo mode via the "down" command we
| will require this file so that any prerendered template can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(__DIR__.'./storage/framework/maintenance.php')) {
    require __DIR__.'./storage/framework/maintenance.php';
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'./vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'./bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);
