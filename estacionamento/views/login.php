<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Login</h1>
    <form action="index.php?action=login" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
    <p><a href="index.php?action=cadastrar">Não tem uma conta? Cadastre-se!</a></p>
</body>
</html>
