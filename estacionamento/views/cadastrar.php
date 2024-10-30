<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form action="index.php?action=cadastrar" method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <p><a href="index.php?action=login">Já tem uma conta? Faça login!</a></p>
</body>
</html>
