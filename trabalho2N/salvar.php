<?php
include("conexao.php");

// --- Função para validar CPF ---
function validarCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }

    return true;
}

// --- Receber dados do formulário ---
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$idade = $_POST['idade'];
$data_consulta = $_POST['data_consulta'];

// --- Validar CPF ---
if (!validarCPF($cpf)) {
    echo "<link rel='stylesheet' href='estilo.css'>";
    echo "<div class='container'><h3>CPF inválido! Tente novamente.</h3><a href='cadastro.php'>Voltar</a></div>";
    exit;
}

// --- Inserir no banco ---
$sql = "INSERT INTO pacientes (nome, cpf, idade, data_consulta) VALUES (?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssis", $nome, $cpf, $idade, $data_consulta);

echo "<link rel='stylesheet' href='estilo.css'>";

if ($stmt->execute()) {
    echo "<div class='container'><h3>Cadastro realizado com sucesso!</h3>";
    echo "<p><a href='acessar.php'>Acessar página com dicas</a></p></div>";
} else {
    if ($conexao->errno == 1062) {
        echo "<div class='container'><h3>CPF já cadastrado!</h3><a href='acessar.php'>Acessar dicas</a></div>";
    } else {
        echo "<div class='container'><h3>Erro ao cadastrar: " . $conexao->error . "</h3></div>";
    }
}

$conexao->close();
?>