<?php
session_start();
require_once '../controllers/UsuarioController.php';

$usuarioController = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['action']) && $_GET['action'] == 'cadastrar') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        if ($usuarioController->cadastrar($nome, $email, $senha)) {
            // Redireciona para a página de login após o cadastro bem-sucedido
            header("Location: index.php?action=login");
            exit(); // Certifique-se de encerrar o script após o redirecionamento
        } else {
            echo "Erro ao cadastrar usuário!";
        }
    } elseif (isset($_GET['action']) && $_GET['action'] == 'login') {
        $email = trim($_POST['email']); // Remover espaços em branco
        $senha = trim($_POST['senha']); // Remover espaços em branco
        $usuario = $usuarioController->login($email, $senha);
        if ($usuario) {
            $_SESSION['usuario_id'] = $usuario['id'];
            // Redireciona para o dashboard após o login bem-sucedido
            header("Location: dashboard.php");
            exit(); // Certifique-se de encerrar o script após o redirecionamento
        } else {
            echo "Email ou senha inválidos!";
        }
    }
} else {
    if (isset($_GET['action']) && $_GET['action'] == 'cadastrar') {
        include '../views/cadastrar.php';
    } elseif (isset($_GET['action']) && $_GET['action'] == 'login') {
        include '../views/login.php';
    } else {
        // Exibe a página de login como padrão
        include '../views/login.php';
    }
}
?>
