<?php

require_once 'config/connection.php';

$controllerName = $_GET['controller'] ?? 'home';
$actionName = $_GET['action'] ?? 'index';

$controllerFile = 'controllers/' . ucfirst($controllerName) . 'Controller.php';
$controllerClass = ucfirst($controllerName) . 'Controller';

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();

        if (method_exists($controller, $actionName)) {
            $id = $_GET['id'] ?? null;
            $data = $_POST;

            if ($actionName == 'store' || $actionName == 'update') {
                $controller->$actionName($data);
            } else if ($actionName == 'delete') {
                $controller->$actionName($id);
            } else {
                $controller->index();
            }

        } else {
            die("Error: Action '$actionName' not found in class '$controllerClass'.");
        }
    } else {
        die("Error: Class '$controllerClass' not found in file '$controllerFile'.");
    }
} else {
    die("Error: Controller file '$controllerFile' not found.");
}
?>