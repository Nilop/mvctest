<?php


require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';

/*$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';*/

$controllerClassName = $ctrl . 'Controller';

try {

    $conroller = new $controllerClassName;
    $method = 'action' . $act;
    $conroller -> $method();

} catch (Exception $e) {
    $view = new View();
    $view->error_report = $e->getMessage();
    $view->display('second/error.php');
}