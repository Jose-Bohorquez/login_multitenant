<?php
ob_start();

#require_once "models/Database.php";  // Conexión a la base de datos

// Si no se pasa un parámetro 'c' (controlador), cargamos el Login por defecto
if (!isset($_REQUEST['c'])) {

    // Cargar el controlador de Login
    require_once "controllers/Login.php";
    $controller = new Login();
    $controller->main();

} else {
    // Cargar el controlador pasado como parámetro
    $controller = $_REQUEST['c'];
    require_once "controllers/" . $controller . ".php";

    $controller = new $controller();

    // Si se pasa un parámetro 'a' (acción), se ejecuta la acción correspondiente, sino se ejecuta 'main'
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
    call_user_func(array($controller, $action));  // Llamar la acción correspondiente del controlador
}

ob_end_flush();
?>
