<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Database.php';

use Models\Database;

class Clientes
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConn();
    }

    public function all()
    {
        $query = "SELECT * FROM usuarios";
        try {
            $stmt = $this->conn->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error al obtener los datos de los clientes: " . $e->getMessage();
        }
    }
}

$clientes = new Clientes();
$resultado = $clientes->all();

foreach ($resultado as $cliente) {
    echo $cliente['nombre'] . "<br>";
    echo $cliente['usuario'] . "<br>";
    echo $cliente['contraseña'] . "<br>";
    echo $cliente['telefono'] . "<br>";
    echo $cliente['direccion'] . "<br>";
}