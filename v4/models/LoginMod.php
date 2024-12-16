<?php 

class LoginMod {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Validación de usuario (correo y contraseña)
    public function validateUser($empresa, $correo, $pwd) {
        // Realizamos una consulta simple para obtener el usuario según el correo y la empresa
        $query = "SELECT * FROM usuarios WHERE correo_usu = :correo AND empresa_usu = :empresa";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':empresa', $empresa);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verificación de la contraseña: si estamos en entorno de pruebas, se puede comparar en texto plano
            if ($_ENV['APP_ENV'] == 'production') {
                if (password_verify($pwd, $user['pwd'])) {
                    return $user; // Contraseña válida
                }
            } else {
                // Compara contraseñas en texto plano para pruebas
                if ($pwd === $user['pwd']) {
                    return $user; // Contraseña válida
                }
            }
        }

        // Si no existe el usuario o la contraseña es incorrecta
        return false;
    }
}


 ?>