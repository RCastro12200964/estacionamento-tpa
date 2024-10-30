<?php
require_once '../config/database.php';

class Usuario {
    private $conn;
    
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function cadastrar($nome, $email, $senha) {
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha); // Senha em texto simples
        return $stmt->execute();
    }

    public function login($email, $senha) {
        $query = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verifica se o usuário foi encontrado e se a senha corresponde
        if ($usuario && $usuario['senha'] === $senha) {
            return $usuario;
        }
        return false;
    }
}
?>
