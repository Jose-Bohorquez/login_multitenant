<?php

class Empresa {

    private $db;

    public function __construct() {
        // Aquí configuramos la conexión a la base de datos
        $this->db = new PDO('mysql:host=localhost;dbname=pruebas_ingreso', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Obtener todas las empresas
    public function getAll() {
        $stmt = $this->db->prepare('SELECT * FROM empresas');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una empresa por ID
    public function getById($id_empresa) {
        $stmt = $this->db->prepare('SELECT * FROM empresas WHERE id_empresa = :id_empresa');
        $stmt->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
