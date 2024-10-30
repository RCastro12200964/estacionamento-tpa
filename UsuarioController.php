<?php
require_once '../models/Usuario.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function cadastrar($nome, $email, $senha) {
        return $this->usuarioModel->cadastrar($nome, $email, $senha);
    }

    public function login($email, $senha) {
        return $this->usuarioModel->login($email, $senha);
    }
}
?>
