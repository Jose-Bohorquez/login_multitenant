<?php
// models/Database.php

class Database {
    private static $dbConnection = null;

    public static function getConnection() {
        if (self::$dbConnection === null) {
            try {
                self::$dbConnection = new PDO(
                    'mysql:host=localhost;dbname=pruebas_ingreso', // Cambia con tus datos
                    'root', // Cambia con tu usuario
                    '', // Cambia con tu contraseña
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
                );
            } catch (PDOException $e) {
                echo "Error al conectar con la base de datos: " . $e->getMessage();
                exit();
            }
        }
        return self::$dbConnection;
    }
}