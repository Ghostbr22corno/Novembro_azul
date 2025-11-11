<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Acessar Dicas - Novembro Azul</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
    <h2>Acessar Dicas</h2>
    <form action="dicas.php" method="POST">
        <label>Digite seu CPF:</label>
        <input type="text" name="cpf" maxlength="14" placeholder="Ex: 123.456.789-09" required>
        <input type="submit" value="Acessar Dicas">
    </form>
</div>
</body>
</html>