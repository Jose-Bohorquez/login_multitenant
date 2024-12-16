<?php

class EmpresaController {

    // Acción para mostrar el login según la empresa seleccionada
    public function main() {
        $empresaId = isset($_GET['empresa_id']) ? $_GET['empresa_id'] : null;

        if ($empresaId) {
            // Redirigir a la vista específica de la empresa
            switch ($empresaId) {
                case 1: // Global
                    require_once 'app/views/empresa/global/index.php';
                    break;
                case 2: // Servitel
                    require_once 'app/views/empresa/servitel/index.php';
                    break;
                case 3: // Servientrega
                    require_once 'app/views/empresa/servientrega/index.php';
                    break;
                default:
                    require_once 'app/views/empresa/error.php';
                    break;
            }
        } else {
            // Si no se selecciona ninguna empresa, mostrar la vista general
            require_once 'app/views/empresa/index.php';
        }
    }

    // Acción para procesar el login
    public function procesarLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empresaId = $_POST['empresa'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Conectar a la base de datos
            require_once 'app/models/Database.php';
            $db = new Database();

            // Validar usuario
            $usuario = $db->query('SELECT * FROM usuarios WHERE correo_usu = ? AND empresa_usu = ?', [$username, $empresaId]);

            if ($usuario && password_verify($password, $usuario[0]['password'])) {
                // Usuario encontrado, guardar sesión
                $_SESSION['usuario'] = $usuario[0];
                header('Location: index.php?C=DashboardController&A=index');
            } else {
                echo "Usuario o contraseña incorrectos.";
            }
        }
    }
}
