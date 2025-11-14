<?php

require_once 'config/connection.php';

// front controller
$controllerName = $_GET['controller'] ?? 'home';
$actionName = $_GET['action'] ?? 'index';

// build controller file and class names
$controllerFile = 'controllers/' . ucfirst($controllerName) . 'Controller.php';
$controllerClass = ucfirst($controllerName) . 'Controller';

// check if controller file exists and include it
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // check if controller class exists and instantiate it
    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();

        // check if action method exists and call it
        if (method_exists($controller, $actionName)) {
            $id = $_GET['id'] ?? null;
            $data = $_POST;

            // call the action method with appropriate parameters
            if ($actionName == 'store' || $actionName == 'update') {
                $controller->$actionName($data);
            } else if ($actionName == 'delete') {
                $controller->$actionName($id);
            } else {
                $controller->index();
            }

        } else { // method does not exist
            die("Error: Action '$actionName' not found in class '$controllerClass'.");
        }
    } else { // class does not exist
        die("Error: Class '$controllerClass' not found in file '$controllerFile'.");
    }
} else { // file does not exist
    die("Error: Controller file '$controllerFile' not found.");
}
?>