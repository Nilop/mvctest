<?php

namespace App;

use App\Classes\View;
use \Exception;

require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);


$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';


$controllerClassName = 'App\\Controllers\\' . $ctrl;

try {

    $controller = new $controllerClassName;
    $method = 'action' . $act;
    $controller -> $method();

} catch (Exception $e) {
    $view = new View();
    $view->error_report = $e->getMessage();
    $view->display('second/error.php');
}