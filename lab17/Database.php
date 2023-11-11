<?php
require_once 'config.php';

class Database {
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli(Config::$servidor, Config::$usuario, Config::$contrasena, Config::$base_de_datos);

        if ($this->conexion->connect_error) {
            die("La conexión falló: " . $this->conexion->connect_error);
        }
    }

    public function getConexion() {
        return $this->conexion;
    }

}
?>