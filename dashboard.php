<?php
session_start();
require_once '../controllers/VeiculoController.php';

$veiculoController = new VeiculoController();
$usuario_id = $_SESSION['usuario_id'] ?? null;

if (!$usuario_id) {
    header("Location: index.php?action=login");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'cadastrar') {
        $placa = trim($_POST['placa']);
        $modelo = trim($_POST['modelo']);
        if ($veiculoController->cadastrar($placa, $modelo, $usuario_id)) {
            echo "Veículo cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar veículo!";
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'remover') {
        $id = $_POST['id'];
        if ($veiculoController->remover($id)) {
            echo "Veículo removido com sucesso!";
        } else {
            echo "Erro ao remover veículo!";
        }
    }
}

// Listar veículos do usuário
$veiculos = $veiculoController->listarVeiculos($usuario_id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Estacionamento</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Dashboard</h1>
    <h2>Cadastrar Veículo</h2>
    <form action="dashboard.php" method="POST">
        <input type="text" name="placa" placeholder="Placa" required>
        <input type="text" name="modelo" placeholder="Modelo" required>
        <input type="hidden" name="action" value="cadastrar">
        <button type="submit">Cadastrar Veículo</button>
    </form>

    <h2>Meus Veículos</h2>
    <ul>
        <?php foreach ($veiculos as $veiculo): ?>
            <li>
                <?php echo $veiculo['placa'] . ' - ' . $veiculo['modelo']; ?>
                <form action="dashboard.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $veiculo['id']; ?>">
                    <input type="hidden" name="action" value="remover">
                    <button type="submit" onclick="return confirm('Tem certeza que deseja remover este veículo?');">Remover</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Meus Portfólios</h2>
    <div class="portfolio-container">
        <div class="portfolio-item">
            <h3>Nicolas Mantovani</h3>
            <a href="https://github.com/NickMantovani/Projeto-TPA" target="_blank">Ver no GitHub</a>
        </div>
        <div class="portfolio-item">
            <h3>Victor Nunes</h3>
            <a href="https://github.com/seuusuario/projeto2" target="_blank">Ver no GitHub</a>
        </div>
        <div class="portfolio-item">
            <h3>Raphael Dantas</h3>
            <a href="https://github.com/seuusuario/projeto3" target="_blank">Ver no GitHub</a>
        </div>
    </div>
    <p><a href="index.php?action=logout">Sair</a></p>
</body>
</html>
