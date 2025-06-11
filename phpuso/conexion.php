<?php
class Conexion {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "formulario";

    function connectDatabase() {
        $connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
}

?>