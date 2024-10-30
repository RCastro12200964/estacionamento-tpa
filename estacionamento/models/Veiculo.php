<?php
require_once '../config/database.php';

class Veiculo {
    private $conn;
    
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function cadastrar($placa, $modelo, $usuario_id) {
        $query = "INSERT INTO veiculos (placa, modelo, usuario_id) VALUES (:placa, :modelo, :usuario_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':placa', $placa);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':usuario_id', $usuario_id);
        return $stmt->execute();
    }

    public function listarVeiculos($usuario_id) {
        $query = "SELECT * FROM veiculos WHERE usuario_id = :usuario_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function remover($id) {
        $query = "DELETE FROM veiculos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
}
?>
