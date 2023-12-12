<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Database.php';

use Models\Database;
class ClientesController
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConn();
    }

    public function index()
    {
        $clientesModel = new Clientes();

        // Utilizar métodos del modelo Clientes
        $clientes = $clientesModel->all();

        foreach ($clientes as $cliente) {
            echo $cliente['nombre'] . "<br>";
            echo $cliente['email'] . "<br>";
        }
    }
}