<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Novembro Azul</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
    <h2>Cadasto - Novembro Azul</h2>
    <form actin="salvar.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>CPF</label>
        <input type="text" name="cpf" maxlength="14" placeholder="Ex: 123.456.789.09" required>

         <label>Idade:</label>
        <input type="number" name="idade" min="18" required>

        <label>Data da Consulta:</label>
        <input type="date" name="data_consulta" required>

        <input type="submit" value="Cadastrar">
    </form>

    <p style="text-align:center;">Já é cadastrado? <a href="acessar.php">Acesse aqui</a></p>
</div>
</body>
</html>