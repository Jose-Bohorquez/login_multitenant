<?php

class UsuarioController {

    // Acción para editar el perfil del usuario
    public function editarPerfil() {
        // Validar que el usuario esté autenticado
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?C=LoginController&A=main');
            exit;
        }

        // Solo permitir editar el perfil del usuario autenticado
        $usuarioId = $_SESSION['usuario']['id_usuario'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];

            // Conectar a la base de datos
            require_once 'app/models/Database.php';
            $db = new Database();

            // Actualizar la información en la base de datos
            $db->query('UPDATE usuarios SET nombre_usu = ?, correo_usu = ?, telefono_usu = ? WHERE id_usuario = ?', [$nombre, $correo, $telefono, $usuarioId]);

            // Actualizar los datos en la sesión
            $_SESSION['usuario']['nombre_usu'] = $nombre;
            $_SESSION['usuario']['correo_usu'] = $correo;
            $_SESSION['usuario']['telefono_usu'] = $telefono;

            // Redirigir al perfil con mensaje de éxito
            header('Location: index.php?C=DashboardController&A=index');
        }
    }
}
