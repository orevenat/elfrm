<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Zend\Diactoros\Response\HtmlResponse;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

chdir(dirname(__DIR__));
require('vendor/autoload.php');


### Initialization
$request = ServerRequestFactory::fromGlobals();

### Action
$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new HtmlResponse('Hello, ' . $name . '!'))
    ->withHeader('X-Developer', 'orevenat');

### Sending

$emitter = new SapiEmitter();
$emitter->emit($response);
