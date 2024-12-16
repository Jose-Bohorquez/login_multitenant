<?php
class LoginController {

    // Método principal, se ejecuta si no se pasa un controlador y acción específicos
    public function main() {
        // Inicia la sesión si no está activa
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica si ya hay una sesión activa
        if (isset($_SESSION['user_id'])) {
            // Si el usuario ya está logueado, redirige al dashboard
            header('Location: /login_multitenant/app/views/dashboard/index.php');
            exit;
        }

        // Si no está logueado, muestra la vista de login
        require_once("views/empresa/index.php");  // Este es el archivo de la vista que se mostrará
    }

    // Acción para procesar el login
    public function login() {
        // Inicia la sesión si no está activa
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica si los datos del formulario están presentes
        if (isset($_POST['email'], $_POST['password'], $_POST['empresa'])) {
            $email = $_POST['email'];  // Correo electrónico del usuario
            $password = $_POST['password'];  // Contraseña del usuario
            $empresaId = $_POST['empresa'];  // ID de la empresa seleccionada

            // Filtra y valida los datos aquí si es necesario
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'El correo electrónico no es válido.';
                header('Location: /login_multitenant/index.php');
                exit;
            }

            if (strlen($password) < 6) {
                $_SESSION['error'] = 'La contraseña debe tener al menos 6 caracteres.';
                header('Location: /login_multitenant/index.php');
                exit;
            }

            // Aquí pasamos los datos al modelo para la validación
            require_once 'app/models/Usuario.php';
            $usuario = new Usuario();
            $user = $usuario->validarCredenciales($email, $password, $empresaId);  // Método en el modelo

            // Si las credenciales son correctas
            if ($user) {
                // Guardamos los datos del usuario en la sesión
                $_SESSION['user_id'] = $user['id_usuario'];
                $_SESSION['username'] = $user['nombre_usu'];
                $_SESSION['empresa_id'] = $empresaId;
                $_SESSION['role'] = $user['rol_usu'];  // role: 'admin', 'superadmin', 'user'

                // Redirigimos según el rol del usuario
                if ($user['rol_usu'] === 'admin' || $user['rol_usu'] === 'superadmin') {
                    // Si es admin o superadmin, va al dashboard
                    header('Location: /login_multitenant/app/views/dashboard/index.php');
                    exit;
                } else {
                    // Si es usuario normal, va a su empresa correspondiente
                    switch ($empresaId) {
                        case 1:
                            header('Location: /login_multitenant/app/views/empresa/servientrega/index.php');
                            break;
                        case 2:
                            header('Location: /login_multitenant/app/views/empresa/servitel/index.php');
                            break;
                        case 3:
                            header('Location: /login_multitenant/app/views/empresa/global/index.php');
                            break;
                        default:
                            header('Location: /login_multitenant/app/views/error.php');
                    }
                    exit;
                }
            } else {
                // Si las credenciales son incorrectas
                $_SESSION['error'] = 'Usuario o contraseña incorrectos';
                header('Location: /login_multitenant/index.php');
                exit;
            }
        } else {
            // Si no se completaron todos los campos
            $_SESSION['error'] = 'Por favor complete los campos de usuario y contraseña.';
            header('Location: /login_multitenant/index.php');
            exit;
        }
    }
}
?>
