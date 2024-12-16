<?php
// models/Database.php

class Database {

    // Método para conectar a la base de datos
    public static function conexionBD() {
        try {
            // Reemplaza estos valores con los de tu base de datos
            $host = 'localhost';
            $dbname = 'pruebas_ingreso';
            $username = 'root';
            $password = '';
            
            // Crear la conexión a la base de datos usando PDO
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;  // Retorna la conexión
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
