<?php 

class LoginCtlr {

    // Método 'main' para mostrar el formulario de login
    public function main() {
        require_once "views/login.view.php"; // Aquí debes incluir la vista de login
    }


    public function receivesFormLoginData() {
        $empresa = $_POST['empresa'];
        $correo = $_POST['correo_ing'];

        // Instanciamos el modelo LoginMod
        $loginModel = new LoginMod();
        $user = $loginModel->validateUser($empresa, $correo);

        var_dump($user);

        // Verificamos si el usuario existe
        if ($user) {
            // Guardamos los datos del usuario en la sesión
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['empresa_id'] = $empresa;
            $_SESSION['role'] = $user['rol_usu'];  // Guardamos el rol del usuario en la sesión

            // Redirigimos a la vista correspondiente según la empresa
            switch ($_SESSION['empresa_id']) {
                case 1: // Servientrega
                    header('Location: index.php?c=DashboardCtlr&a=main');
                    break;
                case 2: // Servitel
                    header('Location: index.php?c=DashboardCtlr&a=main');
                    break;
                case 3: // Global
                    header('Location: index.php?c=DashboardCtlr&a=main');
                    break;
                default:
                    echo "Empresa no válida";
                    break;
            }
            exit();
        } else {
            // Si no se encuentra el usuario, mostramos un mensaje de error
            echo "Usuario o contraseña incorrectos.";
        }
    }



}


 ?>