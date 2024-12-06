<?php
ob_start();

require_once "models/Database.php";
require_once "models/LoginMod.php";

if (!isset($_REQUEST['c'])) {
    // Si no se ha especificado un controlador, usa 'LoginCtlr' y el método 'main' por defecto
    require_once "controllers/LoginCtlr.php";
    $controller = new LoginCtlr();
    $controller->main(); // Llama al método 'main' de LoginCtlr
} else {
    // Si hay un controlador, utiliza la lógica de redirección
    $controller = $_REQUEST['c'];
    require_once "controllers/" . $controller . ".php";
    $controller = new $controller();
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
    call_user_func(array($controller, $action));
}

ob_end_flush();
?>
