<?php 


class UsersCtlr {

    public function main() {
        session_start(); # importante mantener la sesion en todas las vistas 
        #var_dump($_SESSION);

        
        // Asegúrate de que el usuario esté autenticado
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['empresa_id']) || !isset($_SESSION['role'])) {
            header('Location: ?c=LoginCtlr&a=main'); // Si no está autenticado, redirige al login
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
            header('Location: ?c=LoginCtlr&a=main'); // Si no se encuentra, redirige al login
            exit();
        }

        // Carga la vista del perfil de usuario de la empresa correspondiente
        require_once "views/roles/user/{$empresa_routes[$empresa_id]}/index.view.profile.{$empresa_routes[$empresa_id]}.php";
    }
}



 ?>