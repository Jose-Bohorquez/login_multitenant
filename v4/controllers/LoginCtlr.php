<?php 

class LoginCtlr {

    // Método 'main' para mostrar el formulario de login
    public function main() {
        require_once "views/login.view.php"; // Cargar vista de login
    }

    public function receivesFormLoginData() {
        $empresa = $_POST['empresa'];
        $correo = $_POST['correo_ing'];
        $pwd = $_POST['pwd_ing'];

        // Instanciamos el modelo LoginMod
        $loginModel = new LoginMod();
        $user = $loginModel->validateUser($empresa, $correo, $pwd);

        
        function custom_var_dump($user) {
            echo "<pre>";
            var_dump($user);
            echo "</pre>";
        }
        custom_var_dump($user);

        function custom_print_r($user) {
            echo "<pre>";
            print_r($user);
            echo "</pre>";
        }
        custom_print_r($user);
        
        
        // Si el usuario existe
        if ($user) {

            session_start();
            
            // Guardamos los datos del usuario en la sesión
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['tipo_doc_usu'] = $user['tipo_doc_usu'];
            $_SESSION['num_doc_usu'] = $user['num_doc_usu'];
            $_SESSION['nombre_usu'] = $user['nombre_usu'];
            $_SESSION['apellidos_usu'] = $user['apellidos_usu'];
            $_SESSION['telefono_usu'] = $user['telefono_usu'];
            $_SESSION['correo_usu'] = $user['correo_usu'];
            $_SESSION['role'] = $user['rol_usu'];
            $_SESSION['cargo'] = $user['cargo'];
            $_SESSION['empresa_id'] = $empresa;
            

            // Mensaje de éxito
            $_SESSION['login_message'] = '¡Ingreso exitoso!';
            $_SESSION['login_message_type'] = 'success';

            
            var_dump($_SESSION);
            echo "</br>"; echo "</br>";
            print_r($_SESSION);            
            

            
            // Redirigimos según el rol y la empresa
            if ($user['rol_usu'] === 1) {
                // Redirigimos al panel de administración para la empresa seleccionada
                header("Location: ?c=DashboardCtlr&a=main&empresa={$empresa}");
            } else {
                // Redirigimos a la vista del empleado para la empresa seleccionada
                header("Location: ?c=UsersCtlr&a=main&empresa={$empresa}");
            }
            exit(); 
            
        }  else {
            // Si no se encuentra el usuario, mostramos un mensaje de error
            $_SESSION['login_message'] = 'Usuario o contraseña incorrectos.';
            $_SESSION['login_message_type'] = 'error';

            // Redirige de vuelta al login
            header('Location: ?c=LoginCtlr&a=main&log=fail');
            exit();
        }
        
        
    }

    public function logOut(){
        // Eliminar todas las variables de sesión
        session_unset();

        // Destruir la sesión
        session_destroy();

        // Eliminar la cookie de la sesión (si existe)
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }

        // Redirigir al login
        header('Location: ?c=LoginCtlr&a=main');
        
        // Terminar el script para asegurar que no se ejecute más código
        exit();
    }

    

}


 ?>