<?php 
    class DB {
        private $conexion;

        function __construct() {
            try {
                $this->conexion = new PDO('mysql:host=localhost;dbname=reservoir', 'root', '');
            } catch (Exception $e) {
                $this->conexion = 'Error de conexion';
                echo "ERROR: " . $e->getMessage();
            }
        }

        function getConexion() {
            return $this->conexion;
        }

    }
?>