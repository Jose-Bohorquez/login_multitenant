<?php 

class LoginMod {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Validación simplificada por correo y empresa
    public function validateUser($empresa, $correo) {
        // Realizamos una consulta simple para obtener el usuario
        $query = "SELECT * FROM usuarios WHERE correo_usu = :correo AND empresa_usu = :empresa";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':empresa', $empresa);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si el usuario existe, devolvemos los datos
        if ($user) {
            return $user;
        }

        // Si no existe, devolvemos falso
        return false;
    }
}


 ?>