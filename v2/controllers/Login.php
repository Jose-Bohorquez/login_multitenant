<?php

// Requiere la clase de User para realizar la autenticación
require_once "models/User.php";

class Login {

    // Función principal para el login
    public function main() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recibir los datos del formulario
            $username = $_POST['username'];
            $password = $_POST['password'];
            $empresa_id = $_POST['empresa_id']; // Usar 'empresa_id' en lugar de 'empresa'

#var_dump($username);
#var_dump($password);
#var_dump($empresa_id);

            // Crear una instancia del modelo User
            $userModel = new User();
            $user = $userModel->authenticate($username, $password, $empresa_id);

            // Si las credenciales son correctas
            if ($user) {
                // Iniciar sesión
                session_start();
                $_SESSION['user_id'] = $user['id_usuario'];
                $_SESSION['user_name'] = $user['nombre_usu'] . ' ' . $user['apellidos_usu'];
                $_SESSION['user_role'] = $user['nombre_rol'];
                $_SESSION['empresa_id'] = $user['empresa_usu']; // Almacenamos el ID de la empresa del usuario

                // Redirigir según el rol y empresa
                $this->redirectBasedOnRole($user);
            } else {
                // Si las credenciales no son correctas
                $error_message = "Credenciales incorrectas o no pertenecen a la empresa seleccionada.";
                require_once "views/landing/login.php"; // Aquí puedes pasar el error al formulario
            }


        } else {
            // Si no es un POST, solo mostrar el formulario
            require_once "views/landing/login.php";
        }
    }

    // Función para redirigir al usuario según su rol y empresa
    private function redirectBasedOnRole($user) {
        switch ($user['nombre_rol']) {
            case 'Super-Admin':
                header("Location: /index.php?c=Dashboard&a=show");
                break;
            case 'Admin':
                header("Location: /index.php?c=Admin&a=index");
                break;
            case 'supervisor':
                header("Location: /index.php?c=Supervisor&a=index");
                break;
            case 'usuario':
                header("Location: /index.php?c=User&a=index");
                break;
            default:
                header("Location: /index.php?c=Login&a=main");
                break;
        }
        exit();
    }
}
?>
