<?php 

class DashboardCtlr {

    public function main() {
        // Asegúrate de que el usuario esté autenticado
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['empresa_id']) || !isset($_SESSION['role'])) {
            header('Location: index.php'); // Si no está autenticado, redirige al login
            exit();
        }

        // Obtiene el ID de la empresa desde la sesión
        $empresa_id = $_SESSION['empresa_id'];
        $empresa_routes = [
            1 => 'servientrega', // Servientrega
            2 => 'servitel',     // Servitel
            3 => 'global',       // Global
        ];

        // Verifica que la empresa sea válida
        if (!isset($empresa_routes[$empresa_id])) {
            header('Location: index.php'); // Si no se encuentra, redirige al login
            exit();
        }

        // Carga la vista del dashboard de la empresa correspondiente
        require_once "views/Roles/admin/{$empresa_routes[$empresa_id]}/index.view.dashboard.{$empresa_routes[$empresa_id]}.php";
    }
}


 ?>