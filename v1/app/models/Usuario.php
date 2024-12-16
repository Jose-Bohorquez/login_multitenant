<?php 
class Usuario {

    // Método para validar las credenciales de un usuario
    public function validarCredenciales($email, $password, $empresaId) {
        // Conexión a la base de datos (asegúrate de que tienes configurada la conexión)
        $db = Database::getConnection();

        // Consulta SQL para obtener los datos del usuario según el correo electrónico y la empresa
        $query = "SELECT * FROM usuarios WHERE email = :email AND empresa_id = :empresaId";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':empresaId', $empresaId);
        $stmt->execute();

        // Si se encuentra el usuario
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar la contraseña
            if (password_verify($password, $user['password'])) {
                // Si la contraseña es correcta, devolver los datos del usuario
                return $user;
            }
        }

        // Si no se encuentra el usuario o la contraseña es incorrecta
        return false;
    }
}
