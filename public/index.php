<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Framework\Http\Request;

chdir(dirname(__DIR__));
require('vendor/autoload.php');


### Initialization
$request = (new Request())
    ->withQueryParams($_GET)
    ->withParsedBody($_POST);

### Action
$name = $request->getQueryParams()['name'] ?? 'Guest';

echo 'Hello, ' . $name . '!';
