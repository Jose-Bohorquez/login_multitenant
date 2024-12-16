<?php

class DashboardController {

    // Acción para mostrar la vista del dashboard
    public function index() {
        if (!isset($_SESSION['usuario'])) {
            // Si no hay usuario autenticado, redirigir al login
            header('Location: index.php?C=LoginController&A=main');
            exit;
        }

        // Obtener el rol del usuario desde la sesión
        $rol = $_SESSION['usuario']['rol_usu'];

        // Si el usuario es Admin o Super-Admin, mostrar el dashboard completo
        if ($rol == 1 || $rol == 2) {
            require_once 'app/views/dashboard/index.php'; // Dashboard completo
        } else {
            // Si es un usuario común, mostrar su propio perfil
            require_once 'app/views/dashboard/profile.php'; // Vista de perfil individual
        }
    }
}
