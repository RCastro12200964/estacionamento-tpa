<?php
require_once '../models/Veiculo.php';

class VeiculoController {
    private $veiculoModel;

    public function __construct() {
        $this->veiculoModel = new Veiculo();
    }

    public function cadastrar($placa, $modelo, $usuario_id) {
        return $this->veiculoModel->cadastrar($placa, $modelo, $usuario_id);
    }

    public function listarVeiculos($usuario_id) {
        return $this->veiculoModel->listarVeiculos($usuario_id);
    }

    public function remover($id) {
        return $this->veiculoModel->remover($id);
    }
    
}
?>
