<?php

    class Tablas{
        private $PDO;

        public function __construct()
        {
            require_once("c://laragon/www/CRUD_APRENDICES/Database/conexion.php");
            $con = new Database();
            $this->PDO = $con->conexion();
        }

        public function mostrarTablas($tabla){
            try {
                $stmt = $this->PDO->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Error en mostrarTablas: " . $e->getMessage());
                return false;
            }
        }
    }
