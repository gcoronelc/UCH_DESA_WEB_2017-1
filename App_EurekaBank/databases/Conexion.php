<?php

class Conexion {

    public $host = "localhost";
    public $user = "root";
    public $pass = "root";
    public $db = "eurekabank";

    public function getConexion() {
        $conexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db . ";", $this->user, $this->pass);
        return $conexion;
    }
}

?>