<?php
// models/User.php
require_once 'Database.php';

class User {
    public function authenticate($username, $password, $empresa_id) {
        // Conectar a la base de datos
        $db = Database::conexionBD();

        // Consulta SQL para obtener el usuario por correo y empresa
        $query = "SELECT u.id_usuario, u.nombre_usu, u.apellidos_usu, u.correo_usu, u.pwd, r.nombre_rol, u.empresa_usu
                  FROM usuarios u
                  INNER JOIN roles r ON u.rol_usu = r.id_rol
                  WHERE u.correo_usu = :username AND u.empresa_usu = :empresa_id";

        try {
            $stmt = $db->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":empresa_id", $empresa_id);
            $stmt->execute();

            // Verificar si el usuario existe
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verificar si la contraseña es válida
                if ($this->verifyPassword($password, $user['pwd'])) {
                    return $user; // Devuelve el usuario si las credenciales son correctas
                }
            }
        } catch (PDOException $e) {
            return null;
        }

        return null; // Si no se encuentra el usuario o las credenciales no coinciden
    }

    // Función para verificar la contraseña (tanto con hash como sin hash)
    private function verifyPassword($inputPassword, $storedPassword) {
        // Primero, intenta verificar si la contraseña está hasheada
        if (password_verify($inputPassword, $storedPassword)) {
            return true; // La contraseña coincide con el hash
        }

        // Si no es un hash válido, compararla directamente (para pruebas sin hash)
        if ($inputPassword === $storedPassword) {
            return true; // La contraseña es igual a la almacenada directamente
        }

        // Si ninguna de las dos opciones es válida, retornar falso
        return false;
    }
}
?>
