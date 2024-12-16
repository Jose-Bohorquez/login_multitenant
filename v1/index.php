<?php
// Activar el almacenamiento en búfer de salida
ob_start();

// Requiere el archivo de conexión a la base de datos
require_once "models/Database.php";

// Verifica si no hay un parámetro 'c' en la URL (es decir, no se especifica controlador)
if (!isset($_REQUEST['c'])) {
    // Si no se especifica un controlador, cargamos el controlador por defecto (Login)
    require_once "controllers/LoginController.php";
    $controller = new LoginController();
    $controller->main();  // Llama al método por defecto (main)
} else {
    // Si se especifica un controlador en 'c', lo cargamos dinámicamente
    $controllerName = $_REQUEST['c'];

    // Verifica si el archivo del controlador existe antes de incluirlo
    $controllerFile = "controllers/" . $controllerName . ".php";
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controller = new $controllerName();  // Crea una instancia del controlador

        // Verifica si hay una acción especificada en 'a', si no se establece 'main' como acción predeterminada
        $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';

        // Llama a la acción del controlador usando 'call_user_func'
        if (method_exists($controller, $action)) {
            call_user_func(array($controller, $action));
        } else {
            // Si la acción no existe, redirige al controlador por defecto (Login)
            echo "Acción no encontrada. Redirigiendo a Login...";
            header("Location: /login_multitenant/index.php");
            exit;
        }
    } else {
        // Si el controlador no existe, redirige al controlador por defecto (Login)
        echo "Controlador no encontrado. Redirigiendo a Login...";
        header("Location: /login_multitenant/index.php");
        exit;
    }
}

// Finaliza el almacenamiento en búfer y manda la salida al navegador
ob_end_flush();
?>
