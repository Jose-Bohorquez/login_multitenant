<?php
// controllers/Users.php
require_once 'models/User.php';

class Users {
    public function login() {
        // Verificar si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $username = $_POST['username'];
            $password = $_POST['password'];
            $empresa_id = $_POST['empresa_id'];

var_dump($username);
var_dump($password);
var_dump($empresa_id);

            // Crear una instancia del modelo User
            $userModel = new User();
            $user = $userModel->authenticate($username, $password, $empresa_id);

            var_dump($user);

            // Verificar si el usuario existe
            if ($user) {
                // Almacenar los datos del usuario en la sesión
                session_start();
                $_SESSION['user'] = $user;

                // Redirigir según el rol del usuario
                switch ($user['nombre_rol']) {
                    case 'Super-Admin':
                    case 'Admin':
                        header("Location: index.php?c=Dashboard&a=show");
                        break;
                    case 'supervisor':
                    case 'usuario':
                        // Redirigir a la ruta de la empresa correspondiente
                        $this->redirectToEmpresa($user['empresa_usu']);
                        break;
                    default:
                        echo "Rol no reconocido.";
                        break;
                }
            } else {
                // Si no es válido, redirigir a la página de login con mensaje de error
                header("Location: views/landing/login.php?error=1");
            }
        }
    }

    private function redirectToEmpresa($empresa_id) {
        // Aquí verificamos cuál es la empresa y redirigimos a su ruta correspondiente
        switch ($empresa_id) {
            case 1:
                header("Location: views/empresa/servitel/perfil.php");
                break;
            case 2:
                header("Location: views/empresa/servientrega/perfil.php");
                break;
            case 3:
                header("Location: views/empresa/global/perfil.php");
                break;
            default:
                echo "Empresa no reconocida.";
                break;
        }
    }
}
?>
